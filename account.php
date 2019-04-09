<?php

include("main.php");

$req_nom="SELECT client.NOM FROM client where client.ID_CLIENT=1; ";
$req_prenom="SELECT client.PRENOM FROM client where client.ID_CLIENT=1; ";
$req_email="SELECT client.EMAIL FROM client where client.ID_CLIENT=1; ";
$req_tel="SELECT client.TELEPHONE FROM client where client.ID_CLIENT=1; ";
$req_bd="SELECT client.DATE_NAISSANCE FROM client where client.ID_CLIENT=1; ";
$req_fp="SELECT client.PTS_FIDELITE FROM client where client.ID_CLIENT=1; ";
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon Compte</title>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <div class="my_account">
        <p id="title">Mon Compte </p>
        <div class="client_info">
            <p>Nom: <?php echo(convertTableToString(executeSQL($req_nom)));?></p>
            <p>Prenom: <?php echo(convertTableToString(executeSQL($req_prenom)));?></p>
            <p>Email: <?php echo(convertTableToString(executeSQL($req_email)));?></p>
            <p>Telephone: 0<?php echo(convertTableToString(executeSQL($req_tel)));?></p>
            <p>Date de Naissance: <?php echo(convertTableToString(executeSQL($req_bd)));?></p>


        </div>
        <div class="loyalty_points">
            <p>vos points de fidelités:</p>
            <p id="pts"><?php convertTableToString(executeSQL($req_fp));?> </p>

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
