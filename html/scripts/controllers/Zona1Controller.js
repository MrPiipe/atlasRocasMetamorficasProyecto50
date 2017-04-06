angular
  .module('atlas')
  
  .controller('Zona1Controller', ['$scope', 
    function($scope){
      
      var map = new GMaps({
        el: '#map',
        lat: 4.159769621076605,
        lng: -72.93013669999999,
        zoom: 5,
        zoomControl : false,
        mapTypeId: google.maps.MapTypeId.HYBRID
      });
      
      var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas');
      
      promise.then(
        function(success){
          success.forEach(function(x){
              if (x.zone == '1'){
                var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
                map.addMarker({
                  lat: x.latitud,
                  lng: x.longitud,
                  title: x.name,
                  //icon: '../../images/pointer-amarillo.png',
                  infoWindow: {
                    content: str
                  }
                });
              }
            });
        },
        function(error){
          console.log(error);
        }
      );
    }
  ]);