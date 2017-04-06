angular
	.module('atlas')

	.controller('MapController', ['$scope', 'gpsService', '$state', '$compile',
		function($scope, gpsService, $state, $compile) {

			var count = 0;
			var object = [];

			$scope.inicio = function() {
				$state.go('.map');
			}


			var map = new GMaps({
				el: '#map',
				lat: 4.159769621076605,
				lng: -72.93013669999999,
				zoom: 5,
				zoomControl: true,
				mapTypeId: google.maps.MapTypeId.HYBRID,
				streetViewControl: false,
				panControl: true,
			});

			/*
			//TODO: Tomar la informacion de redis de Database/ControladorPuntos.php


			*/

			var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas');

			promise.then(
				function(success) {
					success.forEach(function(x) {
						object.push(x);
						var icon = " ";
						if (x.zona == "1") {
							icon = "../../images/nuevo pin rosa-02.png"
						}
						if (x.zona == "2") {
							icon = "../../images/nuevo pin naranja-02.png"
						}
						if (x.zona == "3") {
							icon = "../../images/nuevo pin amarillo-02.png"
						}
						if (x.zona == "4") {
							icon = "../../images/nuevo pin verde-02.png"
						}
						if (x.zona == "5") {
							icon = "../../images/nuevo pin morado-02.png"
						}
						if (x.zona == "6") {
							icon = "../../images/nuevo pin azul-02.png"
						}

						var str = '<div class="row">';
						str += '<div class="large-5 columns">';
						str += '<img style="width: 50px" src="' + x.imagenuno + '">';
						str += '</div>';
						str += '<div class="large-7 columns">';
						str += '<a ui-sref="sample" data-ng-click="transport(' + count + ')">' + x.name + '</a>';
						str += '</div>';
						str += '</div>';
						var compiled = $compile(str)($scope);
						map.addMarker({
							lat: x.latitud,
							lng: x.longitud,
							title: x.name,
							icon: icon,
							infoWindow: {
								content: compiled[0]
							}
						});
						count = count + 1;
					});
				},
				function(error) {
					console.log(error);
				}
			);



			// TODO: Aqui se pinta los markers de la zona 1
			$scope.zona1 = function() {
				map.removeMarkers();
				var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas/');
				promise.then(
					function(success) {
						success.forEach(function(x) {
							var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
							if (x.zona == "1") {
								map.addMarker({
									lat: x.latitud,
									lng: x.longitud,
									title: x.name,
									icon: '../../images/nuevo pin rosa-02.png',
									infoWindow: {
										content: str
									}
								});
							}
						});
					},
					function(error) {
						console.log(error);
					}
				);
			}

			// TODO: Aqui se pinta los markers de la zona 2
			$scope.zona2 = function() {
				map.removeMarkers();
				var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas/');
				promise.then(
					function(success) {
						success.forEach(function(x) {
							var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
							if (x.zona == "2") {
								map.addMarker({
									lat: x.latitud,
									lng: x.longitud,
									title: x.name,
									icon: '../../images/nuevo pin naranja-02.png',
									infoWindow: {
										content: str
									}
								});
							}
						});
					},
					function(error) {
						console.log(error);
					}
				);
			}

			$scope.zona3 = function() {
				map.removeMarkers();
				var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas/');
				promise.then(
					function(success) {
						success.forEach(function(x) {
							var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
							if (x.zona == "3") {
								map.addMarker({
									lat: x.latitud,
									lng: x.longitud,
									title: x.name,
									icon: '../../images/nuevo pin amarillo-02.png',
									infoWindow: {
										content: str
									}
								});
							}
						});
					},
					function(error) {
						console.log(error);
					}
				);
			}

			$scope.zona4 = function() {
				map.removeMarkers();
				var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas/');
				promise.then(
					function(success) {
						success.forEach(function(x) {
							var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
							if (x.zona == "4") {
								map.addMarker({
									lat: x.latitud,
									lng: x.longitud,
									title: x.name,
									icon: '../../images/nuevo pin verde-02.png',
									infoWindow: {
										content: str
									}
								});
							}
						});
					},
					function(error) {
						console.log(error);
					}
				);
			}

			$scope.zona5 = function() {
				map.removeMarkers();
				var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas/');
				promise.then(
					function(success) {
						success.forEach(function(x) {
							var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
							if (x.zona == "5") {
								map.addMarker({
									lat: x.latitud,
									lng: x.longitud,
									title: x.name,
									icon: '../../images/nuevo pin morado-02.png',
									infoWindow: {
										content: str
									}
								});
							}
						});
					},
					function(error) {
						console.log(error);
					}
				);
			}

			$scope.zona6 = function() {
				map.removeMarkers();
				var promise = gpsService.getPoints('http://atlas.dis.eafit.edu.co:8080/atlas/');
				promise.then(
					function(success) {
						success.forEach(function(x) {
							var str = '<a style="color: #000" ui-sref="first"> ' + x.name + ' </a>'
							if (x.zona == "6") {
								map.addMarker({
									lat: x.latitud,
									lng: x.longitud,
									title: x.name,
									icon: '../../images/nuevo pin azul-02.png',
									infoWindow: {
										content: str
									}
								});
							}
						});
					},
					function(error) {
						console.log(error);
					}
				);
			}

			$scope.transport = function(resource) {
				gpsService.setPoint(object[resource]);
			}
		}
	]);
