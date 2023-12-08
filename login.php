<?php
$feil="";
session_start();
if(isset($_POST['submit'])){
    //Gjøre om POST data til variabler
    $Fulltnavn = $_POST['Fulltnavn'];
    $passord = ($_POST['passord']);

    //Koble til databasen
    $dbc = mysqli_connect('localhost', 'root', '', 'skohubben')
    or die('Error connecting to MySQL server.');
    
    //Gjøre klar SQL-strengen
    $query = "SELECT * from kunde where Fulltnavn ='$Fulltnavn' and passord='$passord'";

    //Utføre spørringen
    $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

    while ($row = mysqli_fetch_assoc($result)){
        $_SESSION = $row; 
    }

    //Koble fra databasen
    mysqli_close($dbc);

    //Sjekke om spørringen gir resultater
    if($result->num_rows > 0){
        //Gyldig Login
        header('location: index1.php');
    }else{
        //ugyldig login
        $feil = "<div class='feil'>Feil Fullt Navn eller Passord</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylephp.css">
</head>
<body>



<p class="log">Vennligst Log inn</p>
<?php echo $feil; ?>
    <form method="post" >
        <label for="Fulltnavn">Fulltnavn:</label>
        <input type="text" name="Fulltnavn" /><br />
        <label for="passord">Passord:</label>
        <input type="Password" name="passord" /> <br />

        <input type="submit" value="Logg inn" name="submit" />
    </form>

    <p>Eller klikk <a href="registration.php">her</a> for å registrere ny bruker </p>
    

</body>
</html>