<?php session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>googlies</title>
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

                <li><a href="basket.php">Panier</a></li>

                <li><?php
                 if($_SESSION['id']==NULL){
                     //var_dump($_SESSION);
                     echo("<a href='connection.html'>Connexion</a>");
                     $_SESSION["wanted_page"]="index.php";
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

    <h1 style="text-align: center;">Bienvenue sur googlies!!</h1>

</body>

</html>
