<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Login • Fun Entertainia</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="login-container">
    <h2>Login to Fun Entertainia</h2>
    <form action="login_process.php" method="POST">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <div class="form-group role-select">
        <label><input type="radio" name="login_as" value="user" checked> User</label>
        <label><input type="radio" name="login_as" value="admin"> Admin</label>
      </div>

      <button type="submit">Log In</button>
      <div style="text-align:center;"> <a href="forgot_password.php">Forgot Password?</a> </div>

      <div class="register-link">
        <a href="register.php">Register &rarr;</a>
      </div>
    </form>
  </div>
</body>
</html>
