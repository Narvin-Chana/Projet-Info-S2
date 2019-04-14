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
	function research(c) {
		$req_research="SELECT ID_ARTICLE FROM ((article INNER JOIN categorie USING ID_CATEGORIE) INNER JOIN collection USING ID_COLLECTION) WHERE `NOM_ARTICLE`==".c." OR `PRIX_HT`==".c." OR `PRIX_TTC`==".c." OR `NOM_CATEGORIE`==".c." OR `NOM_COLLECTION`==".c.";";
		return(convertTableToString(executeSQL($req_research)));
	}
?>
