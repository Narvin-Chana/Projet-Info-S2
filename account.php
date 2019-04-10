<?php

require("main.php");
session_start();
$client_id=$_SESSION["id"];


$req_nom="SELECT client.NOM FROM client where client.ID_CLIENT=".$client_id."; ";
$req_prenom="SELECT client.PRENOM FROM client where client.ID_CLIENT=".$client_id."; ";
$req_email="SELECT client.EMAIL FROM client where client.ID_CLIENT=".$client_id."; ";
$req_tel="SELECT client.TELEPHONE FROM client where client.ID_CLIENT=".$client_id."; ";
$req_bd="SELECT client.DATE_NAISSANCE FROM client where client.ID_CLIENT=".$client_id."; ";
$req_fp="SELECT client.PTS_FIDELITE FROM client where client.ID_CLIENT=".$client_id."; ";
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon Compte</title>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<header>
    <table class="navbar">
        <tr>
            <td id="logo">
                <a href="index.html"><img id="main_logo" src="img/googlies%20logo.png"></a>
            </td>
            <td id="search-bar">
                <input type="text" placeholder="Rechercher...">
                <button id="submit-button" type="submit"></button>
            </td>
            <td id="espace-client">
                <a href="connection.html">Espace Client</a>
            </td>
            <td id="panier">
                <a href="basket.html">Panier</a>
            </td>
        </tr>
    </table>
</header>


<body>
    <div class="my_account">
        <p id="title">Mon Compte </p>
        <div class="client_info">
            <p>Nom: <?php echo(convertTableToString(executeSQL($req_nom)));?></p>
            <p>Prenom: <?php echo(convertTableToString(executeSQL($req_prenom)));?></p>
            <p>Email: <?php echo(convertTableToString(executeSQL($req_email)));?></p>
            <p>Telephone: <?php echo(convertTableToString(executeSQL($req_tel)));?></p>
            <p>Date de Naissance: <?php echo(convertTableToString(executeSQL($req_bd)));?></p>


        </div>
        <div class="loyalty_points">
            <p>vos points de fidelités:</p>
            <p id="pts"><?php echo(convertTableToString(executeSQL($req_fp)));?> </p>

        </div>
        <div class="orders">
            Mes commandes
            <table>

                <tr>
                    <th>Id commande</th>
                    <th>Montant commande</th>
                    <th>Etat</th>
                </tr>
            </table>

        </div>
    </div>

</body>

</html>
