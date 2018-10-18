<?php

include "component_search.php";



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
	else :
	?>
	<p>Reklamation wurde erfasst</p>
	<?php
	endif;
	?>
	
</body>

</html>