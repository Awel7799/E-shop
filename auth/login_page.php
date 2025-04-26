<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Admin Login</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <?php if (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') { ?>
                        <p class="error">Incorrect password. Please try again.</p>
                    <?php } ?>
                </div>
                <div class="input-group">
                    <label for="email">email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p class="link">Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
</body>
</html>