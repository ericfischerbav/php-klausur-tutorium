<?php

include "properties.inc.php";

function get_components($product) {
	if(!isset($product)) {
		echo "Produkt nicht gesetzt!";
	}
	
	$c = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	$select = "SELECT name FROM komponente WHERE produkt = '".$product."'";
	
	$result = mysqli_query($c, $select);
	
	$komponenten = array();
	
	if($result != false) {
		while($row = mysqli_fetch_assoc($result)) {
			$komponenten[] = $row["name"];
		}
	}
	
	return $komponenten;
	
}

?>