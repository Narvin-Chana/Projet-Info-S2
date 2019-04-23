<?php
require("main.php");
session_start();

$article_id=$_GET["id"];
//$article_id=1;
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
        <table id="tableStyle">
            <tr>
                <td id="tableImgProduct"><img id="imgProduct" src="img/articles/<?php echo(convertTableToString(executeSQL($req_img)));?>></td>
                <td>
                    <table id="tableInfoStyle">
                        <tr>
                            <td id="infoProduct">
                                <p> <?php echo(convertTableToString(executeSQL($req_nom_produit)));?> </p>
                            </td>
                        </tr>
                        <tr>
                            <td id="infoProduct">
                                <p> <?php $prix_ttc = convertTableToString(executeSQL($req_prix_ttc));
				                    echo($prix_ttc);?>
                                </p>
                            </td>
                        </tr>
                    
                </td>
                <td id="categoryProduct">
                    <p> <?php echo(convertTableToString(executeSQL($req_category)));?> de <?php echo(convertTableToString(executeSQL($req_collection)));?> </p>
                    
                        <tr>
                            <td style="padding-left:55%;">
                                <div id="ajoutPanier">
                                    <a href="basket.html">Ajouter au panier
                                        <pre><br></pre></a>
                                </div>
                            </td>
                        </tr>
                  
                </td>
            </tr>
            <tr>
                <td colspan=3 id="descrProduct">
                    <p> <?php echo(convertTableToString(executeSQL($req_description)));?> </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
