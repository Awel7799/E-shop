<?php
$host = "localhost";
$user = "root";
$password = "bUZweTz8ms_V&w/"; // Replace with your actual MySQL password
$database = "Eshop";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$first_name = $father_name = $username = $email = $password = $phone = $address = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $first_name = trim($_POST["first_name"]);
    $father_name = trim($_POST["father_name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    // Check for existing username or email
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT * FROM sellers WHERE first_name = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = "Username or email already exists.";
        }
        $stmt->close();
    }

    // If no errors, insert into database
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO sellers (first_name, father_name, username, email, password, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $first_name, $father_name, $username, $email, $hashed_password, $phone, $address);
        if ($stmt->execute()) {
            $success_message = "Registration successful!";
            header("Location:  user.php");
            // Clear form values
            $first_name = $father_name = $username = $email = $password = $phone = $address = "";
        } else {
            $errors[] = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            width: 400px;
        }
        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .signup-form input, .signup-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .signup-form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .signup-form button:hover {
            background: #0056b3;
        }
        .error {
            background: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success {
            background: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .login-link a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form class="signup-form" method="post" action="">
        <h2>Add seller</h2>
        <?php
        if (!empty($errors)) {
            echo '<div class="error"><ul>';
            foreach ($errors as $error) {
                echo "<li>" . htmlspecialchars($error) . "</li>";
            }
            echo '</ul></div>';
        }
        if (isset($success_message)) {
            echo '<div class="success">' . htmlspecialchars($success_message) . '</div>';
        }
        ?>
        <input type="text" name="first_name" placeholder="First Name" value="<?php echo htmlspecialchars($first_name); ?>" required />
        <input type="text" name="father_name" placeholder="Father Name" value="<?php echo htmlspecialchars($father_name); ?>" required />
        <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required />
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="text" name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($phone); ?>" />
        <textarea name="address" placeholder="Address"><?php echo htmlspecialchars($address);?></textarea>
        <button type="submit">Add sller</button>
    </form>
</body>
</html>
