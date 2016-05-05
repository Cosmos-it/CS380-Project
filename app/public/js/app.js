/**
 * Created by Taban on 9/10/15.
 */

'use strict';

var roomly = angular.module('roomly', ['ui.router']);

// configure our routes
roomly.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise('/display-data');
        $stateProvider
            .state('/display-data', {
                url: '/display-data',
                templateUrl: 'views/display-data.html',
                controller: 'crudUserController'
            })
    }]);



















