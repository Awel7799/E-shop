<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="homepagestyle.css">
    <link rel="stylesheet" href="query.css">
</head>
<body>
    
<header class="product-header">
    <div class="logo-text">E-SHOP</div>

    <form action="">
        <button><img src="icons/search.png" alt=""></button>
        <input type="search" placeholder="Search Products">
    </form>
    <div class="links">
            <a class="hidden-tab"  href="index.php">HOME</a>
            <a class="active hidden-tab" href="products.php">PRODUCT</a>
            <a class="hidden-tab" href="#">ABOUT</a>
            <a class="hidden-tab" href="#">CONTACT</a>
            <a class="hidden-tab3" href="#"><img src="./assets/icons/shop.png" alt=""></a>
            <a class="hidden-tab3" href="#"><img src="./assets/icons/person.png" alt=""></a>
    </div>   
</header>

<section class="body">
    <div class="left hidden-tab">

        <section class="categories">
            <h2 class="line">Categories</h2>
            <ul>
                <li>Clothes</li>
                <li>Watches</li>
                <li>Bags</li>
                <li>Glasses</li>
                <li>Cosmetics</li>
                <li>Perfumes</li>
                <li>Footwear</li>
            </ul>
        </section>

    </div>



    <div class="right">

        <h1><span class="line">All Products</span></h1>

        <div class="sort">

            <form action="">
                <select name="" id="">
                    <option>Sort by Price</option>
                </select>
            </form>

        </div>






        <section class="featured-products">
    <h1 class="line">Featured Products</h1>

    <div id="list" class="list wrap">
        
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
          echo '<button>+</button>';
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












<!--
        <section>

            <div class="item-cards">

                <a href="product-detail.php"><img src="./assets/images/bag.png" alt=""></a>
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>
   
            <div class="item-cards">

                <img src="./assets/images/allstr.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/hoodie.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/perfume.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>



            <div class="item-cards">

                <img src="./assets/images/hat.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/watch.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/bag.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/allstr.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>


       

            <div class="item-cards">

                <img src="./assets/images/bag.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/allstr.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/hoodie.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/perfume.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>


     

            <div class="item-cards">

                <img src="./assets/images/hat.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/watch.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/bag.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/allstr.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>


     

            <div class="item-cards">

                <img src="./assets/images/bag.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/allstr.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/hoodie.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>

            <div class="item-cards">

                <img src="./assets/images/perfume.png" alt="">
                <span class="item-name">CHANEL Mini flap bag</span>
                
                <div class="price"><p><span>9900000</span> MMk</p><button class="add-to-cart">+</button> </div>

            </div>


        </section> -->

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
        Copyright ©2023 <span>E-SHOP</span>. All right reserved
    </div>
    <hr>
</footer>


</body>
</html>