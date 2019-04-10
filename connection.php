<?php

    include("main.php");

	//$email_written et $password_written est donneé par un formulaire
	$email_written=$_POST["mail"];
	$password_written=$_POST["password"];

	
	$ServerSQL=connection();


	$req_a="select client.EMAIL from client;";
	$email_list=$ServerSQL->query($req_a);
	$email_list->data_seek(0);
	while($row=$email_list->fetch_assoc())
	{
		foreach($row as $value)
		if("{$value}"==$email_written){
				
				
			$req_b="select client.MDP FROM client where client.EMAIL="."'".$email_written."'".";";
			$password_database = convertTableToString($ServerSQL->query($req_b));
			if($password_written==$password_database)
			{
				echo("redirection vers la page precedente");
				$req_c="select client.ID_CLIENT from client where client.EMAIL="."'".$email_written."'".";" ;
				$client_id=convertTableToString($ServerSQL->query($req_c));
				session_start();
				$_SESSION["id"]=$client_id;
				header('location:account.php');
				
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
    <form action="connection.php" method="POST">
        <table>
            <tr>
                <Th>connection</Th>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" name="mail"></td>
            </tr>
            <tr>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>

        </table>

    </form>



</body>

</html>
