/**
 * Created by Taban on 5/5/16.
 */
// (function () {
apartmentSearch.controller('CrudController',
    function ($scope, $http, $state, $timeout, $upload, Authentication, SessionService) {

        var current_user_id = SessionService.get('apt_id'); //Used to identify current user

        //............. Display Current user data ..............................

        $(function () { // Display user data if someone is logged in
            var data = {display: "display"};
            $http.post("php_server/API/display.records.api.php?id=" + current_user_id, data)
                .success(function (response) {
                    if (response != null) {
                        $scope.apartName = response['username'];
                        $scope.data = response['profileImage'];
                        $scope.petsCheckBox = response['pets'];
                        $scope.description = response['description'];
                        $scope.leaseTerm = response['leaseTerm'];
                        $scope.location = response['address'];
                    }
                });
        }); //E O F

        $(function () { // Display user data if someone is logged in
            var data = {display: "location"};
            $http.post("php_server/API/displayLocation.api.php?id=" + current_user_id, data)
                .success(function (response) {
                    if (response != null) {
                        $scope.location = response['address'];
                    }
                });
        }); //E O F


        //............. Display Current user data ..............................
        $(function () { // Display user data if someone is logged in
            var data = {display: "studio"};
            $http.post("php_server/API/display.studio.php?id=" + current_user_id, data)
                .success(function (response) {
                    if (response != null) {
                        $scope.studioImage = response['image'];
                        $scope.studioPrice = response['price'];
                    }
                });
        }); //E O F

        $(function () { //Display apartment data for specific user
            $http.post("php_server/API/display.all.records.php")
                .success(function (response) {

                    // console.log(response);
                    // $scope.name = response['username'];
                    // $scope.data = response['profileImage'];
                    // $scope.petsCheckBox = response['pets'];
                    // $scope.description = response['description'];
                    // $scope.leaseTerm = response['leaseTerm'];
                    // $scope.location = response['address'];
                    // $scope.studioImage = response['image'];
                    // $scope.studioPrice = response['price'];
                });
        });


        //............. Display Current user data ..............................
        var data = {display: "one"};
        $(function () { // Display user data if someone is logged in
            $http.post("php_server/API/display.oneBed.php?id=" + current_user_id, data)
                .success(function (response) {
                    if (response != null) {
                        $scope.oneImage = response['image'];
                        $scope.onePrice = response['price'];
                    }
                });
        }); //E O F

        //............. Display Current user data ..............................
        var data = {display: "two"};
        $(function () { // Display user data if someone is logged in
            $http.post("php_server/API/display.TwoBedroom.php?id=" + current_user_id, data)
                .success(function (response) {
                    if (response != null) {
                        $scope.twoImage = response['image'];
                        $scope.twoPrice = response['price'];

                    }
                });
        }); //E O F

        //............. Display Current user data ..............................

        var data = {display: "three"};
        $(function () { // Display user data if someone is logged in
            $http.post("php_server/API/threeBedroom.php?id=" + current_user_id, data)
                .success(function (response) {
                    if (response != null) {
                        $scope.threeImage = response['image'];
                        $scope.threePrice = response['price'];
                    }
                });
        }); //E O F


        /* errors array */
        var errors = {
            nameError: "Valid Apartment name",
            descriptionError: "Fill it out",
            leaseTermError: "Lease in months",
            locationError: "Enter valid address",
            emailError: "Valid Email required",
            passwordError: "Valid password required",
        };


//...................................................................
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
        }

//.................................................................................
        if ($scope.apartmentName == undefined) $scope.apartmentNameError = errors.nameError;
        if ($scope.apartmentEmail == undefined) $scope.emailERROR = errors.emailError;
        if ($scope.apartmentPassword == undefined) $scope.passwordERROR = errors.passwordError;
        $scope.signUp = function () {  //sign up function

            var data = {
                register: 'register',
                name: $scope.apartmentName,
                email: $scope.apartmentEmail,
                password: $scope.apartmentPassword
            };
            //Call Authentication
            Authentication.signUp(data, $scope);

            $scope.adminForm = '';


        };//End of sign up function

//......................................................................................
        if ($scope.loginEmail == undefined) $scope.loginEmailError = errors.emailError;//email error
        if ($scope.loginPassword == undefined) $scope.loginPasswordError = errors.passwordError; //password error
        $scope.login = function () { //login function
            var data = {
                login: 'login',
                email: $scope.loginEmail,
                password: $scope.loginPassword
            };

            //Use this authentication to login.
            Authentication.login(data, $scope);

            $scope.loginForm.prestine = '';

        };//End of login function

        $scope.logout = function () { //login function
            //Use this authentication to login.
            Authentication.logout();

        };//End of login function

//...................................................................
        $scope.uploadResult = [];
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
        $scope.uploadResult = [];
        $scope.studioImageUpload = function () {
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
                // file is ImageUpload successfully
                console.log(resp);
            });

        };

//...............................................................
        $scope.uploadResult = [];
        $scope.oneBedroomSubmit = function () { //One bedroom upload image function
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
                // file is ImageUpload successfully
                console.log(resp);
            });

        };

//........................................................................
        $scope.uploadResult = [];
        $scope.twoBedroomSubmit = function () {//Two bedroom Upload image
            var twoImage = document.getElementById('twoImage').files[0];
            var price = document.getElementById('twoPrice').value;
            var twoCheck = $scope.twoCheck;

            if (!twoImage) return;

            $upload.upload({
                url: 'php_server/API/uploadImage.php?id=' +
                current_user_id + '&price=' + price + '&check=' + twoCheck,
                data: {twoImage: twoImage}
            }).then(function (resp) {
                // file is ImageUpload successfully
                console.log(resp);
            });

        };

//.......................................................
        $scope.threeBedroomSubmit = function () {
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
                // file is ImageUpload successfully
                console.log(resp);
            });
        };

//.....................................................................
        $scope.saveDescription = function () { // Update description
            var description = $scope.description;
            var data = {
                title: "description",
                description: description
            };

            $http.post('php_server/API/authentication.api.php?id=' + current_user_id,
                data).success(function (response) {
                console.log(response);
            });
        };
        
    });

// })(apartmentSearch);

