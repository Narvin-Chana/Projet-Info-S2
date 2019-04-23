<?php
require("main.php");
session_start();

$article_id=$_GET["id"];
$req_img = "SELECT article.IMAGE FROM article where article.ID_ARTICLE={$article_id}; ";
$req_nom_produit = "SELECT article.NOM_ARTICLE FROM article where article.ID_ARTICLE={$article_id}; ";
$req_prix_ttc = "SELECT article.PRIX_TTC FROM article where article.ID_ARTICLE={$article_id}; ";
$req_category = "SELECT categorie.NOM_CATEGORIE FROM (article NATURAL JOIN categorie ) where article.ID_ARTICLE={$article_id}; ";
$req_collection = "SELECT collection.NOM_COLLECTION FROM (article NATURAL JOIN collection) where article.ID_ARTICLE={$article_id}; ";
$req_description = "SELECT article.DESCRIPTION FROM article where article.ID_ARTICLE={$article_id}; ";


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon panier</title>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<header>
    <div class="container-navbar">

        <a href="index.php"><img src="img/googlies%20logo%20new.png" class="logo" alt="googlies logo"></a>

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

                <li><a href="account.php">Espace Client</a></li>

                <li><a href="basket.html">Panier</a></li>

                <li><?php
                 if($_SESSION['id']==NULL){
                     //var_dump($_SESSION);
                     echo("<a href='connection.html'>Connexion</a>");
                }
                else{
                    echo("<a href='disconnection.php'>Deconnexion</a>");
                }
                ?></li>
            </ul>
        </nav>
    </div>

</header>

<body>
    <div id="page">

        <p style="text-align: center; margin:0; margin-top:2%; font-weight: bold; font-size: 2em; text-decoration: underline;"> <?php echo(convertTableToString(executeSQL($req_nom_produit)));?> </p>

        <img id="imgProduct" src="img/articles/<?php echo(convertTableToString(executeSQL($req_img)));?>" style="width: 20%; margin: 3%; float: left;">

        <div style="float:right; margin-right: 10%; padding: 10px;">
            <p style="font-size: 4em; border: 2px solid black;"> <?php $prix_ttc = convertTableToString(executeSQL($req_prix_ttc)); echo($prix_ttc);?>€</p>

            <button type="submit" name="addToBasket">Ajouter au panier</button>

        </div>

        <div style="margin-top: 5%;">
            <p> <?php echo(convertTableToString(executeSQL($req_category)));?> de <?php echo(convertTableToString(executeSQL($req_collection)));?> </p>
        </div>

        <p> <?php echo(convertTableToString(executeSQL($req_description)));?> </p>


    </div>
</body>

</html>
