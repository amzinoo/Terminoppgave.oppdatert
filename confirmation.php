<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add any additional styles or scripts here -->
</head>

<body>
    <div class="confirmation-wrapper">
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['idKunde'])) {
            // Koble til databasen
            $dbc = mysqli_connect('localhost', 'root', '', 'skohubben') or die('Error connecting to MySQL server');

            // Get the user ID from the session
            $userId = $_SESSION['idKunde'];

            // Gjør klar SQL-strengen for å hente kundeinformasjon
            $customerQuery = "SELECT * FROM users WHERE idKunde = ?";
            $customerStmt = mysqli_prepare($dbc, $customerQuery);
            mysqli_stmt_bind_param($customerStmt, "i", $userId);
            mysqli_stmt_execute($customerStmt);

            // Hent resultatet fra spørringen
            $customerResult = mysqli_stmt_get_result($customerStmt);
            $customer = mysqli_fetch_assoc($customerResult);

            // Skriv ut kundeinformasjon
            echo "<h2>Order Confirmation</h2>";
            echo "<p><strong>Name:</strong> " . $customer['Name'] . "</p>";
            echo "<p><strong>Address:</strong> " . $customer['Address'] . "</p>";

            // Gjør klar SQL-strengen for å hente produkter i bestillingen
            $orderQuery = "SELECT p.*, b.Bestillingsdato FROM produkter AS p
                            INNER JOIN produkter_i_bestilling AS pb ON p.idProdukter = pb.Produkt
                            INNER JOIN bestilling AS b ON pb.Bestilling = b.idBestilling
                            WHERE b.Kunde = ?";
            $orderStmt = mysqli_prepare($dbc, $orderQuery);
            mysqli_stmt_bind_param($orderStmt, "i", $userId);
            mysqli_stmt_execute($orderStmt);

            // Hent resultatet fra spørringen
            $orderResult = mysqli_stmt_get_result($orderStmt);

            // Skriv ut produktinformasjon
            echo "<h3>Ordered Products:</h3>";
            while ($product = mysqli_fetch_assoc($orderResult)) {
                echo "<p><strong>Product:</strong> " . $product['ProductName'] . "</p>";
                echo "<p><strong>Price:</strong> " . $product['Price'] . " kr</p>";
                echo "<hr>";
            }

            // Close the database connection
            mysqli_close($dbc);
        } else {
            echo "Please log in to view your order confirmation.";
        }
        ?>
    </div>
</body>

</html>