
<?php
 $markerName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
 $markerAdress = filter_var(trim($_POST['adress']), FILTER_SANITIZE_STRING);
 $markerCoord1 = filter_var(trim($_POST['coordinates1']), FILTER_SANITIZE_STRING);
 $markerCoord2 = filter_var(trim($_POST['coordinates2']), FILTER_SANITIZE_STRING);



$mySQL = new mysqli("localhost", "root", "root", "leaflet");
$mySQL -> query("INSERT INTO `marker` (`name`, `adress`, `coordinates1`, `coordinates2`)
	VALUES ('$markerName','$markerAdress','$markerCoord1','$markerCoord2')"); 

header('Location: /');
exit();
?>
