<?php
session_start();

if(isset($_POST['submit'])){
    //Gjøre om POST data til variabler
    $name = $_POST['Name'];
    $price = $_POST['price'];

     //Koble til databasen
$dbc = mysqli_connect('localhost', 'root', '', 'skohubben')
or die('Error connecting to MySQL server.');
$user_id=$_SESSION["id"];

    //Gjøre klar SQL-strengen
    $query = "INSERT INTO products(name, price, userid) VALUES ('$name','$price','$user_id')";
    

    //Utføre spørringen
    $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

    //Koble fra databasen
    mysqli_close($dbc);

    //Sjekke om spørringen gir resultater
    if($result){
        //Gyldig Login
        echo "lagt til i handlevogn";
    }else{
        //Ugyldig Login
        echo"Noe gikk galt, prøv igjen!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
</head>

<body>

    <section id="header">
        <a href="#"><img src="img/skohubben_logo2.png" class="logo" alt="Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index1.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a class="active" href="contact.php">Contact</a></li>
                <li>  <?php echo $_SESSION['Fulltnavn'] ?></li>
                <li><?php if($_SESSION){ echo '<a href="logout.php">Log out</a>';}else{echo '<a href="login.php">Log in</a>';}  ?></li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <a id="close" href="#"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header" class="about-header">

       
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Trygve Lies Plass 1, 1051 OSLO</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>post@skohubben.com </p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+47 22 22 00 00 </p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 09:00am - 16:00pm</p>
                </li>  
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.8088025254456!2d-1.256555484681452!3d51.754819700404106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c6a9ef8c485b%3A0xd2ff1883a001afed!2sUniversity%20of%20Oxford!5e0!3m2!1sen!2sbd!4v1637232208485!5m2!1sen!2sbd"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

 
    <section id="newsletter" class="section-m1 section-p1">
        <div class="newstext">
            <h4>Sign Up For Newsletters </h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" name="" placeholder="Your email address" id="">
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
            <p>From App Store or Google Play </p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways </p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© 2023, SkoHubben</p>
            <a  href="owner.html"><button class="owner">Made by Ammar</p></button>
            <a  href="img/Designmanual (Skohubben) - Copy.pdf"><button class="owner">Designmanual (Skohubben)</p></button>
        </div>
    </footer>


    <!-- <script src="script.js"></script> -->

</body>

</html>