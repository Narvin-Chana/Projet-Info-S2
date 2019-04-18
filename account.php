<?php

require("main.php");

session_start();
if($_SESSION['id']==NULL){
    redirection("account.php");
}

$client_id=$_SESSION["id"];


$req_nom="SELECT client.NOM FROM client where client.ID_CLIENT=".$client_id."; ";
$req_prenom="SELECT client.PRENOM FROM client where client.ID_CLIENT=".$client_id."; ";
$req_email="SELECT client.EMAIL FROM client where client.ID_CLIENT=".$client_id."; ";
$req_tel="SELECT client.TELEPHONE FROM client where client.ID_CLIENT=".$client_id."; ";
$req_bd="SELECT client.DATE_NAISSANCE FROM client where client.ID_CLIENT=".$client_id."; ";
$req_fp="SELECT client.PTS_FIDELITE FROM client where client.ID_CLIENT=".$client_id."; ";


$req_commandeids="SELECT commande.ID_COMMANDE FROM(commande Natural JOIN client NATURAL JOIN est_commande NATURAL JOIN article) where client.ID_CLIENT=".$client_id."; ";







?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon Compte</title>
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
            <table>
            <tr><p id="cmd">Mes commandes</p></tr>
            <tr>
                <th id="idc"><p>Id commande</p></th>
                    <th id="date"><p>Date Commande</p></th>
                    <th id="ec"><p>Etat</p></th>
                    <th id="mc"><p>Montant commande</p></th>
                </tr>
                <?php
                    $commandeids=executeSQL($req_commandeids);
                    $commandeids->data_seek(1);


                    while($row=$commandeids->fetch_assoc())
                    {
                       
                        

                        foreach($row as $value)
                            
                         
                            $commandedate=convertTableToString(executeSQL("SELECT commande.DATE_COMMANDE FROM(commande Natural JOIN client NATURAL JOIN est_commande NATURAL JOIN article) where client.ID_CLIENT={$client_id} AND commande.ID_COMMANDE={$value};"));
                            $commandeprix=convertTableToString(executeSQL("SELECT sum(article.PRIX_TTC) FROM(commande Natural JOIN client NATURAL JOIN est_commande NATURAL JOIN article) where client.ID_CLIENT={$client_id} AND commande.ID_COMMANDE={$value};"));
                            $commandeetat=convertTableToString(executeSQL("SELECT commande.etat FROM(commande Natural JOIN client NATURAL JOIN est_commande NATURAL JOIN article) where client.ID_CLIENT={$client_id} AND commande.ID_COMMANDE={$value}; "));
                            echo"<tr>";
                            echo "<td>{$value}</td>";
                            echo"<td>".$commandedate."</td>";
                            echo"<td>".$commandeetat."</td>";
                            echo"<td>".$commandeprix."</td>";
                            
                            echo "</tr>"."<br>";
                    }
                        echo'</table>'."<br>";
            

               

                ?>
            
        

        </div>
    </div>

</body>

</html>
