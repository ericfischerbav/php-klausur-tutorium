<?php

include "properties.inc.php";

class Reklamateur {
	
	public $id = "";
	public $name = "";
	public $tel = "";
	public $anschrift = "";
	
	private $c;
	
	public function __construct() {
		$this->c = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$this->generate_id();
	}
	
	private function generate_id() {
		$id_found = false;
		$id = 0;
		while($id_found == false) {
			$id = rand(0, 9999999999);
			$select = "SELECT * FROM reklamateur WHERE id = '".$id."'";
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
	
}

class Reklamation {
	
	private $id = "";
	
	public $produkt = "";
	public $komponente = "";
	public $datum = "";
	public $reklamateur;
	
	private $c;
	
	public function __construct($id = "") {
		$this->c = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$this->reklamateur = new Reklamateur();
		
		if($id == "") {
			$this->generate_id();
			$this->datum = date("d.m.Y");
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
		$select_rekla = "SELECT * FROM reklamation WHERE id = '".$this->id."'";
		$rekla = mysqli_query($this->c, $select_rekla);
		$row_rekla = mysqli_fetch_assoc($rekla);
		$this->produkt = $row_rekla["produkt"];
		$this->komponente = $row_rekla["komponente"];
		$this->datum = $row_rekla["datum"];
		$select_reklamateur = "SELECT * FROM reklamateur WHERE id = '".$row["reklamateur"]."'";
		$reklamateur = mysqli_query($this->c, $select_reklamateur);
		$row_reklamateur = mysqli_fetch_assoc($reklamateur);
		$this->reklamateur->id = $row_reklamateur["id"];
		$this->reklamateur->name = $row_reklamateur["name"];
		$this->reklamateur->tel = $row_reklamateur["tel"];
		$this->reklamateur->anschrift = $row_reklamateur["anschrift"];
	}
	
	public function save() {
		$reklamateur_insert = "INSERT INTO reklamateur (id, name, tel, anschrift) VALUES (".
		"'".$this->reklamateur->id."', ".
		"'".$this->reklamateur->name."', ".
		"'".$this->reklamateur->tel."', ".
		"'".$this->reklamateur->anschrift."'".
		")";
		
		$rekla_insert = "INSERT INTO reklamation (id, produkt, komponente, reklamateur, datum) VALUES (".
		"'".$this->id."', ".
		"'".$this->produkt."', ".
		"'".$this->komponente."', ".
		"'".$this->reklamateur->id."', ".
		"'".$this->datum."'".
		")";
		
		mysqli_query($this->c, $reklamateur_insert);
		mysqli_query($this->c, $rekla_insert);
	}
	
	// GETTER
	public function get_id() {
		return $this->id;
	}
	
}

/*
* Ab hier der Testcode.
*/
/*
$reklamation = new Reklamation();
$reklamation->produkt = "Laptop";
$reklamation->komponente = "Maus";
$reklamation->reklamateur->name = "Felix";
$reklamation->reklamateur->tel = "0815";
$reklamation->reklamateur->anschrift = "Von Nebenan";
$reklamation->save();
*/
?>