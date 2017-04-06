angular
  .module('atlas')
  
  .controller('NewSampleController', ['$scope', 'gpsService', '$state',
    function($scope, gpsService, $state){
      
      $scope.save = function(){
        
      var promise = gpsService.savePoint('http://atlas.dis.eafit.edu.co:8080/atlas/create?name=' + $scope.name 
                                           + '&imagenuno=' + $scope.imagenuno
                                           + '&imagendos=' + $scope.imagendos
                                           + '&imagentres=' + $scope.imagentres
                                           + '&macros=' + $scope.macros
                                           + '&micros=' + $scope.micros
                                           + '&porcentaje=' + $scope.porcentaje
                                           + '&textura=' + $scope.textura
                                           + '&intragranos=' + $scope.intragranos
                                           + '&grado=' + $scope.grado
                                           + '&latitud=' + $scope.latitud
                                           + '&longitud=' + $scope.longitud
                                           + '&zona=' + $scope.zona);
        
        promise.then(
          function(success){
            alert("Muestra almacenada correctamente");
            $state.go('first');
          },
          function(error){
            alert("Error al almacenar la muestra");
          }
        );
      }
    }
  ]);
