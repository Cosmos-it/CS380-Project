/**
 * Created by Taban on 5/5/16.
 */
// (function () {
apartmentSearch.controller('updateInfoCtrl',
    function ($scope, $http, $state, $timeout, $upload, Authentication, SessionService) {

        var current_user_id = SessionService.get('apt_id'); //Used to identify current use

        /* errors array */
        var errors = {
            nameError: "Valid Apartment name",
            descriptionError: "Fill it out",
            leaseTermError: "Lease in months",
            locationError: "Enter valid address",
            emailError: "Valid Email required",
            passwordError: "Valid password required"
        };

        //.............................................................
        $scope.updateApart = function () {
            var leaseTerm = document.getElementById('leaseTerm').value;
            var location = document.getElementById('location').value;
            var check = $scope.petsCheckBox;
            var data = {
                type: "update",
                leaseTerm: leaseTerm,
                location: location,
                check: check
            };

            $http.post('php_server/API/authentication.api.php?id=' +
                current_user_id, data).success(function (response) {
                console.log("Test" + response);

            });
        };

        // ...................................................................
        $scope.upLoadImage = function () { //Upload image
            var file = document.getElementById('file').files[0];

            if (!file) return; //IF nothing is assigned
            console.log(current_user_id);
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' + current_user_id,
                data: {
                    file: file
                }
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp);
            });
        };

        //....................................................................
        $scope.updateStudioInfo = function () {
            var studio = document.getElementById('studio').files[0];
            var price = document.getElementById('studioPrice').value;
            var studioCheck = $scope.studioCheck;

            if (!studio) return;

            console.log(price + " " + studioCheck);
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' +
                current_user_id + '&price=' + price + '&check=' + studioCheck,
                data: {studio: studio}
            }).then(function (resp) {
                // response if successfully uploaded or not
            });
        };

        //...............................................................
        $scope.updateOneBedroomInfo = function () { //One bedroom upload image function
            var oneImage = document.getElementById('oneImage').files[0];
            var price = document.getElementById('onePrice').value;
            var oneCheck = $scope.oneCheck;

            if (!oneImage) return;

            console.log(price + " " + oneCheck + " " + current_user_id + oneImage);
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' +
                current_user_id + '&price=' + price + '&check=' + oneCheck,
                data: {oneImage: oneImage}
            }).then(function (resp) {
                // response if successfully uploaded or not
            });
        };

        //........................................................................
        $scope.updateTwoBedroomInfo = function () {//Two bedroom Upload image
            var twoImage = document.getElementById('twoImage').files[0];
            var price = document.getElementById('twoPrice').value;
            var twoCheck = $scope.twoCheck;

            if (!twoImage) return;

            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' +
                current_user_id + '&price=' + price + '&check=' + twoCheck,
                data: {twoImage: twoImage}
            }).then(function (resp) {
                // response if successfully uploaded or not
            });
        };

        //.......................................................
        $scope.updateThreeBedroomInfo = function () {
            var threeImage = document.getElementById('threeImage').files[0];
            var price = document.getElementById('threePrice').value;
            var threeCheck = $scope.threeCheck;

            if (!threeImage) return;

            console.log(price + " " + threeCheck);
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' +
                current_user_id + '&price=' + price + '&check=' + threeCheck,
                data: {threeImage: threeImage}
            }).then(function (resp) {
                // response if successfully uploaded or not
            });
        };

    });

// })(apartmentSearch);

