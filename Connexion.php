

<?php
//////Fonction
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
			return("{$value}");	
		}
	
	}

//////Main

	//$email_ecrit et $mdp_ecrit est donneé par un formulaire
	$email_ecrit=$_POST["mail"];
	$mdp_ecrit=$_POST["mdp"];

	
	$ServeurSQL=Connexion();



	$req_a="select client.EMAIL from client;";
	$liste_email=$ServeurSQL->query($req_a);
	$liste_email->data_seek(0);
	while($row=$liste_email->fetch_assoc())
	{
		foreach($row as $value)
		if("{$value}"==$email_ecrit){
				
				
			$req_b="select client.MDP FROM client where client.EMAIL="."'".$email_ecrit."'".";";
			$mdp_base = traduitTable($ServeurSQL->query($req_b));
			if($mdp_ecrit==$mdp_base)
			{
				echo("redirection vers la page precedente");
				$req_c="select client.ID_CLIENT from client where client.EMAIL="."'".$email_ecrit."'".";" ;
				$id_du_client=traduitTable($ServeurSQL->query($req_c));
				die();
				
			}
			$message="Mot de passe incorrect ";
		
			


		}
		else
		{
			$message="L'email n'est pas dans notre Base client";
			
		}


	}



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Autentification</title>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <?php echo($message)?>
    <form action="Connexion.php" method="POST">
            <table>
                    <tr><Th>Connexion</Th></tr>
                    <tr><td></td></tr>
                    <tr><td><input type="text"name="mail"></td></tr>
                    <tr><td><input type="text" name="mdp"></td></tr>
                    <tr><td><input type="submit" ></td></tr>
                    
                    </table>

    </form>



</body>
</html>
