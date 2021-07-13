
<?php
header('Content-Type: application/json');

 $markerName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
 $markerAdress = filter_var(trim($_POST['adress']), FILTER_SANITIZE_STRING);
 $markerCoord1 = filter_var(trim($_POST['coordinates1']), FILTER_SANITIZE_STRING);
 $markerCoord2 = filter_var(trim($_POST['coordinates2']), FILTER_SANITIZE_STRING);

echo $markerCoord1;
echo ' ';
echo $markerCoord2;


$mySQL = new mysqli("localhost", "root", "root", "leaflet");
$mySQL -> query("INSERT INTO `marker` (`name`, `adress`, `coordinates1`, `coordinates2`)
	VALUES ('$markerName','$markerAdress',' $markerCoord1', '$markerCoord2')"); 

header('Location: /');
exit();
?>
