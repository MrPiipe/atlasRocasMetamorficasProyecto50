angular
	.module('atlas')

	.controller('SampleController', ['$scope', 'gpsService',
		function($scope, gpsService) {
			window.open("views/newmuestras_pag.php", "_self");
		}
	]);
