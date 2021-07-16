<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Leaflet test</title>

	<link rel="stylesheet" href="formStyle.css">

  <link rel="stylesheet" href="mapStyle.css">

  <link rel="stylesheet" href="newStyle.css">

  <link rel="stylesheet" href="scrollStyler.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



	
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

<div class="form-popup2" id="myForm2">
  <form method="post" action="markerData.php" id="main_form" class="form-container">
    <h1>Построить маршрут</h1>

    <label for="name"><b>Начальная точка:</b></label>
    <input type="text" name="name">


    <label for="adress"><b>Конечная точка:</b></label>
    <input type="text" name="finish" >



    <button type="submit" class="btn">Сохранить</button>
    <button type="button" class="btn cancel" onclick="closeForm2()">Закрыть</button>

  </form>


</div>

<div class="scrollStuff" id="controls">
<!--<button class="open-button-coord" return onclick="openForm2()">Построить маршрут</button> -->
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
  .setContent('<p class="h2"><strong>' + massFromJson[key].name + '</strong></p>' + '<p><mark>' + massFromJson[key].adress + '</mark></p>' + '<img src="nevotresh.jpg"  width="550" height="300">' + '<form method="post" action="#" > <input type="hidden" name="delete" value="' + massFromJson[key].id + '"> <p> <div class="d-grid gap-2 d-md-flex justify-content-md-end"><div class="d-grid gap-2"> <button  class="btn btn-danger" type="button"  onclick="deleteMarker()">Удалить</button> </div> </div> </p> </form>')


var newMarker = new L.marker([massFromJson[key].coordinates1, massFromJson[key].coordinates2], {icon: redlogo}).addTo(mymap)
newMarker.bindPopup(popup);

}



</script>

</body>
</html>