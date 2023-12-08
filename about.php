<?php
session_start();

if (isset($_POST['submit'])) {
    //Gjøre om POST data til variabler
    $name = $_POST['Name'];
    $price = $_POST['price'];

    //Koble til databasen
    $dbc = mysqli_connect('localhost', 'root', '', 'skohubben')
        or die('Error connecting to MySQL server.');
    $user_id = $_SESSION["id"];

    //Gjøre klar SQL-strengen
    $query = "INSERT INTO products(name, price, userid) VALUES ('$name','$price','$user_id')";


    //Utføre spørringen
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    //Koble fra databasen
    mysqli_close($dbc);

    //Sjekke om spørringen gir resultater
    if ($result) {
        //Gyldig Login
        echo "lagt til i handlevogn";
    } else {
        //Ugyldig Login
        echo "Noe gikk galt, prøv igjen!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js"></script> -->
</head>

<body>

    <section id="header">
        <a href="index1.php"><img src="img/skohubben_logo2.png" class="logo" alt="Logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index1.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a class="active" href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>  <?php echo $_SESSION['Fulltnavn'] ?></li>
                <li>
                    <?php if ($_SESSION) {
                        echo '<a href="logout.php">Log out</a>';
                    } else {
                        echo '<a href="login.php">Log in</a>';
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

    <section id="page-header" class="about-header">

        <h2>#KnowUs </h2>



    </section>

    <section id="about-head" class="section-p1">
        <img style="width: 40%; border-radius: 20px;" src="img/banner/airforce 1.jpg" alt="Airforce">
        <div>
            <h2>Hvem vi er?</h2>
            <p>Skohubben er destinasjonen for skoentusiaster som elsker Nike og Adidas. Vi er stolte av å tilby et
                eksklusivt utvalg av disse to globale merkene. Enten du er på jakt etter sporty og innovative sneakers,
                stilige joggesko eller komfortable fritidssko, vil du finne det hos oss. Utforsk vårt sortiment og
                oppdag hvordan Nike og Adidas-skopar pynten på kaken for enhver antrekk.</p>


            <br><br>

            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Our aim is to give the best experience to
                our customers and enjoy our time together through shoe shopping!
            </marquee>
        </div>
    </section>



    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/banner/f1.png" alt="Banner">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/banner/f2.png" alt="Banner">
            <h6>3-5 business days delivery</h6>
        </div>
        <div class="fe-box">
            <img src="img/banner/f3.png" alt="Banner">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/banner/f6.png" alt="Banner">
            <h6>24/7 Customer Service</h6>
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
                <img src="img/pay/app.jpg" alt="App Store">
                <img src="img/pay/play.jpg" alt="Google Play">
            </div>
            <p>Secured Payment Gateways </p>
            <img src="img/pay/pay.png" alt="Payment">
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