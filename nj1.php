<?php
session_start();

if (isset($_POST['submit'])) {
    $id = $_SESSION['idKunde'];
    $selectedSize = $_POST['selectedSize']; // Corrected: Get the selected size from the dropdown

    // Connect to the database
    $dbc = mysqli_connect('localhost', 'root', '', 'skohubben') or die('Error connecting to MySQL server');

    // Get the product ID based on the selected size
    $productIdQuery = "SELECT idProdukter FROM produkter WHERE Størrelse = ? LIMIT 1";
    $productIdStmt = mysqli_prepare($dbc, $productIdQuery);
    mysqli_stmt_bind_param($productIdStmt, "s", $selectedSize);
    mysqli_stmt_execute($productIdStmt);
    $productIdResult = mysqli_stmt_get_result($productIdStmt);

    if ($productRow = mysqli_fetch_assoc($productIdResult)) {
        $productId = $productRow['idProdukter'];

        // Prepare SQL statement to insert the selected product into the cart
        $insertQuery = "INSERT INTO cart (produkt, kunde) VALUES (?, ?)";
        $stmt = mysqli_prepare($dbc, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ii", $productId, $id);
        mysqli_stmt_execute($stmt) or die('Error adding product to cart.');
        mysqli_stmt_close($stmt);
    }

    // Close database connections
    mysqli_close($dbc);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Produktside</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <select name=""></select>

    </select>

    <section id="header">
        <a href="#"><img src="img/skohubben_logo2.png" class="logo" alt="Logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index1.php">Home</a></li>
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

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="img/products/jordan1retro.webp" width="100%" id="MainImg" alt="Nike Air Jordan 1">
        </div>

        <div class="single-pro-details">
            <form method="POST">
                <h6>Home / Sko</h6>
                <h4>Nike Jordan 1</h4>
                <h2>kr 1999</h2>
                <select name="selectedSize">
                    <?php
                    //Koble til databasen
                    $dbc = mysqli_connect('localhost', 'root', '', 'skohubben')
                        or die('Error connecting to Mysql server');

                    $query = 'Select Størrelse from Produkter';

                    $result = mysqli_query($dbc, $query)
                        or die(' Error querying databases. ');

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["Størrelse"] . "'>" . $row["Størrelse"] . "</option>";
                    }




                    ?>


                </select>


                <input type="number" min="1" max="5" value="1">
                <input type="submit" value="Add to Cart" name="submit">
                <h4>Produkt detaljer</h4>
                <span>
                    Nike Air Jordan 1 er en ikonisk basketballsko designet av Peter Moore i 1985. Skoen har en høytopp
                    silhuett, en kombinasjon av lær og syntetisk overdel, og den berømte "Swoosh"-logoen. Jordan 1 har
                    revolusjonert sneakerskulturen og forblir et tidløst symbol for stil og sportslig arv.</span>
        </div>
        </form>
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




    <script src="script.js"></script>
</body>

</html>