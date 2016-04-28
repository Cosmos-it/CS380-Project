/****************************************************************
 * Created by Taban on 2/24/16.
 *
 ****************************************************************/

'use strict';

roomly.factory('sessionService', ['$http', function ($http) {
    return {
        set: function (key, value) {
            return sessionStorage.setItem(key, value);
        },
        get: function (key) {
            return sessionStorage.getItem(key);
        },
        destroy: function (key) {
            $http.post('../Includes_PHP/Functions/destroy_session.php');
            return sessionStorage.removeItem(key);
        }
    };
}]);

