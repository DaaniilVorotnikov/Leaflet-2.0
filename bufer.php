<?php
include('markerData');
$mySQL = new mysqli("localhost", "root", "root", "leaflet");
$getMarker = $mySQL -> query("SELECT * FROM `marker` WHERE `name` = '$markerName' AND `adress` = '$markerAdress' AND  `coordinates1` = '$markerCoord1' AND `coordinates2`  = '$markerCoord2'");

$massMarker = $getMarker -> fetch_assoc();

$namePrinter = $massMarker[name];
//echo $namePrinter;   

$adressPrinter = $massMarker[adress];
//echo $adressPrinter;

$coord1Printer = $massMarker[coordinates1];
//echo $coord1Printer;

$coord2Printer = $massMarker[coordinates2];
//echo $coord2Printer;
?>