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

    <form style="padding: 0;" action="article.php" method="get">
        <?php  session_start();

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
        while($row = mysqli_fetch_assoc($articles)) {
            $articleName = $row["NOM_ARTICLE"];
            $price = $row["PRIX_TTC"];
            $image = $row["IMAGE"];
            $desc = $row["DESCRIPTION"];
            ?>

        <div style="text-align: center; border: 1px solid black; margin-left: 2%; margin-right:0; margin-top: 1%; margin-bottom: 1%; padding: 0;">

            <h2><?php echo $articleName; ?></h2>

            <img src="<?php echo "img/articles/".$image ?>" alt="<?php echo $articleName; ?>" style="width: 10%;">

            <p><?php echo $desc; ?></p>

            <input type=submit name="<?php echo $articleName; ?>">
        </div>

    </form>



</body>

</html>
<?php 
            
            
} } } 

?>
