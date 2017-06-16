var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
var Medellin = new google.maps.LatLng(4.159769621076605, -72.93013669999999);
var mapOptions = {
    zoom: 5,
    zoomControl: true,
    streetViewControl: false,
    panControl: true,
    mapTypeId: google.maps.MapTypeId.HYBRID,
    center: Medellin
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
directionsDisplay.setMap(map);


$.ajax({
    type: "POST",
    url: "scripts/Database/ControladorPuntos.php"
}).done(function(data) {
    var muestras = JSON.parse(data);
    var length = muestras['name'].length;
    for(var x = 0; x < length; x++) {
        var nombre = muestras['name'][x];
        var codigo = muestras['codigo'][x];
        var imagenuno = muestras['img'][x];
        var latitud = muestras['latitud'][x];
        var longitud = muestras['longitud'][x];
        var zona = muestras['zona'][x];

        var latlong = {
            lat: parseFloat(latitud),
            lng: parseFloat(longitud)
        };

        if(zona == "1") {
            window[nombre] = new google.maps.Marker({
                position: latlong,
                map: map,
                title: nombre,
                icon: '../images/nuevo pin rosa-02.png'
            });
        };

        if(zona == "2") {
            window[nombre] = new google.maps.Marker({
                position: latlong,
                map: map,
                title: nombre,
                icon: '../images/nuevo pin naranja-02.png'
            });
        };

        if(zona == "3") {
            window[nombre] = new google.maps.Marker({
                position: latlong,
                map: map,
                title: nombre,
                icon: '../images/nuevo pin amarillo-02.png'
            });
        };

        if(zona == "4") {
            window[nombre] = new google.maps.Marker({
                position: latlong,
                map: map,
                title: nombre,
                icon: '../images/nuevo pin verde-02.png'
            });
        };

        if(zona == "5") {
            window[nombre] = new google.maps.Marker({
                position: latlong,
                map: map,
                title: nombre,
                icon: '../images/nuevo pin morado-02.png'
            });
        };

        if(zona == "6") {
            window[nombre] = new google.maps.Marker({
                position: latlong,
                map: map,
                title: nombre,
                icon: '../images/nuevo pin azul-02.png'
            });
        };

        var marker = window[nombre];

        var content = '<div class="row vertical-align">';
        content += '<form id="formulario1" method="post"><div class="col-md-6 columns">';
        content += '<div class="flotar" class="col-md-6 columns">';
        content += '<a href="/views/newsample.php?id=' + codigo + '" id="boton" style="font-size: 18px; font-weight: 500;" float="right" >' + nombre + '</a>';
        content += '</div>';
        content += '<img style="width: 120px; margin-right:20px;" src="' + imagenuno + '"; float:"left" >';
        content += '<div id="nombre" style="visibility: hidden; height: 0px; width: 0px">' + x + '</div>';
        content += '</form></div>';
        google.maps.event.trigger(map, 'resize');
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
            return function() {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            };
        })(marker, content, infowindow));
    };
});

$(document).ready(function() {
    $('.imgpop').magnificPopup({
        type: 'image'
    });
});

$("#boton1").click(function() {
    $.scrollTo('#muestraa', 800);
});
$("#boton2").click(function() {
    $.scrollTo('#muestraa', 800);
});
$("#boton3").click(function() {
    $.scrollTo('#muestraa', 800);
});
$("#boton4").click(function() {
    $.scrollTo('#muestraa', 800);
});
$("#boton5").click(function() {
    $.scrollTo('#muestraa', 800);
});
$("#boton6").click(function() {
    $.scrollTo('#muestraa', 800);
});
