<?php
//Variabler för databaskoppling
$dbhost     = "localhost";
$dbname     = "te2imdb";
$dbuser     = "root";
$dbpass     = "";

//Koppla till databasen
$DBH = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Välj felhantering (här felsökningsläge)
$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

// Förbered databasfråga med placeholders (markerade med : i början)
$STH = $DBH->prepare("SELECT * FROM tbl_produkter");



//Utför databasfrågan
$STH->execute();

//Stäng av databaskopplingen
$DBH = null;

//Hämtar värden
$results = $STH->fetchAll();

//print_r($results)

?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
    foreach($results as $product ){
        ?>
        <a href="produkt.php?produktid=<?php echo $product["id"]; ?>"><?php echo $product["titel"] ?></a> <br>
        <img src="<?php echo $product["bild"] ?>">
       <p>PRIS: <?php echo $product["pris"] ?></p>
        <?php
    }
?>


</body>
</html>