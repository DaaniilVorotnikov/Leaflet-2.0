var mymap = L.map('mapid').setView([59.9386, 30.3141], 13);
var maPiter = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a rel="nofollow" href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);






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
marker.bindPopup("<b>Крауд</b>");


var markerVolcheka1 = L.marker([59.910731, 30.297485],{icon: logoIconVolcheka})

markerVolcheka1.bindPopup("<b>Булочная</b><br> Ф.Вольчека");

var  markerVolcheka2 = L.marker([59.915989, 30.314136],{icon: logoIconVolcheka})

markerVolcheka2.bindPopup("<b>Булочная</b><br> Ф.Вольчека");

var  markerVolcheka3 = L.marker([59.922152, 30.285125],{icon: logoIconVolcheka})

markerVolcheka3.bindPopup("<b>Булочная</b><br> Ф.Вольчека");

var  markerVolcheka4 = L.marker([59.924522, 30.305639],{icon: logoIconVolcheka})

markerVolcheka4.bindPopup("<b>Булочная</b><br> Ф.Вольчека");


var polygon = L.polygon([
    [59.929332, 30.286150],
    [59.931150, 30.291754],
    [59.928091, 30.293395]
]).addTo(mymap);



L.Routing.control({
    waypoints: [
        L.latLng(59.910398, 30.285935),
        L.latLng(59.929631, 30.289794)
    ]
}).addTo(mymap);

var markers = L.layerGroup([marker, markerVolcheka1, markerVolcheka2, markerVolcheka3, markerVolcheka4, polygon])
.addTo(mymap);

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

 L.control.layers(allMarkers, group).addTo(mymap);



function onMapClick(e){
            var cd = e.latlng;
            var jsonCd = JSON.stringify(cd);
            var backJs = JSON.parse(jsonCd);
            var c1 = backJs.lat;
            var c2 = backJs.lng;

            document.getElementById("c1").value = c1;
            document.getElementById("c2").value = c2;


          

         function openForm() {
    document.getElementById("myForm").style.display = "block"; }

    return (openForm());   
}

mymap.on('click', onMapClick);

  

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
} 





