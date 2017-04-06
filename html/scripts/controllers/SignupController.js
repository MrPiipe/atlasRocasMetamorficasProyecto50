angular
	.module('atlas')

	.controller('SignupController', ['userService', '$scope',
		function(userService, $scope) {


			$scope.signUp = function() {
				window.open("http://mydspaceis.dis.eafit.edu.co/geologia/register", "_self");
			}
		}
	]);
