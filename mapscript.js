var mymap = L.map('mapid').setView([59.9386, 30.3141], 13);
var maPiter = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a rel="nofollow" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

// var controls = ('controls');


var redlogo = L.icon({
    iconUrl: 'leaf-red.png',

    iconSize:     [28, 55], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location// the same for the shadow
    popupAnchor:  [-3, -76]
});

var logoIcon = L.icon({
    iconUrl: 'logo.svg',

    iconSize:     [98, 195], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location// the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

var logoIconVolcheka = L.icon({
    iconUrl: 'logoVolcheka.png',

    iconSize:     [38, 55], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location// the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});



var marker = L.marker([59.910398, 30.285935],{icon: logoIcon})
marker.bindPopup("<b>Крауд</b>") 
 

var markerVolcheka1 = L.marker([59.910731, 30.297485],{icon: logoIconVolcheka})
markerVolcheka1.bindPopup("<b>Булочная</b><br> Ф.Вольчека")


 
var  markerVolcheka2 = L.marker([59.915989, 30.314136],{icon: logoIconVolcheka})
markerVolcheka2.bindPopup("<b>Булочная</b><br> Ф.Вольчека")



var  markerVolcheka3 = L.marker([59.922152, 30.285125],{icon: logoIconVolcheka})
markerVolcheka3.bindPopup("<b>Булочная</b><br> Ф.Вольчека")


var  markerVolcheka4 = L.marker([59.924522, 30.305639],{icon: logoIconVolcheka})
markerVolcheka4.bindPopup("<b>Булочная</b><br> Ф.Вольчека")

var polygon = L.polygon([
    [59.929332, 30.286150],
    [59.931150, 30.291754],
    [59.928091, 30.293395]
]);

var markers = L.layerGroup([marker, markerVolcheka1, markerVolcheka2, markerVolcheka3, markerVolcheka4, polygon]);

const changeLayers = (marker) => {
    markers.addTo(mymap);
    markers.remove(mymap);
    marker.addTo(mymap); 
}

$("#radio1").change(function(){
    changeLayers(marker)
}); 


$("#radio2").change(function(){
    changeLayers(markerVolcheka1)

}); 


$("#radio3").change(function(){

    changeLayers(markerVolcheka2)

}); 


$("#radio4").change(function(){

changeLayers(markerVolcheka3)

}); 



$("#radio5").change(function(){

changeLayers(markerVolcheka4)

}); 

$("#radio6").change(function(){

changeLayers(polygon)

}); 

$("#radio7").change(function(){
changeLayers(markers)
});




var controlRs = L.Routing.control({
    waypoints: [
        L.latLng(59.910398, 30.285935),
        L.latLng(59.929631, 30.289794)
    ], 
});
            controlRs._map = mymap;
            var controlDivs = controlRs.onAdd(mymap);

            document.getElementById('controls').appendChild(controlDivs);


    

/*
var allMarkers = {
    '<img src="logo.svg" width="50" height="30">':marker,
    '<img src="logoVolcheka.png" width="20" height="20">Булочная 1':markerVolcheka1,
    '<img src="logoVolcheka.png" width="20" height="20">Булочная 2':markerVolcheka2,
    '<img src="logoVolcheka.png" width="20" height="20">Булочная 3':markerVolcheka3,
    '<img src="logoVolcheka.png" width="20" height="20">Булочная 4':markerVolcheka4,
    '<img src="newG.jpg" width="20" height="20">Новая Голландия':polygon
};

var group = {
    "Все метки": markers
}

/*    var controlBackside = L.control.layers(allMarkers, group);
    controlBackside._map = mymap;
    var cntrlD = controlBackside.onAdd(mymap);
    document.getElementById('controls').appendChild(cntrlD);
*/


function onMapClick(e){

            var cd = e.latlng;
            var jsonCd = JSON.stringify(cd);
            var backJs = JSON.parse(jsonCd);
            var c1 = backJs.lat;
            var c2 = backJs.lng;

                var controlR = L.Routing.control({
                waypoints: [
                L.latLng(59.910398, 30.285935),
                L.latLng(c1, c2)
                ]
                });

            controlR._map = mymap;
            var controlDiv = controlR.onAdd(mymap);

            document.getElementById('controls').appendChild(controlDiv);


            document.getElementById("c1").value = c1;
            document.getElementById("c2").value = c2;


          

    function openForm() {
    document.getElementById("myForm").style.display = "block"; }

    return (openForm());   
}

mymap.on('click', onMapClick);
/*
    function openForm2() {
    document.getElementById("myForm2").style.display = "block"; }

 
    function closeForm2() {
    document.getElementById("myForm2").style.display = "none";
} 


*/  
   function closeForm() {
    document.getElementById("myForm").style.display = "none";
} 

    function deleteMarker(){


       var del = document.querySelector("input[name='delete']").value;


    $.ajax({
            url:'delete.php',
            type:"POST",
            data:{delete: del},
             success: function(data) {
  }
        });

          newMarker.remove(mymap);
}


