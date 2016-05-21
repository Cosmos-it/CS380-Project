/**
 * Created by Taban on 5/5/16.
 */

apartmentSearch.controller('CrudController', function ($scope, $http) {


    /* Test */


    /* Errors */
    var errors = {
        nameError: "Can't be empty",
        descriptionError: "Can't be empty",
        leaseTermError: "1 - 12 months + ",
        locationError: "Enter valid address",
        emailError: "Valid Email required",
        passwordError: "Valid password required",
        userName: "Valid user name required"
    };


    if ($scope.apartName == undefined) $scope.nameError = errors.nameError;
    // if ($scope.leaseTermError == undefined) $scope.leaseTermError = errors.leaseTermError;

    $scope.submitInfo = function () {
        console.log($scope.info.apartName);


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
        if (location == undefined) location = null;//location


        var data = {
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


        console.log("Apt name: " + data.apartName + " LeaseTerm " + data.leaseTerm +
            " Pets: " + data.pets + " Location: " + data.location + " Description:" + data.description + " Studio: " + data.studioCheck +
            " Studio LeasePrice: " + data.studioLeasePrice + " One bedroom: " +
            "" + data.oneBedroomCheck + " One bed LeasePrice " + data.oneBedroomLeasePrice +
            " Two bedRoom " + data.twoBedroomCheck + " Lease Price: " + data.twoBedroomLeasePrice +
            " Three bedroom: " + data.threeBedroomCheck + " LeasePrice: " + data.threeBedroomLeasePrice);

        $http.post("../php_server/API/createApartment.api.php", data).success(function (response) {
            console.log("Test" + response);
            localStorage.setItem("token", JSON.stringify(response));

        }).error(function (error) {
            //Catch errors here

        });

    };
    
    $scope.signUp = function () {
        //Test sign up here
        
        
    };
    
    
    $scope.login = function () {
        //Test login here
        
    }

    function openDetailInfo() {

        $routeprovider.go("/details");
        //Then load the detail information for this specific data

        //Server API

    }

    function updateData() {
        //Push new updates to this users tables

        //Server API


    }

    function deleteInfo() {
        //Perform delete on current data
        //Send this information to the database

        //Server API

    }

    function searchData() {
        //Get all the data from the base to perform display on the UI
        $http.post("../php_server/API/DisplayData.api.php").success(function (response) {

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