<?php 

$deleteId = $_POST['delete'];

$mySQL = new mysqli("localhost", "root", "root", "leaflet");
$mySQL -> query('DELETE FROM `marker` WHERE `id` = "'.$deleteId.'"');

$mySQL -> close();
header('Location: /');

?>