<?php
if (isset($_POST['submit'])) {
    //Gjøre om POST data til variabler
    $Fulltnavn = $_POST['Fulltnavn'];
    $passord = ($_POST['passord']);
    $Addresse = $_POST['Addresse'];
    $Telefonnummer = $_POST['Telefonnummer'];


    //Koble til databasen
    $dbc = mysqli_connect('localhost', 'root', '', 'skohubben')
        or die('Error connecting to MySQL server.');

    //Gjøre klar SQL-strengen
    $query = "INSERT INTO kunde(Fulltnavn, passord, Addresse, Telefonnummer) VALUES ('$Fulltnavn','$passord', '$Addresse', '$Telefonnummer')";

    //Utføre spørringen
    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    //Koble fra databasen
    mysqli_close($dbc);

    //Sjekke om spørringen gir resultater
    if ($result) {
        //Gyldig Login
        echo "Takk for at du lagde bruker! Trykk <a href='login.php'>her</a> for å logge inn";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP registrering</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <p>Opprett ny bruker</p>
    <form method="post">
        <label for="Fulltnavn">Fulltnavn:</label>
        <input type="text" name="Fulltnavn" /><br />
        <label for="passord">Passord:</label>
        <input type="password" name="passord" /><br />
        <label for="text">Addresse:</label>
        <input type="text" name="Addresse" /><br />
        <label for="number">Telefonnummer:</label>
        <input type="number" name="Telefonnummer" /><br />

        <input type="submit" value="Logg inn" name="submit" />
    </form>
</body>






</html>