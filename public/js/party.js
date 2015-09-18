"use strict";

(function() {
    var app = angular.module("planner", []);

    // Find the token value from the page using jQuery
    const TOKEN = $("meta[name=csrf-token]").attr("content");
    
    // Set the token as an Angular constant
    app.constant("CSRF_TOKEN", TOKEN);

    // Configure $http to include both your token and a flag indicating the request is AJAX
    app.config(["$httpProvider", "CSRF_TOKEN", function($httpProvider, CSRF_TOKEN) {
        $httpProvider.defaults.headers.common["X-Csrf-Token"] = CSRF_TOKEN;
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);


    app.controller("PartyController", ["$log", "$http", "$scope", function($log, $http, $scope) {
        //An Ajax get request to load some data from the server
        $scope.inputData = [];
        $http.get("/event/list").then(function(response) {
            $scope.inputData = response.data;
            $log.info("Ajax request completed successfully!");
        }, function(response) {
            $log.error("Ajax request failed for some reason!");
            $log.debug(response);
        });

        $scope.editModal = function() {
            $('#editModal').modal();
        }

         $scope.loginModal = function() {
            $('#loginModal').modal();
        }

        $scope.houdiniModal = function() {
            $("#calendarModal").modal('hide');
            $("#locationModal").modal();
        }

        $scope.submitEvent = function() {
            $log.info($scope.inputData);
            $http.put('/event/store').then(function (response) {
                 $log.info("Edit has gone through");
            }, function (response) {
                $log.error("Creation Failed");
                $log.debug(response);   
            });
        }

         $scope.submitLocation = function() {
             $http.put('/location/store').then(function (response) {
                 $log.info("Edit has gone through");
            }, function (response) {
                $log.error("Creation Failed");
                $log.debug(response);   
            });
        }

        $scope.editLocation = function() {
            $http.put('/submit' + $scope.users.id).then(function (response) {
                 $log.info("Edit has gone through");
            }, function (response) {
                $log.error("Edit failed");
                $log.debug(response);   
            });
        }

        $scope.comparePasswords = function(password1, password2) {
            if (password1 =! password2) {
                $log.info("Passwords not equal!");
            }
        }   

        $scope.deleteEvent = function (index) {
            var id = $scope.inputData[index].id;
            $http.delete('/event/' + id).then(function (response) {
                $log.info("Post successfully deleted");
                $scope.event.splice(index, 1);
            }, function (response) {
                $log.error("Post failed to delete");
                $log.debug(response);
            });
        }

    }]);
})();