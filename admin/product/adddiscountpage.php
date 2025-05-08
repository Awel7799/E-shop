<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: ../../auth/login_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Discounted Product</title>
  <style>
    body {
      background-color: #1a1a1a;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background-color: #2a2a2a;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
      width: 100%;
      max-width: 400px;
    }
    h2 {
      text-align: center;
      color: #00ffff;
      margin-bottom: 1.5rem;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    label {
      display: block;
      margin-bottom: 0.5rem;
    }
    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="file"] {
      width: 100%;
      padding: 0.8rem;
      background-color: #3a3a3a;
      border: 2px solid #00ffff;
      border-radius: 5px;
      color: #fff;
    }
    button {
      width: 100%;
      padding: 1rem;
      background-color: #00ffff;
      color: #1a1a1a;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #00cccc;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Add Discounted Product</h2>
    <form action="discountdb.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Product Name:</label>
        <input type="text" name="productName" required />
      </div>
      <div class="form-group">
        <label>Discounted Price ($):</label>
        <input type="number" name="price" step="0.01" min="0" required />
      </div>
      <div class="form-group">
        <label>Quantity:</label>
        <input type="number" name="quantity" min="1" required />
      </div>
      <div class="form-group">
        <label>Category:</label>
        <input type="text" name="category" required />
      </div>
      <div class="form-group">
        <label>Start Date:</label>
        <input type="date" name="start_date" required />
      </div>
      <div class="form-group">
        <label>End Date:</label>
        <input type="date" name="end_date" required />
      </div>
      <div class="form-group">
        <label>Product Image:</label>
        <input type="file" name="image" accept="image/*" required />
      </div>
      <button type="submit" name="submit">Add Product</button>
    </form>
  </div>
</body>
</html>
