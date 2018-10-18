<?php
/*

Diese File ist nur zur Demonstration, was das mysqli_result-Objekt und der
$row-Array enthalten. Die Ausgabe ist in JSON notiert.

*/

include "properties.inc.php";

$c = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$result = mysqli_query($c, "SELECT * FROM reklamateur");

var_dump($result);
echo "<br/>";

while($row = mysqli_fetch_assoc($result)) {
	var_dump($row);
	echo "<br/>";
}

?>