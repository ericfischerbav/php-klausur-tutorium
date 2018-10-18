<?php

include "component_search.php";
include "class.php";

if(isset($_POST["button"])) {
	if(!isset($_POST["komponente"]) and !isset($_POST["name"]) and !isset($_POST["tel"]) and !isset($_POST["adresse"])) {
		$error = "Bitte alles ausfüllen.";
	} else {
		$reklamation = new Reklamation();
		$reklamation->produkt = $_POST["product"];
		$reklamation->komponente = $_POST["komponente"];
		$reklamation->reklamateur->name = $_POST["name"];
		$reklamation->reklamateur->anschrift = $_POST["adresse"];
		$reklamation->reklamateur->tel = $_POST["tel"];
		$reklamation->save();
	}
}

?>

<!doctype html>
<html>

<head>
	<title>Reklamation erfassen</title>
</head>

<body>
	<h1>Reklamation erfassen</h1>
	
	
	<?php
	if(!isset($_POST["button"])) :
	?>
	<form action="erfassung.php" method="post">
		<select name="komponente">
			<?php
				foreach(get_components($_POST["product"]) as $komponente) {
					echo "<option>".$komponente."</option>";
				}
			?>
		</select><br>
		Name: <input type="text" name="name" placeholder="Name eingeben" /><br>
		Adresse: <input type="text" name="adresse" placeholder="Adresse eingeben" /><br>
		Tel-Nr.: <input type="text" name="tel" placeholder="Tel-Nr. eingeben" /><br/>
		<input type="hidden" name="product" value="<?php echo $_POST["product"]; ?>" />
		<input type="submit" name="button" value="Senden" />
	</form>
	<?php
	elseif (isset($error)) :
	?>
	<p><?php echo $error; ?></p>
	<?php
	else :
	?>
	<p>Reklamation wurde erfasst</p>
	<?php
	endif;
	?>
	
</body>

</html>