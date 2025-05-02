<!DOCTYPE html>
<html lang="en">

<script>

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

        <form action="">
            <button><img src="./assets/icons/search.png" alt=""></button>
            <input type="search" placeholder="Search Products">
        </form>
        
        <div class="links">
            <a class="active hidden-tab"  href="index.php">HOME</a>
            <a class="hidden-tab" href="product.php">PRODUCT</a>
            <a class="hidden-tab" href="#">ABOUT</a>
            <a class="hidden-tab" href="#">CONTACT</a>
            <a class="hidden-tab3" href="#"><img src="./assets/icons/shop.png" alt=""></a>
            <a class="hidden-tab3" href=" ../auth/signup.php"><img src="./assets/icons/person.png" alt=""><p>Admin</p></a>
            <a class="hidden-tab3" href=" ../seller/login.php"><img src="./assets/icons/person.png" alt=""><p>Seller</p></a>
        </div>   
    </header>

    <span class="eshop-body">
        <div class="eshop-body-text">
            <h1>Shop Smarter, Not Harder!</h1>
            <p>Success isn't always about greatness. It's about consistancy. Consistent
                <br>hard work gains success. Greatness will come.
            </p>
            <button>Explore Now <img src="././assets/icons/arrow1.png" alt=""></button>
        </div>
        <img class="hidden-tab2" src="./assets/images/women.png" alt="">
    </span>

</section >


<section class="featured-products">
    <h1 class="line">Featured Products</h1>

    <div class="list wrap">
        <div class="item-cards"> 
            <img src="./assets/images/bag.png" alt="">

            <div class="top">CHANEL Mini flap bag</div>
            <div class="middle">Lambskin & gold-tone metal, black</div>
            <div class="bottom"><p><span>9900000</span> MMK</p> <button>+</button></div>
        </div>

        <div class="item-cards"> 
            <img src="./assets/images/allstr.png" alt="">

            <div class="top">Converse Shoes</div>
            <div class="middle">
                Chuck Tylor All Star Trek <br>
            </div>
            <div class="bottom"><p><span>5400000</span> MMK</p>  <button>+</button></div>
        </div>

        <div class="item-cards"> 
            <img src="./assets/images/hoodie.png" alt="">

            <div class="top">Essential Hoodie</div>
            <div class="middle">Buttercream Essential Hoodie</div>
            <div class="bottom"><p><span>3700000</span> MMK</p> <button>+</button></div>
        </div>
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
        <div class="item-cards"> 
            <img src="./assets/images/perfume.png" alt="">

            <div class="top">Veleno Perfume</div>
            <div class="middle">Veleno perfume, 100ml</div>
            <div class="bottom"><p><span>28000</span> MMK</p> <button>+</button></div>
        </div>

        

        <div class="item-cards"> 
            <img src="./assets/images/hoodie.png" alt="">

            <div class="top">Essential Hoodie</div>
            <div class="middle">Buttercream Essential Hoodie</div>
            <div class="bottom"><p><span>3700000</span> MMK</p> <button>+</button></div>
        </div>
        <div class="item-cards"> 
            <img src="./assets/images/allstr.png" alt="">

            <div class="top">Converse Shoes</div>
            <div class="middle">
               <p>Chuck Tylor All Star Trek </p>
            </div>
            <div class="bottom"><p><span>5400000</span> MMK</p> <button>+</button></div>
        </div>


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
    hr
</footer>



</body>
</html>