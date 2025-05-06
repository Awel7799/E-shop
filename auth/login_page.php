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
                <input type="text" name="username" placeholder="Username" required />
                </div>
                <div class="input-group">
                <input type="password" name="password" placeholder="Password" required />
                    <?php if (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') { ?>
                        <p class="error">Incorrect password. Please try again.</p>
                    <?php } ?>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>