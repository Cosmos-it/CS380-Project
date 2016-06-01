/**
 * Created by Taban on 5/31/16.
 */


apartmentSearch.controller('DisplayData',
    function ($scope, $http, $state, Authentication, SessionService) {

        var key_id = SessionService.get('apt_id'); //key for logged in use

        //.................................
        $(function () { //Display apartment data for specific user
            var data = {
                price: "",
                roomType: "",
                pets: ""
            };

            $http.post("php_server/API/displaySearchedData.api.php", data)
                .success(function (response) {
                    console.log(response);
                });
        });

    });