<link rel="stylesheet" href="styles.css">
<?php $conn = new mysqli('localhost', 'root', '', 'funhub');
 if ($_SERVER['REQUEST_METHOD'] === 'POST') 
 { $username = $_POST['username']; 
 $token = bin2hex(random_bytes(16)); 
 $stmt = $conn->prepare("UPDATE users SET reset_token = ? WHERE username = ?");
  $stmt->bind_param("ss", $token, $username); 
  if ($stmt->execute()) 
  { echo "<a href='reset_password.php?token=$token'>Click here to reset your password</a>"; } 
  else { echo "❌ Something went wrong."; } } ?>
