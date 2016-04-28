/**
 * Created by Taban on 12/14/15.
 */

'use strict';
roomly.factory('loginService', function ($http, $location, sessionService) {

    return {
        login: function (data, scope) {
            var $promise = $http.post('../Includes_PHP/API/authentication.api.php', data); //send data to user.php
            $promise.then(function (msg) {
                var uid = msg.data;
                if (uid) {
                    sessionService.set('uid', uid);
                    $location.path('/main');
                }
                else {
                    scope.msgtxt = 'incorrect information';
                    $location.path('/authsignup');
                }
            });
        },

        /** Register new user **/
        register: function () {


        },

        /** Log user out of the app **/
        logout: function () {
            sessionService.destroy('uid');
            $location.path('/login');
        },

        islogged: function () {
            var $checkSessionServer = $http.post('../Includes_PHP/Functions/check_session.php');
            //post to check if user is logged in.
            return $checkSessionServer;
            if (sessionService.get('uid'))
                return true;
            else
                return false;
        }
    }
});