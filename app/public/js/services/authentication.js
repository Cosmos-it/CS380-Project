/**
 * Created by Taban on 5/29/16.
 */

apartmentSearch.factory('Authentication', function ($http, $state, SessionService) {

    return {
        login: function (data, $scope) {
            var $promise = $http.post('php_server/API/createApartment.api.php', data);
            $promise.then(function (msg) {
                var userId = msg.data;
                if (userId != "fail") {
                    SessionService.set('user', userId);
                    $state.go('/admin-dash');
                    console.log("Success")
                } else {
                    $scope.msgTxt = "incorrect information";
                    $state.go('/admin-register');
                    console.log("Failed")

                }
            });
        },

        logout: function () {
            SessionService.destroy(); //destroy session
            $http.post('php_server/API/destroy_session/'); //post that the API
            $state.go('/admin-register'); //Change path to login-auth
        },

        isLogged: function () {
            /**
             * Check to make sure that user is actually logged in.
             */
            var user = SessionService.get('user');
            var $checkSessionServer = $http.get('php_server/API/check_session.php/?user=' + user);
            return $checkSessionServer;
        }
    }
});


