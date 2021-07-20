<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Leaflet test</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="formStyle.css">

  <link rel="stylesheet" href="mapStyle.css">

  <link rel="stylesheet" href="newStyle.css">

  <link rel="stylesheet" href="scrollStyler.css">


	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script> 


  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	

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
<!--
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
-->
<div class="scrollStuff">
<!--<button class="open-button-coord" return onclick="openForm2()">Построить маршрут</button> -->
 <div class="custom-control-menu">
  <ul><li><div class="form_radio">
  <input id="radio1" type="radio" name="radio" value="1">
  <label for="radio-1"><img src="logo.svg" width="50" height="30">&nbsp;Крауд</label>
   </div></li>
   <li><div class="form_radio">
  <input id="radio2" type="radio" name="radio" value="2">
  <label for="radio-2"><img src="logoVolcheka.png" width="20" height="20">&nbsp;Булочная 1</label>
   </div></li>
  <li> <div class="form_radio">
  <input id="radio3" type="radio" name="radio" value="3">
  <label for="radio-3"><img src="logoVolcheka.png" width="20" height="20">&nbsp;Булочная 2</label>
   </div></li>
 <li><div class="form_radio">
  <input id="radio4" type="radio" name="radio" value="4">
  <label for="radio-4"><img src="logoVolcheka.png" width="20" height="20">&nbsp;Булочная 3</label>
   </div></li>
 <li><div class="form_radio">
  <input id="radio5" type="radio" name="radio" value="5">
  <label for="radio-5"><img src="logoVolcheka.png" width="20" height="20">&nbsp;Булочная 4</label>
   </div></li>
  <li><div class="form_radio">
  <input id="radio6" type="radio" name="radio" value="6">
  <label for="radio-6"><img src="newG.jpg" width="20" height="20">&nbsp;Новая голандия</label>
   </div></li>
  <li><div class="form_radio">
  <input id="radio7" type="radio" name="radio" value="7">
  <label for="radio-7">&nbsp;Все метки</label>
   </div></li></ul>
</div> 
<div class="routing-panel" id="controls"></div>
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
  .setContent('<p class="h2"><strong>' + massFromJson[key].name + '</strong></p>' + '<p><mark>' + massFromJson[key].adress + '</mark></p>' + '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"><div class="carousel-inner"><div class="carousel-item active"><img src="forest.jpg" class="d-block w-100" alt="..."></div><div class="carousel-item"><img src="roud.jpg" class="d-block w-100" alt="..."></div><div class="carousel-item"><img src="anotherplanet.jpg" class="d-block w-100" alt="..."></div><div class="carousel-item"><img src="newG.jpg" class="d-block w-100" alt="..."></div><div class="carousel-item"><img src="nevotresh.jpg" class="d-block w-100" alt="..."></div></div><button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Предыдущий</span></button><button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Следующий</span></button></div>' + '<form method="post" > <input type="hidden" name="delete" value="' + massFromJson[key].id + '"> <p> <div class="d-grid gap-2 d-md-flex justify-content-md-end"> <button  class="btn btn-danger" type="button"  onclick="deleteMarker()">Удалить</button> </div> </p> </form>')

var newMarker = new L.marker([massFromJson[key].coordinates1, massFromJson[key].coordinates2], {icon: redlogo}).addTo(mymap);
newMarker.bindPopup(popup);

}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
d
</body>
</html>