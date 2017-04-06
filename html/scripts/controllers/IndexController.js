angular.module('atlas').controller('IndexController', ['$scope',
    function($scope) {
        var str = localStorage.username;
        str += " ";
        str += localStorage.lastname;
        $scope.username = str;
        switch (localStorage.typeuser) {
            /*case "ADMIN":
              $scope.v1 = false;
              $scope.v2 = false;
              $scope.v3 = true;
              $scope.v4 = true;
              $scope.v5 = true;
              $scope.v6 = true;
              $scope.v7 = true;
              $scope.v8 = true;
              break;*/
            case "USER":
                $scope.v1 = false;
                $scope.v2 = false;
                $scope.v3 = true;
                $scope.v4 = true;
                $scope.v5 = true;
                $scope.v6 = false;
                $scope.v7 = true;
                $scope.v8 = true;
                break;
            default:
                $scope.v1 = true;
                $scope.v2 = true;
                $scope.v3 = false;
                $scope.v4 = false;
                $scope.v5 = false;
                $scope.v6 = false;
                $scope.v7 = false;
                $scope.v8 = false;
        }
        $scope.logout = function() {
          $.ajax({
            type: 'post',
            url: 'scripts/credentials_destroyer_controller.php',
            data: {token: localStorage.cookie},
            success: function(){
              localStorage.clear();
              location.reload();
            }
          });
        }
      }
]);


