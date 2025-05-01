<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard - Users</title>
  <link rel="stylesheet" href="user.css">
</head>
<body>

  <div class="user-section">
    <div class="header">
      <h1>Users</h1>
      <button class="add-user-btn"><a href="adduserpage.php">+ Add New User</a></button>
    </div>

    <div class="user-cards">
    <?php
         $servername = "localhost";      // usually localhost
         $dbUsername = "root";           // your DB username
         $dbPassword = "bUZweTz8ms_V&w/";               // your DB password
         $dbName = "eshop"; // replace with your database name

        // Create connection
         $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

        // Check connection
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
           }
      // Fetch products
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="user-cards">';
          echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="user Image">';
          echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
          echo '<a href="deleteuser.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')" class="delete-btn">Delete</a>';

          echo '</div>';
        }
      } else {
        echo '<p>No products found.</p>';
      }

      $conn->close();
    ?>

      
      <!-- Add more user cards as needed -->
    </div>
  </div>

</body>
</html>
