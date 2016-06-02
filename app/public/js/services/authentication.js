/**
 * Created by Taban on 5/29/16.
 */

apartmentSearch.factory('Authentication', function ($http, $state, SessionService) {

    return {
        login: function (data, $scope) {
            console.log(data.email + data.password);
            
            var $promise = $http.post('php_server/API/authentication.api.php', data);
            
            $promise.then(function (msg) {
                var userId = msg.data; //msg.data is the way to use it.
                console.log(userId);
                if (userId != "fail") {
                    SessionService.set('apt_id', userId);
                    var session = SessionService.get('apt_id');
                    $state.go('/admin-dash');
                    console.log("Success" + session)
                } else {
                    $scope.msgTxt = "incorrect information";
                    $state.go('/admin-register');
                    console.log("Failed")
                }
            });
        },

        signUp: function (data) {
            var url_post = 'php_server/API/authentication.api.php';
            //Test Apartment name, email, and password
            console.log("Apartment: " + data.name + " |Email: "
                + data.email + " |Password: " + data.password);

            $http.post(url_post, data).success(function (response) {
                console.log("Test" + response);
                //If success, send the admin to the admin dash to update info
                $state.go('/admin-register');

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


