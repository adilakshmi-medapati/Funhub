<link rel="stylesheet" href="styles.css">
<?php $conn = new mysqli('localhost', 'root', '', 'funhub');
 if ($_SERVER['REQUEST_METHOD'] === 'POST')
  { $token = $_POST['token'];
   $newPassword = $_POST['new_password'];
    $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
     $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
      $stmt->bind_param("ss", $hashed, $token); 
      if ($stmt->execute() && $stmt->affected_rows > 0) 
      { echo "✅ Password updated! <a href='login.php'>Login here</a>"; } 
      else { echo "❌ Invalid or expired token."; } } ?>