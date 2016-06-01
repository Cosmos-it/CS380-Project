/**
 * Created by Taban on 5/5/16.
 */

apartmentSearch.controller('CrudController',
    function ($scope, $http, $state, $timeout, $upload, Authentication, SessionService) {

        var current_user_id = SessionService.get('apt_id'); //Used to identify current user

        //.......................................................
        if (current_user_id != null) {
            $(function () { // Display user data if someone is logged in
                $http.post("php_server/API/displayRecords.api.php?id=" + current_user_id)
                    .success(function (response) {
                        console.log(response);
                    });
            }); //E O F
        }

        /* errors array */
        var errors = {
            nameError: "Valid Apartment name",
            descriptionError: "Fill it out",
            leaseTermError: "Lease in months",
            locationError: "Enter valid address",
            emailError: "Valid Email required",
            passwordError: "Valid password required",
        };

        //.....................................................................
        if ($scope.apartName == undefined) $scope.nameError = errors.nameError; //name error
        $scope.submitInfo = function () {  //Submit function
            var data = {
                createApartment: "create",
                leaseTerm: $scope.leaseTerm,
                pets: $scope.petsCheckBox,
                location: $scope.location
            };

            Authentication.submitInfo(data);

        };//End of submit info function

        //.................................................................................
        if ($scope.apartmentName == undefined) $scope.apartmentNameError = errors.nameError;
        if ($scope.apartmentEmail == undefined) $scope.emailERROR = errors.emailError;
        if ($scope.apartmentPassword == undefined) $scope.passwordERROR = errors.passwordError;

        $scope.signUp = function () {  //sign up function

            var data = {
                register: "register",
                name: $scope.apartmentName,
                email: $scope.apartmentEmail,
                password: $scope.apartmentPassword
            };
            //Call Authentication
            Authentication.signUp(data);


        };//End of sign up function

        //......................................................................................
        if ($scope.loginEmail == undefined) $scope.loginEmailError = errors.emailError;//email error
        if ($scope.loginPassword == undefined) $scope.loginPasswordError = errors.passwordError; //password error
        $scope.login = function () { //login function
            var data = {
                login: "login",
                email: $scope.loginEmail,
                password: $scope.loginPassword
            };

            //Use this authentication to login.
            Authentication.login(data, $scope);

        };//End of login function


        //...................................................................
        $scope.uploadResult = [];
        $scope.upLoadImage = function () { //Upload image
            var file = document.getElementById('file').files[0];

            if (!file) return; //IF nothing is assigned

            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' + current_user_id,
                data: {
                    file: file
                }
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp);
                // $scope.data = resp.data;
            });

        };

        //....................................................................
        $scope.uploadResult = [];
        $scope.studioImageUpload = function () {
            var fileStudio = document.getElementById('fileStudio').files[0];
            //$files: an array of files selected, each file has name, size, and type.
            if (!fileStudio) return;

            console.log(fileStudio);
            var image = "image";
            $upload.upload({
                url: 'php_server/API/uploadImage.php?=id' + current_user_id,
                data: {file: fileStudio, upload: image}
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp.data);
                $scope.studioImage = resp.data;
            });

        };

        //...............................................................
        $scope.uploadResult = [];
        $scope.oneBedroomImageUpload = function () { //One bedroom upload image function
            var oneBed = document.getElementById('oneBed').files[0];
            //$files: an array of files selected, each file has name, size, and type.
            if (!oneBed) return;

            console.log(oneBed);
            var image = "image";
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' + current_user_id,
                data: {file: oneBed, upload: image}
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp.data);
                $scope.oneBedImage = resp.data;
            });

        };


        //........................................................................
        $scope.uploadResult = [];
        $scope.twoBedroomImageUpload = function () {//Two bedroom Upload image
            var twoBed = document.getElementById('twoBed').files[0];
            //$files: an array of files selected, each file has name, size, and type.
            if (!twoBed) return;

            console.log(twoBed);
            var image = "image";
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' + current_user_id,
                data: {file: twoBed, upload: image}
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp.data);
                $scope.twoBedImage = resp.data;
            });

        };


        //....................................................................
        $scope.uploadResult = [];
        $scope.threeBedroomImageUpload = function () {//Three bedroom Upload image
            var threeBed = document.getElementById('threeBed').files[0];
            //$files: an array of files selected, each file has name, size, and type.
            if (!threeBed) return;

            console.log(threeBed);
            var image = "image";
            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' + current_user_id,
                data: {file: threeBed, upload: image}
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp.data);
                $scope.threeBedImage = resp.data;
            });

        };

        //.....................................................................
        $scope.saveDescription = function () { // Update description
            var description = $scope.Description.description;
            var data = {
                descriptionTitle: "description",
                description: description
            };

            $http.post("php_server/API/createApartment.api.php?id=" + current_user_id,
                data).success(function (response) {
                console.log(response);
            });
        };


        //....................................................................
        $scope.submitRoomType = function () { //Submit Room Type

            try {
                var data = {
                    roomType: "roomType",
                    studioCheck: $scope.info.studioCheck,
                    studioPrice: $scope.info.studioPrice,
                    oneBedroom: $scope.info.oneChecked,
                    oneBedroomPrice: $scope.info.onePrice,
                    twoBedroom: $scope.info.twoChecked,
                    twoBedroomPrice: $scope.info.twoPrice,
                    threeBedroom: $scope.info.threeChecked,
                    threeBedroomPrice: $scope.threePrice
                };

                console.log("Studio: " + data.studioCheck + " " + data.studioPrice + " | " +
                    "One bedroom: " + data.oneBedroom + " " + data.oneBedroomPrice + " | " +
                    "Two bedroom: " + data.twoBedroom + " " + data.twoBedroomPrice + " | " +
                    "Three bedroom: " + data.threeBedroom + " " + data.threeBedroomPrice);

                $http.post("php_server/API/createApartment.api.php?id=" + current_user_id, data)
                    .success(function (response) {
                        console.log(response);
                    });

            } catch (e) {
                console.log(e.message);
            }
        };

    });