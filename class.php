<?php

include "properties.inc.php";

class Reklamation {
	
	private $id = "";
	
	public $produkt = "";
	public $komponente = "";
	public $datum = "";
	public $reklamateur = new Reklamateur();
	
	private $c;
	
	public function __construct($id = "") {
		$this->c = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
		if($id == "") {
			$this->generate_id();
		} else {
			$this->id = $id;
			fetch_data();
		}
	}
	
	private function generate_id() {
		$id_found = false;
		$id = 0;
		while($id_found == false) {
			$id = rand(0, 9999999999);
			$select = "SELECT * FROM reklamation WHERE id = '".$id."'";
			$result = mysqli_query($this->c, $select);
			$count = 0;
			while($result = mysqli_fetch_assoc($result)) {
				$count++;
			}
			if($count == 0) {
				$id_found = true;
			}
		}
		$this->id = $id;
	}
	
	private function fetch_data() {
		$select = "SELECT * FROM reklamation WHERE id = '".$this->id."'";
		$result = mysqli_query($this->c, $select);
		$row = mysqli_fetch_assoc($result);
		// alle Werte in die Variablen speichern...
	}
	
}

class Reklamateur {
	
	public id = "";
	public $name = "";
	public $tel = "";
	public $anschrift = "";
	
}

?>