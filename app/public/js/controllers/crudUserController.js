/**
 * Created by Taban on 5/5/16.
 */

apartmentSearch.controller('CrudController', function ($scope, $http, $state) {

    /* Errors */
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

    $scope.submitInfo = function () {
        /* Initialize check button to assign values*/
        var apartName = $scope.info.apartName;
        var leaseTerm = $scope.info.leaseTerm;
        var location = $scope.info.petsCheckBox;
        var description = $scope.info.description;
        var studioCheck = $scope.info.studioChecked;
        var oneBedroomCheck = $scope.info.oneChecked;
        var twoBedroomCheck = $scope.info.twoChecked;
        var threeBedroomCheck = $scope.info.threeChecked;
        var studioLeasePrice = $scope.info.sPrice;
        var studioImage = $scope.info.studioImage;
        var oneBedroomLeasePrice = $scope.info.onePrice;
        var oneBedroomImage = $scope.info.oneImage;
        var twoBedroomLeasePrice = $scope.info.twoPrice;
        var twoBedroomImage = $scope.info.twoImage;
        var threeBedroomLeasePrice = $scope.info.threePrice;
        var threeBedroomImage = $scope.info.threeImage;
        var petsCheckBox = $scope.info.petsCheckBox;

        //Text validation and assigning
        if (apartName == undefined) apartName = null;
        if (description == undefined) description = null;

        //Integer for lease term validation and assigning
        if (leaseTerm == undefined) leaseTerm = null;

        //Checkbox validation and assigning
        if (petsCheckBox == undefined) petsCheckBox = false;
        if (studioCheck == undefined) studioCheck = false;
        if (oneBedroomCheck == undefined) oneBedroomCheck = false;
        if (twoBedroomCheck == undefined) twoBedroomCheck = false;
        if (threeBedroomCheck == undefined) threeBedroomCheck = false;

        //Price validation and assigning
        if (studioLeasePrice == undefined) studioLeasePrice = 0.00;
        if (oneBedroomLeasePrice == undefined) oneBedroomLeasePrice = 0.00;
        if (twoBedroomLeasePrice == undefined) twoBedroomLeasePrice = 0.00;
        if (threeBedroomLeasePrice == undefined) threeBedroomLeasePrice = 0.00;

        //Image validation and assigning
        if (studioImage == undefined) studioImage = null;
        if (oneBedroomImage == undefined) oneBedroomImage = null;
        if (twoBedroomImage == undefined) twoBedroomImage = null;
        if (threeBedroomImage == undefined) threeBedroomImage = null;
        if (location == undefined) location = null;

        //Grab data
        var data = {
            createApartment: "create",
            apartName: apartName,
            leaseTerm: leaseTerm,
            pets: petsCheckBox,
            location: location,
            description: description,
            studioCheck: studioCheck,
            studioLeasePrice: studioLeasePrice,
            studioImage: studioImage,
            oneBedroomCheck: oneBedroomCheck,
            oneBedroomLeasePrice: oneBedroomLeasePrice,
            oneBedroomImage: oneBedroomImage,
            twoBedroomCheck: twoBedroomCheck,
            twoBedroomLeasePrice: twoBedroomLeasePrice,
            twoBedroomImage: twoBedroomImage,
            threeBedroomCheck: threeBedroomCheck,
            threeBedroomLeasePrice: threeBedroomLeasePrice,
            threeBedroomImage: threeBedroomImage
        };

        //Test
        console.log("Apt name: " + data.apartName + " LeaseTerm " + data.leaseTerm +
            " Pets: " + data.pets + " Location: " + data.location + " Description:" + data.description + " Studio: " + data.studioCheck +
            " Studio LeasePrice: " + data.studioLeasePrice + " One bedroom: " +
            "" + data.oneBedroomCheck + " One bed LeasePrice " + data.oneBedroomLeasePrice +
            " Two bedRoom " + data.twoBedroomCheck + " Lease Price: " + data.twoBedroomLeasePrice +
            " Three bedroom: " + data.threeBedroomCheck + " LeasePrice: " + data.threeBedroomLeasePrice);

        $http.post("php_server/API/createApartment.api.php", data).success(function (response) {
            console.log("Test" + response);
            localStorage.setItem("token", JSON.stringify(response));

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
            localStorage.setItem("token", JSON.stringify(response));

        }).error(function (error) {
            //Catch server errors

        });
    };//End of sign up function


    /****************** Check for undefined fields and show errors *********************/
    if ($scope.loginEmail == undefined) $scope.loginEmailError = errors.emailError;
    if ($scope.loginPassword == undefined) $scope.loginPasswordError = errors.passwordError;

    //login function
    $scope.login = function () {
        var data = {
            login:"login",
            email: $scope.loginEmail,
            password: $scope.loginPassword
        }
        //Test login here
        console.log("Email: " + data.email + " |Password: " + data.password);

        $http.post('php_server/API/createApartment.api.php', data).success(function (response) {
            console.log("Test" + response);
            localStorage.setItem("token", JSON.stringify(response));

        }).error(function (error) {
            //Catch server errors

        });

    };//End of login function

    //Open detail info function
    function openDetailInfo() {

        $routeprovider.go("/details");
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
        $http.post("../php_server/API/display.record.api.php").success(function (response) {

            console.log("Apt name: " + response.apartName + " LeaseTerm " + response.leaseTerm +
                " Pets: " + response.pets + " Studio: " + response.studioCheck +
                " Studio LeasePrice: " + response.studioLeasePrice + " One bedroom: "
                + response.oneBedroomCheck + " One bed LeasePrice " + response.oneBedroomLeasePrice +
                " Two bedRoom " + response.twoBedroomCheck + " Lease Price: " +
                response.twoBedroomLeasePrice + " Three bedroom: " + response.threeBedroomCheck + " LeasePrice: "
                + response.threeBedroomLeasePrice);
            localStorage.setItem("token", JSON.stringify(response));

            $state.go("/");

        }).error(function (error) {
            //Catch errors here

        });

    }


})