angular
    .module('atlas')

    .factory('gpsService', function($http, $q) {

        var gpsServiceFactory = this;
        var point;
        gpsServiceFactory.setPoint = function(resource) {
            point = resource;
            return 0;
        }

        gpsServiceFactory.getPoint = function() {
            return point;
        }

        gpsServiceFactory.getPoints = function(url) {
            var deferred = $q.defer();
            $http.get(url).
            success(function(data, status, headers, config) {
                deferred.resolve(data);
            }).
            error(function(data, status, headers, config) {
                deferred.reject(status);
            });
            return deferred.promise;
        };

        gpsServiceFactory.savePoint = function(url) {
            var deferred = $q.defer();
            $http.get(url).
            success(function(data, status, headers, config) {
                deferred.resolve(data);
            }).
            error(function(data, status, headers, config) {
                deferred.reject(status);
            });
            return deferred.promise;
        };

        return gpsServiceFactory;
    });
