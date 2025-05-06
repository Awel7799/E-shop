<!DOCTYPE html>
<html lang="en">

<script>

function addToCart(id, name, price, image) {
  const formData = new FormData();
  formData.append("id", id);
  formData.append("name", name);
  formData.append("price", price);
  formData.append("image", image);

  fetch("add_to_cart.php", {
    method: "POST",
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    alert(data);
    loadCartCount(); // refresh cart count
  });
}

    function myFunction(){
        document.getElementById('side-bar-top').style.display='none';
        document.getElementById('side-bar').style.display='none';
        document.getElementById('back-icon').style.display='none';
    }

</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-shop</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="query.css">
    <link rel="stylesheet" href="humberger.css">
</head>
<body>
<!-- 
<img id="back-icon" onclick=myfunction() src="assets/icons/back-icon.png" alt="">
<div id="side-bar" onclick="document.getElementById('side-bar','back-icon').style.display='none'"></div>
<div id="side-bar-top">

    <a class="active"  href="#">HOME</a>
    <hr>
    <a href="products.html">PRODUCT</a>
    <hr>
    <a href="#">ABOUT</a>
    <hr>
    <a href="#">CONTACT</a>
    <hr>
    <a class="hidden-tab2 unhidden" href="#"><img src="./assets/icons/shop.png" alt=""></a>
    <hr class="hidden-tab2 unhidden">
    <a class="hidden-tab2 unhidden" href="#"><img src="./assets/icons/person.png" alt=""></a>
    <hr class="hidden-tab2 unhidden">


</div> -->

<section class="eshop">
    <header>
        <img id="menu-image" src="assets/icons/menu-black.png" onclick="document.getElementById('side-bar-top').style.display='flex'
        ,document.getElementById('side-bar').style.display='block'
        ,document.getElementById('menu-image').style.display='none'
        ,document.getElementById('back-icon').style.display='block'" alt="">
        
        <div class="logo-text">E-SHOP</div>

        
        
        <div class="links">
            <a class="active hidden-tab"  href="index.php">HOME</a>
            <a class="hidden-tab" href="product.php">PRODUCT</a>
            <a class="hidden-tab" href="#footer">ABOUT</a>
            <a class="hidden-tab" href="#footer">CONTACT</a>
            <a class="hidden-tab3" href="cart.php"><img src="./assets/icons/shop.png" alt=""></a>
            <a class="hidden-tab3" href=" ../auth/login_page.php"><img src="./assets/icons/person.png" alt=""><p>Admin</p></a>
            <a class="hidden-tab3" href=" ../seller/login.php"><img src="./assets/icons/person.png" alt=""><p>Seller</p></a>
        </div>   
    </header>

    <span class="eshop-body">
        <div class="eshop-body-text">
            <h1>Shop Smarter, Not Harder!</h1>
            <p>Success isn't always about greatness. It's about consistancy. Consistent
                <br>hard work gains success. Greatness will come.
            </p>
            <button><a href="product.php">Explore Now </a><img src="././assets/icons/arrow1.png" alt=""></button>
        </div>
        <img class="hidden-tab2" src="./assets/images/women.png" alt="">
    </span>

</section >


<section class="featured-products">
    <h1 class="line">Featured Products</h1>
    <div class="list wrap">
        
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
      $sql = "SELECT * FROM featuredProduct";
      $result = $conn->query($sql);
    
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="item-cards">';
               echo '<img src="/E-shop/storage/uploads/' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
               echo '<div class="middle">' . htmlspecialchars($row["name"]) . '</div>';
               echo '<div class="item-cards-price">';
               echo '<div class="bottom"><p><span>' . htmlspecialchars($row["price"]) . '</span>$ </p></div>';
               echo '<button onclick="addToCart(' 
                   . htmlspecialchars($row["id"]) . ', '
                   . '\'' . addslashes($row["name"]) . '\', '
                   . htmlspecialchars($row["price"]) . ', '
                   . '\'' . addslashes($row["image"]) . '\')">+</button>';
     
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<p>No products found.</p>';
      }

      $conn->close();
    ?>
       
    </div>

</section>

<section class="limited-offer">
    <h4>LIMITED OFFER</h4>
    <p><span>35%</span> Off only this friday and get special gift</p>
    <button>Grab It Now <img src="././assets/icons/arrow1.png" alt=""></button>
</section>

<section class="featured-products">
    <h1 class="line">Latest Products</h1>

    <div class="list wrap">
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
/*
// Fetch discounted products
$sql = "SELECT * FROM discount ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="product-card">';
    echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
    echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
    echo '<p class="price">$' . htmlspecialchars($row["price"]) . '</p>';
    echo '<p class="discount-dates">From: ' . htmlspecialchars($row["start_date"]) . '<br>To: ' . htmlspecialchars($row["end_date"]) . '</p>';
    echo '<a href="discount_delete.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')" class="delete-btn">Delete</a>';
    echo '</div>';
  }
} else {
  echo '<p>No products found.</p>';
}
  */
  $sql = "SELECT * FROM discount";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="item-cards">';
           echo '<img src="/E-shop/storage/uploads/' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
           echo '<div class="middle">' . htmlspecialchars($row["name"]) . '</div>';
           echo '<div class="item-cards-price">';
           echo '<div class="bottom"><p><span>' . htmlspecialchars($row["price"]) . '</span>$ </p></div>';
           echo '<p class="discount-dates">From: ' . htmlspecialchars($row["start_date"]) . '<br>To: ' . htmlspecialchars($row["end_date"]) . '</p>';
           echo '<button onclick="addToCart(' 
               . htmlspecialchars($row["id"]) . ', '
               . '\'' . addslashes($row["name"]) . '\', '
               . htmlspecialchars($row["price"]) . ', '
               . '\'' . addslashes($row["image"]) . '\')">+</button>';
 
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo '<p>No products found.</p>';
  }

$conn->close();
?>


    </div>

</section>

<footer id="footer">
    <div class="top wrap2">

        <div class="f-logo hidden-tab">
            <span>E-shop</span>
            Specializes in providing high-quality,stylish
            product for your wardrobe 
        </div>

        <div class="contact ">
            <div class="title line">CONTACT</div>

            <div class="co-info">
                <img src="./assets/icons/location.png" alt="kiya">
                <section><p>No. 164, Changyisu Str, Paung Township,</p><p>Mon State, Myanmar</p></section>
            </div>
            <div class="co-info">
                <img src="./assets/icons/phone.png" alt="">
                <p>09-97387167, </p><p>09-91801383</p>
            </div>
            <div class="co-info">
                <img src="./assets/icons/email.png" alt="">
                <p>hakunlatena@gmail.com</p>
            </div>
        </div>
        <div class="quick-link">
            <div class="title line">QUICK LINK</div>
            <ul>
                <li>Home</li>
                <li>Products</li>
                <li>About</li>
                <li>Contact</li>
                <li>Add To Cart</li>
            </ul>
        </div>
        <div class="follow-us">
            <div class="title line">Follow Us</div>
            <img src="./assets/icons/facebook.png" alt="">
            <img src="./assets/icons/twitter.png" alt="">
            <img src="./assets/icons/instagram.png" alt="">
            <img src="./assets/icons/youtube.png" alt="">
        </div>
    </div>
    <hr>
    <div class="bottom">
        Copyright ©2023 <span>E-SHOP</span>. All right reserved
    </div>
    hr
</footer>



</body>
</html>