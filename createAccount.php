<?php

require("main.php");

$serverSQL = connection();

$email = $_POST["email"];

$password = $_POST["password"];

$birthdate = strtotime($_POST["birthdate"]);
$birthdate = date('Y-m-d', $birthdate);

$surname = $_POST["surname"];

$name = $_POST["name"];

$telephone = $_POST["telephone"];

$sql = "INSERT INTO client (EMAIL,MDP,NOM,PRENOM,TELEPHONE,DATE_NAISSANCE) VALUES('$email','$password','$surname','$name','$telephone','$birthdate')";

if($serverSQL->query($sql) === TRUE) {
    echo "Compte créé!";
}
else {
    echo "Erreur: " . $sql . "<br>" . $serverSQL->error;
}

$serverSQL->close();

?>
