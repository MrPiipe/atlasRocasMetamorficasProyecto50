angular
    .module('atlas')

    .factory('userService', function($http, $q) {

        var userServiceFactory = this;

        userServiceFactory.createUser = function(url) {
            var deferred = $q.defer();
            $http.put(url).
            success(function(data, status, headers, config) {
                deferred.resolve(data);
            }).
            error(function(data, status, headers, config) {
                deferred.reject(status);
            });
            return deferred.promise;
        };

        userServiceFactory.loginUser = function(url) {
            var deferred = $q.defer();
            $http.put(url).
            success(function(data, status, headers, config) {
                var user = data.userData;
                localStorage.username = user.name;
                localStorage.lastname = user.lastname;
                localStorage.email = user.email;
                localStorage.typeuser = user.typeuser;
                deferred.resolve(user);
            }).
            error(function(data, status, headers, config) {
                deferred.reject(status);
            });
            return deferred.promise;
        }

        return userServiceFactory;
    });
