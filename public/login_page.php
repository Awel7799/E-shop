<?php
if (!isset($error)) $error = "";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: #fdf6e3; /* Creamy background */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: #fffef2;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      text-align: center;
      color: #5d473a;
      margin-bottom: 24px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #d6c8b4;
      border-radius: 8px;
      background-color: #fefae0;
    }

    .login-container input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #d4a373;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 15px;
    }

    .login-container input[type="submit"]:hover {
      background-color: #b57b50;
    }

    .note {
      margin-top: 16px;
      font-size: 14px;
      color: #8b7a68;
      text-align: center;
    }
    .error {
      color: #b33030;
      font-size: 14px;
      margin-top: 4px;
      text-align: center;
    }
  </style>
</head>
<body>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="admin_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="submit" value="Login" />
    </form>
    <?php if (!empty($error)): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <div class="note">Only authorized admins can access</div>
  </div>
</body>
</html>
