/**
 * Created by Taban on 5/31/16.
 */


apartmentSearch.controller('DisplayAllData',
    function ($scope, $http, $state, Authentication, SessionService) {

        //.................................
        $(function () { //Display apartment data for specific user
            var data = {
                price: "",
                roomType: "",
                pets: ""
            };

            $http.post("php_server/API/display.records.api.php", data)
                .success(function (response) {
                    console.log(response);
                });
        });

    });