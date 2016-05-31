<!doctype html>
<!-- Roommate search application. The app is build to target students within smaller town -->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Roomly Space</title>
    <link rel="stylesheet" href="public/css/css/foundation.min.css">
    <link rel="stylesheet" href="public/css/css/custom.css">
    <link rel="stylesheet" href="public/css/css/inbox-css.css">
    <link rel="stylesheet" href="public/css/css/sign-register.css">
    <link rel="stylesheet" href="public/css/css/nav-styling.css">
    <link type="text/css" rel="stylesheet"
          href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans|Roboto|Playfair+Display|Crete+Round' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald|Montserrat:400,700|Candal|Bitter' rel='stylesheet'
          type='text/css'>    <!-- Angular scripts -->
    <script src="public/angular-js/bower_components/angular/angular.min.js"></script>
    <script src="public/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="public/angular-js/angular-file-upload.js"></script>


    <style>
        div:hover > select {
            display: block;
            background: #f9f9f9;
            border-top: 1px solid purple;
        }

        div:hover > select > option {
            padding: 5px;
            border-bottom: 1px solid #4f4f4f;
        }

        div:hover > select > option:hover {
            background: white;
        }

    </style>

</head>
<body ng-app="apartmentSearch" ng-controller="CrudController">

<!-------------------------------------------------------------------------->

<!---------- Navigation      -------->
<nav ng-include="'views/nav.html'"></nav>

<!-------- End of navigation --------->

<!-------------------------------------------------------------------------->

<!------------- Main content ------->
<div ui-view class="view">

</div>

<!------------ End of Main content ----------->

<!-------------------------------------------------------------------------->

<!-------------------------------------------------------------------------->

<!------------- JavaScript file ------------>
<script src="public/css/js/vendor/jquery.min.js"></script>
<script src="public/css/js/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!--<script src="public/js/load_js_files.js"></script>-->
<script src="public/js/app.js"></script>
<script src="public/css/js/foundation.min.js"></script>
<script src="public/css/js/foundation.min.js"></script>
<script src="public/js/controllers/crudUserController.js"></script>
<script src="public/js/services/authentication.js"></script>
<script src="public/js/services/sessionServices.js"></script>
<script src="public/js/custom-ui-styling/custom-styling-jquery.js"></script>

<script>
    $(document).foundation();
</script>
</body>
</html>