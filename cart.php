<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">

    <style>
        .checkout{
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .total{
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>

<?php // Sjekke om brukeren er logget inn
        if (isset($_SESSION['idKunde'])) {
            // Starte kobling med database
            $dbc = mysqli_connect('localhost', 'root', '', 'skohubben') or die('Error connecting to MySQL server');

            //Hente inn brukerID fra starta økt
            $userId = $_SESSION['idKunde'];

            // Sjekk om forespørselsmetoden er POST
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove'])) {

                // Hent verdien fra skjemaet under nøkkelen 'itemId'
                $itemId = $_POST['itemId'];

                // Gjør klar SQL Statement for å slette produkt fra Cart
                $deleteQuery = "DELETE FROM cart WHERE idid = ?";

                // Forbereder en MySQL-setning for å slette et element fra handlekurven ved hjelp av forberedte uttrykk.
                $stmt = mysqli_prepare($dbc, $deleteQuery);

                // Binder parameteren til det forberedte uttrykket.
                // Dette sikrer at verdien av $itemId blir riktig satt inn i SQL-setningen.
                mysqli_stmt_bind_param($stmt, "i", $itemId);

                // Utfør slettespørringen.
                // Dette trinn utfører den forberedte spørringen, som i dette tilfellet sletter et element fra handlekurven.
                // Hvis det oppstår en feil, avbryter programmet og viser feilmeldingen.
                mysqli_stmt_execute($stmt) or die('Feil ved sletting av vare fra handlekurven.');

                // Steng statementen
                mysqli_stmt_close($stmt);
            }
            // Forbered SQL-spørring for å hente handlekurvselementer for brukeren.
            // Dette trinnet oppretter et forberedt uttrykk for å hente elementer fra databasen basert på brukerens ID.
            $query = "SELECT * FROM cart WHERE kunde = ?";
            $stmt = mysqli_prepare($dbc, $query);

            // Binder parameteren til der forberedte uttrykket
            mysqli_stmt_bind_param($stmt, "i", $userId);

            //Utfør slettespørring
            // Dette trinnet utfører den forberedte spørringen, som i dette tilfellet sletter et element fra handlekurven.
            mysqli_stmt_execute($stmt);

            // Get the result from the statement
            $result = mysqli_stmt_get_result($stmt);

            // Initialiser Totalpris
            $totalPrice = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                
                echo "<br>";

                $productId = $row['produkt'];

                // Forbered SQL-spørring for å hente produktinformasjon.
                // Dette trinnet oppretter et forberedt uttrykk for å hente informasjon om et produkt basert på produktets ID.
                $productQuery = "SELECT * FROM produkter WHERE idProdukter = ?";
                $productStmt = mysqli_prepare($dbc, $productQuery);

                // Bind the parameter to the product statement
                mysqli_stmt_bind_param($productStmt, "i", $productId);

                // Execute the query to get product information
                mysqli_stmt_execute($productStmt);
                $productResult = mysqli_stmt_get_result($productStmt) or die('Error querying produkter table.');

                // Printe ut Produkt informasjon
                while ($productRow = mysqli_fetch_assoc($productResult)) {
                    echo "<br>" . $productRow["Størrelse"];
                    echo "<br>" . $productRow["Type"];
                    echo "<br> Price: " . $productRow["Pris"];

                    // Legg til produktpris til totalpri
                    $totalPrice += floatval($productRow["Pris"]);
                }

                //Legg til en remove knapp som fjerner identifiserte produkter
                echo "<form method='post'>";
                echo "<input type='hidden' name='itemId' value='{$row['idid']}'>";
                echo "<button type='submit' name='remove'>Remove</button>";
                echo "</form>";

                //Steng Produkt statement
                mysqli_stmt_close($productStmt);
            }

            // Printe Totalprisen  
            echo "<div class=total><br><strong>Totalpris: " . number_format($totalPrice, 2) . " kr</strong></div>";

            // Checkout form
      
            $query = "INSERT INTO bestilling (Bestillingsdato, Kunde) VALUES (CURDATE(), {$_SESSION['idKunde']})";
            mysqli_query($dbc, $query) or die('Error querying database.');
            // Få ID av siste lagt inn bestilling
            $orderId = mysqli_insert_id($dbc);

            // Gå gjennom elementene i handlekurven og sett dem inn i tabellen 'produkter_i_bestilling'.
            $result = mysqli_query($dbc, "SELECT produkt FROM cart WHERE kunde = {$_SESSION['idKunde']}");
            while ($row = mysqli_fetch_assoc($result)) {
                 // Hent produkt-ID fra raden i resultatsettet
                $productId = $row['produkt'];
                // Forbered SQL-spørring for å sette inn data i 'produkter_i_bestilling'-tabellen
                $insertQuery = "INSERT INTO produkter_i_bestilling (Produkt, Bestilling) VALUES ($productId, $orderId)";
                // Utfør spørringen for å sette inn data i tabellen
                mysqli_query($dbc, $insertQuery) or die('Error querying database.');
            }}
 ?>





 






   <?php   echo '<div class="checkout"><form action="confirmation.php" method="post">
            <input type="submit" name="checkout" value="Proceed to Checkout">
          </form></div>';  ?>






  <!--   <footer class="section-p1">

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
   

        <div class="copyright">
            <p>© 2023, SkoHubben</p>
            <a href="owner.html"><button class="owner">Made by Ammar</p></button>
                <a href="img/Designmanual (Skohubben) - Copy.pdf"><button class="owner">Designmanual (Skohubben)</p>
                        </button>
        </div>
    </footer>
 -->



</body>

</html>