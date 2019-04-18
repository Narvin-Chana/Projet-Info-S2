<?php
	function connection() {
		$connx = new mysqli("localhost","root","","googlies",3306);
		if ($connx->connect_errno) {
			die("Echec lors de la connexion MySQL");
		}
		return $connx;
	}
	function executeSQL($req) {
		$ServerSQL=connection();
		
		$data = $ServerSQL->query($req);
		if ($data==NULL) {
			die ("Probleme d'execution de la requete <br>");
		}
		return $data;
	}
	function convertTableToString($data) { //converti de la data en string 
		$data->data_seek(0);
	
		while($row=$data->fetch_assoc()) {
			foreach($row as $value)
			return("{$value}");	
		}
	
	}
	function research($input) {
		$req_research="SELECT ID_ARTICLE FROM ((article INNER JOIN categorie USING ID_CATEGORIE) INNER JOIN collection USING ID_COLLECTION) WHERE `NOM_ARTICLE`==".$input." OR `PRIX_HT`==".$input." OR `PRIX_TTC`==".$input." OR `NOM_CATEGORIE`==".$input." OR `NOM_COLLECTION`==".$input.";";
		if ($req_research != "") {
			return(convertTableToString(executeSQL($req_research)));
		}
		else {
			return("");
		}
	}
	function redirection($wanted_page){
		session_start();
		
		if($_SESSION['id']==NULL){
			
			$_SESSION["wanted_page"]=$wanted_page;
			header('location:connection.html');
			
		}
		else{
			header('location:'.$wanted_page);
		}
	}
	
?>
