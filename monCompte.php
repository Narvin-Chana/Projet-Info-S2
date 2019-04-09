<?php
function Connexion()
{
	$connx = new mysqli("localhost","root","","googlies",3306);
	if ($connx->connect_errno)
	{
		die("Echec lors de la connexion MySQL");
	}
	return $connx;
}
function executeSQL($req)
{
	$ServeurSQL=Connexion();
	
	$data = $ServeurSQL->query($req);
	if ($data==NULL)
	{
		die ("Probleme d'execution de la requete <br>");
	}
    return $data;
}

function traduitTable($data)//converti de la data en string
{
    $data->data_seek(0);
   
	while($row=$data->fetch_assoc())
	{
		foreach($row as $value)
		echo "{$value}";	
	}
	
}

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
    <div class ="Mon_compte">
        <p id="titre">Mon Compte </p>
        <div class="info_client">
            <p>nom: <?php traduitTable(executeSQL($req_nom));?></p>
            <p>prenom: <?php traduitTable(executeSQL($req_prenom));?></p>
            <p>email: <?php traduitTable(executeSQL($req_email));?></p>
            <p>telephone: 0<?php traduitTable(executeSQL($req_tel));?></p>
            <p>date de naissance: <?php traduitTable(executeSQL($req_bd));?></p>
            
        </div>
        <div class="point_fidelite" >
            <p>vos points de fidelités:</p>
            <p><?php traduitTable(executeSQL($req_fp));?> </p>

        </div>
        <div class="commande">
                Mes commandes
            <table>
                
                <tr><th>Id commande</th><th>Montant commande</th><th> Etat</th></tr>
            </table>
           
            

        </div>
    </div>
    


</body>

</html>
