<?php
require("main.php");

session_start();
if($_SESSION['id']==NULL){
    redirection("basket.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Votre panier</title>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<header>
    <div class="container-navbar">

        <a href="index.php"><img src="img/googlies%20logo%20new.png" class="logo" alt="googlies logo"></a>

        <nav>
            <ul>

                <li><a href="account.php">Espace Client</a></li>

                <li><a href="basket.php">Panier</a></li>

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


</body>

</html>
