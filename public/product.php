<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="homepagestyles.css">
    <link rel="stylesheet" href="query.css">
</head>
<body>
    
<header class="product-header">
    <div class="logo-text">E-SHOP</div>

    <form action=""  method="GET">
        <button><img src="icons/search.png" alt=""></button>
        <input type="text" name="search" placeholder="Search Products">
    </form>
    <div class="links">
            <a class="hidden-tab"  href="index.php">HOME</a>
            <a class="active hidden-tab" href="products.php">PRODUCT</a>
            <a class="hidden-tab" href="footer">ABOUT</a>
            <a class="hidden-tab" href="footer">CONTACT</a>
            <a class="hidden-tab3" href="cart.php"><img src="./assets/icons/shop.png" alt=""></a>
    </div>   
</header>

<section class="body">
    <div class="left hidden-tab">

        <section class="categories">
            <h2 class="line">Categories</h2>
            <ul>
            <li><a href="?category=Clothes">Clothes</a></li>
            <li><a href="?category=Watches">Watches</a></li>
            <li><a href="?category=Bags">Bags</a></li>
            <li><a href="?category=Glasses">Glasses</a></li>
            <li><a href="?category=Cosmetics">Cosmetics</a></li>
            <li><a href="?category=Perfumes">Perfumes</a></li>
            <li><a href="?category=Footwear">Footwear</a></li>
        </ul>
        </section>

    </div>



<div class="right">
        <h1><span class="line">All Products</span></h1>
<section class="featured-products">
    <h1 class="line"></h1>

    <div id="list" class="list wrap">
        
    <?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "bUZweTz8ms_V&w/";
$dbName = "eshop";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';

if ($search !== '') {
    // Search by name
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $likeSearch = '%' . $search . '%';
    $stmt->bind_param("s", $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} elseif ($category !== '') {
    // Filter by category
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Show all products
    $result = $conn->query("SELECT * FROM products");
}

// Display products
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item-cards">';
        echo '<img src="/E-shop/storage/uploads/' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
        echo '<div class="middle">' . htmlspecialchars($row["name"]) . '</div>';
        echo '<div class="item-cards-price">';
        echo '<div class="bottom"><p><span>' . htmlspecialchars($row["price"]) . '</span>$ </p></div>';
        echo '<button>+</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p style='margin: 20px; color: red;'>No products found";
    if ($search !== '') {
        echo " for: <strong>" . $search . "</strong>";
    }
    if ($category !== '') {
        echo " in the <strong>" . $category . "</strong> category";
    }
    echo ".</p>";
}

$conn->close();
?>

       
    </div>
    <a href="product.php" class="back-btn">Back to All Products</a>
</section>



        <button class="b1"><</button>
        <button class="bn">1</button>
        <button class="bn red">2</button>
        <button class="bn">3</button>
        <button class="bn">4</button>
        <button class="bn">5</button>
        <button class="b1">></button>

    </div>

</section>

<footer>
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
        Copyright ©2025 <span>E-SHOP</span>. All right reserved
    </div>
    <hr>
</footer>


</body>
</html>