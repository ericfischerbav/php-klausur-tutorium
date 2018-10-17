<?php

include "properties.inc.php";

function create_rekla();

function create_rekla() {
	if(!isset($_POST["product"])) {
		echo "Produkt nicht gesetzt!";
	}
	
	$c = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	$select = "SELECT name FROM komponente WHERE produkt = '".$_POST["product"]."'";
	
	$result = mysqli_query($c, $select);
	
	$komponenten = "";
	
	if($result != false) {
		while($row = mysqli_fetch_assoc($result)) {
			$komponenten = $komponenten.$row["name"].", ";
		}
	} else {
		echo "DB-Fehler";
	}
	
	echo $komponenten;
	
}

?>