<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product</title>
</head>
<body>
  <h2>Add New Product</h2>
  <form action="addproduct.php" method="POST" enctype="multipart/form-data">
    <label>Product Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Image:</label>
    <input type="file" name="image" accept="image/*" required><br><br>

    <button type="submit">Add Product</button>
  </form>
</body>
</html>
