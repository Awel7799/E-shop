<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="admin-dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Admin</h2>
      <nav>
        <a href="#">Dashboard</a> <br>
        <a href="#">Users</a> <br>
        <a href="addproduct.php">Products</a> <br>
        <a href="#">Orders</a> <br>
        <a href="#">Reports</a> <br>
        <a href="#">Settings</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Overview Cards -->
      <section class="overview">
        <div class="card">Total Users: 1234</div>
        <div class="card">Products: 567</div>
        <div class="card">Sales: $89,000</div>
        <div class="card">Orders: 340</div>
      </section>

      <!-- Table View -->
      <section class="table-section">
        <h3>Product List</h3>
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>Seller</th>
              <th>Price</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>iPhone 15</td>
              <td>TechStore</td>
              <td>$999</td>
              <td>Approved</td>
              <td><button class="glow-button">Remove</button></td>
            </tr>
            <tr>
              <td>Adidas Sneakers</td>
              <td>FashionHub</td>
              <td>$120</td>
              <td>Pending</td>
              <td><button class="glow-button">Approve</button></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</body>
</html>
