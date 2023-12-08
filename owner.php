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
    <link rel="stylesheet" href="style.css">
    <title>Ammar</title>




</head>

<body>

    <section id="header">
        <a href="#"><img src="img/skohubben_logo2.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index1.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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
    <div class="madebyme">

        <div>
            <img src="img/portefolje/kavdrat_kapital_logo_full.svg" width="60%" alt="">

        </div>
        <p style="width: 50%;">"Kvadrat Kapital AS" logoen kombinerer enkelhet og profesjonalitet. Den har et sterkt og
            balansert kvadratisk symbol som representerer stabilitet og pålitelighet. Navnet er utformet med en moderne
            og forretningsorientert skrifttype som gir umiddelbar lesbarhet. Logoen er laget av meg.</p>
        <div>
            <img src="img/portefolje/logo_ammar_web1.svg" width="60%" alt="">

        </div>
        <p style="width: 50%;">Denne logoen er laget for å representere meg selv, og lage et større marked av meg som
            logodesigner. Logoen er laget for å lage et godt og positivt inntrykk. Dette medfølger lesbarhet og klarhet
            av logo</p>
        <div>
            <img src="img/portefolje/oslo_lacrosee.png" width="60%" alt="">
        </div>
        <p style="width: 50%;">Tidlig 2022, fikk vi en oppgave om å lage en nettside for Oslo Lacrosse. Nettsiden hadde
            noen grenser på hva og hvordan den skulle utformes og lages. Nettsiden kan ses på oslolacrosse.no. Den er
            utviklet av meg</p>
        <div>
            <img src="img/portefolje/Sushishop.png" width="60%" alt="">
        </div>
        <p style="width: 50%;">Sushi Shop er et gatekjøkken som lager mange ulike type Sushi. Gatekjøkkenet har vært et
            populært matsted de siste åra, og var nødt tl å utvikle ei digital bestillingsløsning. De bestemte seg for
            app og tok kontakt med meg. App design ble utviklet av meg</p>
        <div>
            <img src="img/portefolje/systemic racism.jpg" width="60%" alt="">
        </div>
        <p style="width: 50%;">Dette er en infographic jeg frivillig ønsket å lage. Budskapet her er å fremre statistikk
            innad rasisme. Blant annet hvor mye enn stoler på retthåndhevelser osv.</p>
        <div>
            <img src="#" alt="">
        </div>


    </div>
    <footer style="background-color: black;" class="section-p1">

        <div class="col">
            <h4 style="color: white;">About</h4>
            <a style="color: white;" href="#">About Us</a>
            <a style="color: white;" href="#">Delivery Information</a>
            <a style="color: white;" href="#">Privacy Policy</a>
            <a style="color: white;" href="#">Terms & Conditions</a>
            <a style="color: white;" href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4 style="color: white;">My Account</h4>
            <a style="color: white;" href="#">Sign In</a>
            <a style="color: white;" href="#">View Cart</a>
            <a style="color: white;" href="#">My Wishlist</a>
            <a style="color: white;" href="#">Track My Order</a>
            <a style="color: white;" href="#">Help</a>
        </div>

        <div class="col install">
            <h4 style="color: white;">Install App</h4>
            <p style="color: white;">From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p style="color: white;">Secured Payment Gateways </p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p style="color: white;">© 2023, SkoHubben</p>
            <a href="owner.html"><button class="owner">Made by Ammar</p></button>
                <a href="img/Designmanual (Skohubben) - Copy.pdf"><button class="owner">Designmanual (Skohubben)</p>
                        </button>
        </div>
    </footer>


    <script src="script.js"></script>

</body>

</html>