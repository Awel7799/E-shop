<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "bUZweTz8ms_V&w/";
$dbName = "eshop";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Check plain password (ideally use password_verify for hashed passwords)
            if ($password === $row['password']) {
                // Start session if needed
                session_start();
                $_SESSION['admin'] = $row['username'];

                header("Location: ../admin/dashboard/index.php");
                exit();
            } else {
                header("Location: login_page.php?error=Incorrect password");
                exit();
            }
        } else {
            header("Location: login_page.php?error=No user found with that username");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: login_page.php?error=Missing fields");
        exit();
    }
}

$conn->close();
?>
