<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skohubben</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
</head>

<body>

    <section id="header">
        <a href="#"><img src="img/skohubben_logo2.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index1.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                    <?php echo $_SESSION['Fulltnavn'] ?>
                </li>
                <li>
                    <?php if ($_SESSION) {
                        echo '<a href="logout.php">log out</a>';
                    } else {
                        echo '<a href="login.php">log in</a>';
                    } ?>
                </li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>




    <section>
        <video class="reklame" autoplay loop src="img/reklame_skohubben.mp4"></video>
    </section>
    <div class="mute_index">
        <a href="index1.php">
            <p>Sound off</p>
        </a>
    </div>



    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/banner//f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/banner//f2.png" alt="">
            <h6>3-5 Business days delivery</h6>
        </div>
        <div class="fe-box">
            <img src="img/banner/f3.png" alt="">
            <h6>Save Money</h6>
        </div>


        <div class="fe-box">
            <img src="img/banner/f6.png" alt="">
            <h6>24/7 Customer Service</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Teasers</h2>
        <p>Summer Shoes</p>
        <div class="pro-container">
            <div class="pro">
                <a href="nj1.php"><img src="img/products/jordan1retro.webp" alt=""></a>
                <div class="des">
                    <span>Nike</span>
                    <h5>Nike Jordan 1</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fa-sharp fa-regular fa-star-sharp-half-stroke"></i>

                    </div>
                    <h4>kr 1299</h4>
                </div>
                

            </div>
            <div class="pro">
                <a href="nj1.php"><img src="img/products/nikeairforce1.webp" alt=""></a>
                <div class="des">
                    <span>Nike</span>
                    <h5>Nike Airforce 1</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                    </div>
                    <h4>kr 1199</h4>
                </div>
                
            </div>
            <div class="pro">

                <div class="des">
                    <a href="nj1.php"><img src="img/products/vapormaxplus.webp" width="20%" alt=""></a>

                    <span>Nike</span>
                    <h5>Nike Vapormax Plus</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                    </div>
                    <h4>kr 1999</h4>
                </div>
                
            </div>
            <div class="pro">
                <a href=""><img src="img/products/jordan4.webp" alt=""></a>
                <div class="des">
                    <br>
                    <br>

                    <span>Nike</span>
                    <h5>Nike Jordan 4</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                    </div>
                    <h4>kr 2499</h4>
                </div>
                
            </div>

        </div>
    </section>  



    <section id="product1" class="section-p1">
        <h2>Arrivals</h2>
        <p>Summer vibe - Make it your best summer ever</p>
        <div class="pro-container">
            <div class="pro">
                <a href=""><img src="img/products/yeezyboost350.webp" alt=""></a>
                <div class="des">
                    <span>Adidas</span>
                    <h5>Adidas Yeezy Boost 350</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>kr 2199</h4>
                </div>
                
            </div>
            <div class="pro">
                <a href="nj1.php"><img src="img/products/foamrunners.webp" alt=""></a>
                <div class="des">
                    <span>Adidas</span>
                    <h5>Adidas Yeezy Foam</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>kr 1499</h4>
                </div>
                
            </div>
            <div class="pro">
                <a href=""><img src="img/products/yeezyslides.webp" alt=""></a>
                <div class="des">
                    <span>Adidas</span>
                    <h5>Adidas Yeezy Slides</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>kr 1399</h4>
                </div>
                
            </div>
            <div class="pro">
                <a href=""></a><img src="img/products/adinmd.webp" alt=""></a>
                <div class="des">
                    <span>Adidas</span>
                    <h5>Adidas Originals Nmd</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>kr 1299</h4>
                </div>
                
            </div>

        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">

        </div>
        <div class="banner-box banner-box2">

        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">

        </div>
        <div class="banner-box banner-box2">

        </div>
        <div class="banner-box banner-box3">

        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways </p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© 2023, SkoHubben</p>
            <a href="owner.html"><button class="owner">Made by Ammar</p></button>
                <a href="img/Designmanual (Skohubben) - Copy.pdf"><button class="owner">Designmanual (Skohubben)</p>
                    </button>

        </div>
    </footer>


    <!-- <script src="script.js"></script> -->
</body>

</html>