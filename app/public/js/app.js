/**
 * Created by Taban on 9/10/15.
 */

'use strict';

var apartmentSearch = angular.module('apartmentSearch', ['ui.router', 'angularFileUpload']).run(["$rootScope", function ($rootScope) {
    $rootScope.userId = 2;

}]);

// configure our routes
apartmentSearch.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/display-data');
        $stateProvider
            .state('/display-data', {
                url: '/display-data',
                templateUrl: 'views/authSignUp.html',
                controller: 'CrudController'
            })

            .state('/detail-data', {
                url: '/detail-data',
                templateUrl: 'views/edit-data.html',
                controller: 'CrudController'
            })

            .state('/edit-data', {
                url: '/edit-data',
                templateUrl: 'views/edit-data.html',
                controller: 'CrudController'
            })

            .state('/admin-dash', {
                url: '/admin-dash',
                templateUrl: 'views/admin-dash.html',
                controller: 'CrudController'
            })

            .state('/apartment-profile', {
                url: '/profile',
                templateUrl: 'views/apartment-profile.html',
                controller: 'CrudController'
            })

            .state('/admin-register-login', {
                url: '/login',
                templateUrl: 'views/authSignUp.html',
                controller: 'CrudController'
            })
    }]);



















