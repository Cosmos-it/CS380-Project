/**
 * Created by Taban on 5/29/16.
 */

apartmentSearch.factory('Authentication', function ($http, $state, SessionService) {

    return {
        login: function (data, $scope) {
            var $promise = $http.post('php_server/API/authentication.api.php', data);
            $promise.then(function (msg) {
                var userId = msg.data; //msg.data is the way to use it.
                if (userId != "fail") {
                    SessionService.set('apt_id', userId);
                    $state.go('/admin-dash');

                } else {
                    $scope.fail = true;
                    $scope.loginSuccess = "Incorrect or user exists";
                    $state.go('/admin-register');

                }
            });
        },

        signUp: function (data, $scope) {
            var url_post = 'php_server/API/authentication.api.php';
            $http.post(url_post, data).success(function (response) {
                //If success, send the admin to the admin dash to update info
                var check = 'success';
                if (response === check) {
                    $scope.success = true;
                    $scope.signSuccess = "Go and login to the right";
                    $state.go('/admin-register');
                } else {
                    console.log(response);
                    $scope.successError = true;
                    $scope.sigUpError = "Incorrect or user exists";
                    $state.go('/admin-register');
                }


            }).error(function (error) {
                //Catch server errors
                $state.go("/admin-register");
                console.log(error);
            });

        },

        logout: function () {
            SessionService.destroy(); //destroy session
            $http.post('php_server/API/destroy_session.php'); //post that the API
            $state.go('/admin-register'); //Change path to login-auth
        },

        isLogged: function () {
            /**
             * Check to make sure that user is actually logged in.
             */
            var user = SessionService.get('apt_id');
            var $checkSessionServer = $http.get('php_server/API/check_session.php/?user=' + user);
            return $checkSessionServer;
        }
    }
});


