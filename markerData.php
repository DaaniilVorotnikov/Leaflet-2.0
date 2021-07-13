
<?php
header('Content-Type: application/json');

 $markerName = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
 $markerAdress = filter_var(trim($_POST['adress']), FILTER_SANITIZE_STRING);
 //$markerCoord1 = filter_var(trim($_POST['coordinates1']), FILTER_SANITIZE_STRING);
 //$markerCoord2 = filter_var(trim($_POST['coordinates2']), FILTER_SANITIZE_STRING);
//$newcoord = $_POST['post_data'];
//$_POST['post_data'];
//echo json_encode($_POST['post_data']);

//$massFromJsn = var_dump(json_decode($dataJson, true));


$mySQL = new mysqli("localhost", "root", "root", "leaflet");
$mySQL -> query("INSERT INTO `marker2` (`name`, `adress`, `coordinates`)
	VALUES ('$markerName','$markerAdress',' $newcoord')"); 

//header('Location: /');
//exit();
?>
