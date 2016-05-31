/**
 * Created by Taban on 5/5/16.
 */

apartmentSearch.controller('CrudController', function ($scope, $http, $state, $timeout, $upload, Authentication) {

    /* errors array */
    var errors = {
        nameError: "Valid Apartment name",
        descriptionError: "Fill it out",
        leaseTermError: "Lease in months",
        locationError: "Enter valid address",
        emailError: "Valid Email required",
        passwordError: "Valid password required",
    };

    if ($scope.apartName == undefined) $scope.nameError = errors.nameError;
    // if ($scope.leaseTermError == undefined) $scope.leaseTermError = errors.leaseTermError;

    //Submit function
    $scope.submitInfo = function () {
        /* assignment */
        var data = {
            createApartment: "create",
            leaseTerm: $scope.leaseTerm,
            pets: $scope.petsCheckBox,
            location: $scope.location
        };

        //Test
        console.log("LeaseTerm " + data.leaseTerm +
            " Pets: " + data.pets + " Location: " + data.location + " Description:");

        $http.post("php_server/API/createApartment.api.php", data).success(function (response) {
            console.log("Test" + response);
        }).error(function (error) {
            //Catch server errors

        });

    };//End of submit info function

    /**************** Check for undefined fields and show errors *********************/
    if ($scope.apartmentName == undefined) $scope.apartmentNameError = errors.nameError;
    if ($scope.apartmentEmail == undefined) $scope.emailERROR = errors.emailError;
    if ($scope.apartmentPassword == undefined) $scope.passwordERROR = errors.passwordError;

    //sign up function
    $scope.signUp = function () {
        var data = {
            register: "register",
            name: $scope.apartmentName,
            email: $scope.apartmentEmail,
            password: $scope.apartmentPassword
        };

        //Test Apartment name, email, and password
        console.log("Apartment: " + data.name + " |Email" + data.email + " |Password: " + data.password);

        $http.post('php_server/API/createApartment.api.php', data).success(function (response) {
            console.log("Test" + response);
            //If success, send the admin to the admin dash to update info
            $state.go('/admin-dash');
            localStorage.setItem("token", JSON.stringify(response));

        }).error(function (error) {
            //Catch server errors
            $state.go("/admin-register");

        });

    };//End of sign up function


    /****************** Check for undefined fields and show errors *********************/
    if ($scope.loginEmail == undefined) $scope.loginEmailError = errors.emailError;
    if ($scope.loginPassword == undefined) $scope.loginPasswordError = errors.passwordError;
    //login function
    $scope.login = function () {
        var data = {
            login: "login",
            email: $scope.loginEmail,
            password: $scope.loginPassword
        };
        Authentication.login(data, $scope);

    };//End of login function


    //Upload image
    $scope.uploadResult = [];
    $scope.upLoadImage = function () {
        var file = document.getElementById('file').files[0];
        //$files: an array of files selected, each file has name, size, and type.
        if (!file) return;

        console.log(file);
        var image = "image";
        $upload.upload({
            url: 'php_server/API/uploadImage.php',
            data: {file: file, upload: image}
        }).then(function (resp) {
            // file is ImageUpload successfully
            console.log(resp.data);
            $scope.data = resp.data;
        });
    };


    $scope.uploadResult = [];
    $scope.studioImageUpload = function () {
        var fileStudio = document.getElementById('fileStudio').files[0];
        //$files: an array of files selected, each file has name, size, and type.
        if (!fileStudio) return;

        console.log(fileStudio);
        var image = "image";
        $upload.upload({
            url: 'php_server/API/uploadImage.php',
            data: {file: fileStudio, upload: image}
        }).then(function (resp) {
            // file is ImageUpload successfully
            console.log(resp.data);
            $scope.studioImage = resp.data;
        });
    };

    //Upload image
    $scope.uploadResult = [];
    $scope.oneBedroomImageUpload = function () {
        var oneBed = document.getElementById('oneBed').files[0];
        //$files: an array of files selected, each file has name, size, and type.
        if (!oneBed) return;

        console.log(oneBed);
        var image = "image";
        $upload.upload({
            url: 'php_server/API/uploadImage.php',
            data: {file: oneBed, upload: image}
        }).then(function (resp) {
            // file is ImageUpload successfully
            console.log(resp.data);
            $scope.oneBedImage = resp.data;
        });
    };


    //Upload image
    $scope.uploadResult = [];
    $scope.twoBedroomImageUpload = function () {
        var twoBed = document.getElementById('twoBed').files[0];
        //$files: an array of files selected, each file has name, size, and type.
        if (!twoBed) return;

        console.log(twoBed);
        var image = "image";
        $upload.upload({
            url: 'php_server/API/uploadImage.php',
            data: {file: twoBed, upload: image}
        }).then(function (resp) {
            // file is ImageUpload successfully
            console.log(resp.data);
            $scope.twoBedImage = resp.data;
        });
    };


    //Upload image
    $scope.uploadResult = [];
    $scope.threeBedroomImageUpload = function () {
        var threeBed = document.getElementById('threeBed').files[0];
        //$files: an array of files selected, each file has name, size, and type.
        if (!threeBed) return;

        console.log(threeBed);
        var image = "image";
        $upload.upload({
            url: 'php_server/API/uploadImage.php',
            data: {file: threeBed, upload: image}
        }).then(function (resp) {
            // file is ImageUpload successfully
            console.log(resp.data);
            $scope.threeBedImage = resp.data;
        });
    };


    //Saving description to the database
    $scope.saveDescription = function () {
        var description = $scope.Description.description;
        var data = {
            descriptionTitle: "description",
            description: description
        };

        $http.post("createApartment.api.php", data).success(function (response) {

        });
        console.log(data.description);
    };

    //Submit Room Type
    $scope.submitRoomType = function () {
        var data = null;
        try {
            data = {
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
                "Three bedroom: " + data.threeBedroom + " " + data.threeBedroomPrice)

        } catch (e) {
            console.log(e.message);
        }


        // $http.post("createApartment.api.php", data).success(function (response) {
        //
        // });


    };

    //Open detail info function
    function openDetailInfo() {

        $state.go("/details");
        //Then load the detail information for this specific data

        //Server API

    }//End of function

    //update data function
    function updateData() {
        //Push new updates to this users tables

        //Server API

    }//End of function

    function deleteInfo() {
        //Perform delete on current data
        //Send this information to the database

        //Server API

    }


    function searchData() {
        //Get all the data from the base to perform display on the UI
        $http.post("php_server/API/display.record.api.php").success(function (response) {

            console.log("Apt name: " + response.apartName + " LeaseTerm " + response.leaseTerm +
                " Pets: " + response.pets + " Studio: " + response.studio +
                " Studio LeasePrice: " + response.studioPrice + " One bedroom: "
                + response.oneBedroom + " One bed LeasePrice " + response.oneBedroomPrice +
                " Two bedRoom " + response.twoBedroom + " Lease Price: " +
                response.twoBedroomPrice + " Three bedroom: " + response.threeBedroom + " LeasePrice: "
                + response.threeBedroomPrice);
            localStorage.setItem("token", JSON.stringify(response));

            $state.go("/");

        }).error(function (error) {
            //Catch errors here

        });
    }
});