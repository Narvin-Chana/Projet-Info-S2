<!DOCTYPE html>
<html lang=" fr">

<head>
    <title>googlies</title>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<header>
    <div class="container-navbar">

        <a href="index.html"><img src="img/googlies%20logo%20new.png" class="logo" alt="googlies logo"></a>

        <div class="search">

            <form action=search.php method="post">
                <label class="search-label">
                    <input type="text" name="q" class="search-bar" placeholder="Rechercher...">
                    <input type="submit" class="search-button">
                </label>
            </form>

        </div>

        <nav>
            <ul>
                <li><a href="connection.html">Espace Client</a></li>

                <li><a href="basket.html">Panier</a></li>

                <li><a href="index.html">Nous Contacter</a></li>
            </ul>
        </nav>
    </div>

</header>

<body>

    <div class="product">
        <form action="article.php" method="get">
            <?php

require("main.php");

if(isset($_POST["q"])) {
    $searchString = $_POST["q"];
    $searchString = preg_replace("#[^0-9a-z]#i","",$searchString);
    
    $articles = executeSQL("
SELECT DISTINCT * 
FROM (article natural join collection natural join categorie)
WHERE `NOM_ARTICLE` like '%{$searchString}%' OR `DESCRIPTION` like '%{$searchString}%' OR `NOM_CATEGORIE` like '%{$searchString}%' OR `NOM_COLLECTION`like '%{$searchString}%'
");
    
    $len = mysqli_num_rows($articles);
 
    if($len == 0) {
        echo "Il n'y a pas eu de résultat!"; 
    }
    else {
        while($row = $articles->fetch_assoc()) {
            $articleName = $row["NOM_ARTICLE"];
            $price = $row["PRIX_TTC"];
            $image = $row["IMAGE"];
        
            echo $articleName;
                foreach($row["NOM_ARTICLE"] as $value) { ?>


            <input type=submit name="<?php echo $value; ?>">

            <?php }
                foreach($row["IMAGE"] as $value){ 
            ?>

            <img src="<?php echo $value ?>">
        </form>
    </div>



</body>

</html>
<?php 
            
            
} } } }

?>
