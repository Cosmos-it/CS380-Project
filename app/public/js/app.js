/**
 * Created by Taban on 9/10/15.
 */

'use strict';

var roomly = angular.module('roomly', ['ui.router']);

// configure our routes
roomly.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise('/main');
        $stateProvider
            .state('/main', {
                url: '/main',
                templateUrl: 'views/main.html',
                controller: 'mainController'
            })
            .state('/authsignup', {
                url: '/authsignup',
                templateUrl: 'views/auth-signup.html',
                controller: 'userAuthentication'
            })
            .state('/display-user', {
                url: '/display-user',
                templateUrl: 'views/display-user.html',
                controller: 'crudUserController'
            })
            .state('/edit-profile', {
                url: '/edit-profile',
                templateUrl: 'views/edit-profile.html',
                controller: 'crudUserController'
            })
            .state('/user-profile', {
                url: '/user-profile',
                templateUrl: 'views/user-profile.html',
                controller: 'crudUserController'
            })
            .state('/inbox', {
                url: '/inbox',
                templateUrl: 'views/inbox.html',
                controller: 'messageController'
            })
            .state('/help', {
                url: '/help',
                templateUrl: 'views/help.html',
                controller: 'helpController'
            })
    }]);



















