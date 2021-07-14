<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Leaflet test</title>

	<link rel="stylesheet" href="formStyle.css">

  <link rel="stylesheet" href="mapStyle.css">

	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script> 


  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


	

</head>
<body style="overflow:hidden;">

<button class="open-button" return onclick="openForm()">Добавить</button>
<button class="open-button-coord" return onclick="openForm()">Построить маршрут</button>

<div class="form-popup" id="myForm">
  <form method="post" action="markerData.php" id="main_form" class="form-container">
    <h1>Новый маркер</h1>

    <label for="name"><b>Название места:</b></label>
    <input type="text" name="name">


    <label for="adress"><b>Адрес:</b></label>
    <input type="text" name="adress" >



    <input type="hidden" name="coordinates1" id="c1">


    <input type="hidden" name="coordinates2" id="c2">

    <button type="submit" class="btn">Сохранить</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Закрыть</button>

  </form>


</div>


<?php

  $mySQL = new mysqli("localhost", "root", "root", "leaflet");
  $getMarker = $mySQL -> query("SELECT * FROM `marker`");

while ($massMarker = $getMarker -> fetch_assoc()){
  $jsSend[] = $massMarker;
}
$mySQL -> close();
$jsonStr = json_encode($jsSend);


?>


<div class="custom-popup" id="mapid"></div>
<script src="mapscript.js"></script> 
<script type="text/javascript"> 

 var strJsonFromPHP = '<?php echo $jsonStr;?>';
 var massFromJson = JSON.parse(strJsonFromPHP);
 

 for(var key in massFromJson){

var popup = L.popup()
  .setContent('<h2>' + massFromJson[key].name + '</h2>' + '<p>' + massFromJson[key].adress + '</p>' + '<img src="nevotresh.jpg" width="550" height="300">' + '<form method="post" action="#" > <input type="hidden" name="delete" value="' + massFromJson[key].id + '"> <button type="button" onclick="deleteMarker()">Удалить</button> </form>')


var newMarker = new L.marker([massFromJson[key].coordinates1, massFromJson[key].coordinates2], {icon: redlogo}).addTo(mymap)
newMarker.bindPopup(popup);

}



</script>

</body>
</html>