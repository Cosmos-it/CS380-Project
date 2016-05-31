/**
 * Created by Taban on 9/10/15.
 */

'use strict';

var apartmentSearch = angular.module('apartmentSearch', ['ui.router', 'angularFileUpload']);

// configure our routes
apartmentSearch.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/display');
        $stateProvider
            .state('/display-data', {
                url: '/display',
                templateUrl: 'views/display-data.html',
                controller: 'CrudController'
            })

            .state('/detail-data', {
                url: '/detail',
                templateUrl: 'views/edit-data.html',
                controller: 'CrudController'
            })

            .state('/edit-data', {
                url: '/edit',
                templateUrl: 'views/edit-data.html',
                controller: 'CrudController'
            })

            .state('/admin-dash', {
                url: '/dashBoard',
                templateUrl: 'views/admin-dash.html',
                controller: 'CrudController'
            })

            .state('/apartment-profile', {
                url: '/profile',
                templateUrl: 'views/apartment-profile.html',
                controller: 'CrudController'
            })

            .state('/admin-register', {
                url: '/admin',
                templateUrl: 'views/authSignUp.html',
                controller: 'CrudController'
            })
    }]);


apartmentSearch.run(function ($rootScope, $location, Authentication) {
    var routesPermissions = ['/dashBoard'];
    $rootScope.$on('$routeChangeStart', function () {
        if (routesPermissions.indexOf($location.path()) != -1) {
            var connected = Authentication.isLogged();
            connected.then(function (msg) {
                if (!msg.data) {
                    Authentication.logout(); // this redirect and delete data entered manually
                }
            });
        }
    });
});

















