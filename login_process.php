<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'funhub');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loginAs  = $_POST['login_as'];  // "user" or "admin"

    // Fetch that user’s hashed password and role
    $stmt = $conn->prepare(
      "SELECT password, role
         FROM users
        WHERE username = ?" 
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashedPassword, $dbRole);
        $stmt->fetch();

        // Check password first
        if (password_verify($password, $hashedPassword)) {
            // Now enforce the chosen login_as matches their real DB role
            if ($loginAs === 'admin') {
                if ($dbRole === 'admin') {
                    // OK: real admin logging in as admin
                    $_SESSION['username'] = $username;
                    $_SESSION['role']     = 'admin';
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    // Not an admin but tried to log in as one
                    echo "<script>
                            alert('Access denied: you are not an admin.');
                            window.location.href='login.php';
                          </script>";
                    exit();
                }
            } else {
                // login_as == 'user'
                if ($dbRole === 'user' || $dbRole === 'admin') {
                    // Both users and admins can log in as users
                    $_SESSION['username'] = $username;
                    $_SESSION['role']     = $dbRole;
                    header("Location: selection.php");
                    exit();
                } else {
                    echo "<script>
                            alert('Invalid role. Contact admin.');
                            window.location.href='login.php';
                          </script>";
                    exit();
                }
            }
        } else {
            // Wrong password
            echo "<script>
                    alert('Invalid password. Please try again.');
                    window.location.href='login.php';
                  </script>";
            exit();
        }
    } else {
        // User not found
        echo "<script>
                alert('No such user. Please register first.');
                window.location.href='login.php';
              </script>";
        exit();
    }
}
?>
