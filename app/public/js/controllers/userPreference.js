/**
 *==============================================================
 * Created by Taban on 3/2/16.
 *
 *==============================================================
 */




roomly.controller('crudUserController', function ($scope, $http, $state) {

    $scope.info = {
        price: undefined,
        location: undefined,
        leaseTerm: undefined,
        apartment: undefined,
        userDescription: undefined,
        image: undefined
    };

    /**=========================================================*/

    $scope.addApartmentInfo = function () {
        var data = {
            price: $scope.info.price,
            location: $scope.info.location,
            leaseTerm: $scope.info.leaseTerm,
            apartment: $scope.info.apartment,
            userDescription: $scope.info.userDescription,
            image: $scope.info.image
        };

        $http.post("../php_server/API/Preference.api.php", data)
            .success(function (response) {


            })

        $scope.updateApartmentInfo = function () {

        }
    }


});