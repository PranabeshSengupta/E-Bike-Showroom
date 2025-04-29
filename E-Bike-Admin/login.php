<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login into Diamond E-Bike Admin</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="wrapper">
    <form method="post">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit" name="Login" value="Login">Log In</button>
    </form>
  </div>


  <?php include("login_1.php"); ?> 

</body>
</html>



