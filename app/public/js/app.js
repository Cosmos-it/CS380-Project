/**
 * Created by Taban on 9/10/15.
 */

'use strict';

var apartmentSearch = angular.module('apartmentSearch', ['ui.router']);

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

            .state('/sign-up', {
                url: '/sign-up',
                templateUrl: 'views/sign-up.html',
                controller: 'CrudController'
            })

            .state('/apartment-profile', {
                url: '/profile',
                templateUrl: 'views/apartment-profile.html',
                controller:'CrudController'
            })

            .state('/admin-page', {
                url: '/admin',
                templateUrl: 'views/authSignUp.html',
                controller:'CrudController'
            })
    }]);



















