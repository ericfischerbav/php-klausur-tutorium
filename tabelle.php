<?php

$spiele = array("Bayern - Wolfsburg", "Stuttgart - Berlin", "BVB - Gladbach");

?>

<html>

<head>
	<title>Titel</title>
</head>

<body>
	<h1>Tabelle</h1>
	<form action="tabelle.php" method="post">
		<table>
			<?php
				foreach($spiele as $spiel) :
			?>
			<tr>
				<th><?php echo $spiel; ?></th>
				<td><input type="text" name="anz" /></td>
				<td><input type="submit" name="<?php echo $spiel; ?>" value="Auswählen" /></td>
			</tr>
			<?php
			endforeach;
			?>
		</table>
	</form>
</body>

</html>