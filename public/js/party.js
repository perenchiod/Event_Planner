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
        // An Ajax get request to load some data from the server
        // $scope.events = [];
        // $scope.locations = [];
        // $http.get("/home").then(function(data) {
        //     $scope.events = response.data;
        //     $log.info("Ajax request completed successfully!");
        //     $log.debug(data);
        // }, function(response) {
        //     $log.error("Ajax request failed for some reason!");
        //     $log.debug(response);
        // });

        $scope.editModal = function() {
            $('#editModal').modal();
        }

        $scope.houdiniModal = function() {
            $("#calendarModal").modal('hide');
            $("#locationModal").modal();
        }

        $scope.submitEvent = function() {

        }

        $scope.submitLocation = function() {
            $http.put('/submit/location' + $scope.post.id).then(function (response) {
                 $log.info("Edit has gone through");
            }, function (response) {
                $log.error("Edit failed");
                $log.debug(response);   
            });
        }

        // Post some data to the server
        // $http.post("/different/url.php", {
        //     key1: "value a",
        //     key2: "value b"
        // }).then(function() {
        //     $log.info("Info was sent to the server successfully!")
        // }, function(response) {
        //     $log.error("Ajax request failed for some reason!");

        //     $log.debug(response);
        // });
    }]);
})();