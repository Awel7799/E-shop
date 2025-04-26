<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Admin Signup</h2>
            <form action="signup_process.php" method="POST">
                <div class="input-group">
                    <label for="username">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Signup</button>
            </form>
            <p class="link">Already have an account? <a href="login_page.php">Login</a></p>
        </div>
    </div>
</body>
</html>