<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Leaflet test</title>
	<link rel="stylesheet" href="formStyle.css">

	
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script> 


   <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


	<style>
		 #mapid{
		 	position:absolute;
		 	z-index: 1;
			height: 100%;
			width: 100%;
		}
		
	</style>
</head>
<body style="overflow:hidden;">

<button class="open-button" return onclick="openForm()">Добавить</button>
<div class="form-popup" id="myForm">
  <form method="post" action="markerData.php" id="main_form" class="form-container">
    <h1>Новый маркер</h1>

    <label for="name"><b>Название места:</b></label>
    <input type="text" name="name">


    <label for="adress"><b>Адрес:</b></label>
    <input type="text" name="adress" >


    <?php include("coordBufer.php"); ?>

    <!--<label for="coordinates1"><b>Координаты1:</b></label> -->
    <input type="hidden" name="coordinates1" id="c1">

   <!-- <label for="coordinates2"><b>Координаты2:</b></label> -->
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
$jsonStr = json_encode($jsSend);

?>


<div id="mapid"></div>
<script src="mapscript.js"></script> 
<script type="text/javascript"> 

 var strJsonFromPHP = '<?php echo $jsonStr;?>';
 var massFromJson = JSON.parse(strJsonFromPHP);

 for(var key in massFromJson){

var newMarker = new L.marker([massFromJson[key].coordinates1, massFromJson[key].coordinates2]).addTo(mymap)
newMarker.bindPopup(massFromJson[key].name + '<br>' + massFromJson[key].adress);

}

</script>

</body>
</html>