<?php
/**********************
 * Created by Taban Cosmos.
 * User: Taban
 * Date: 9/21/15
 * Time: 9:03 PM
 ****************************/

/******************* IMPORT FILES ***********************/
require_once("../Auto-Load.php");
require_once("../classes/ApartmentV2.php");
require_once("../classes/Admin.php");
require_once("../Functions/included_functions.php");

/************* Database connections *********************/
$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
$data = json_decode(file_get_contents("php://input"));


/******** Create Apartment details function **************
 * @param $data
 * @throws Exception
 *
 *********************************************************/
function submitInfo($data)
{
    global $connection;

    $current_user_id = $_GET['id'];


    /* Create apartment */
    $pets = mysql_prep($data->check);
    $lease = mysql_prep($data->leaseTerm);
    $location = mysql_prep($data->location);

    locationInsert($location, $current_user_id, $connection);//Set location

    $sql = "UPDATE apartment SET  leaseTerm='{$lease}', pets= '{$pets}' WHERE apt_id='{$current_user_id}'";
    $result = mysqli_query($connection, $sql);
    confirm_query($result);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }



    $connection = null; //Closed connection
    
}

/**
 * @param $location
 * @param $current_user_id
 * @param $connection
 */
function locationInsert($location, $current_user_id, $connection)
{
    $sql1 = "INSERT INTO Location (address, APT_ID) VALUES  ('{$location}', '{$current_user_id}')";
    $result = mysqli_query($connection, $sql1);
    confirm_query($result);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}//END OF FUNCTION

/* Sign up function */
function signUp($data)
{
    
    global $connection;
    $name = $data->name;
    $email = $data->email;
    $password = sha1($data->password);
    $sql = "INSERT INTO apartment (username, email, password)";
    $sql .= " VALUES ( '{$name}', '{$email}', '{$password}')";
    $result = mysqli_query($connection, $sql);
    
    if ($result) {
        echo "success";
    } else {
        echo "User name exists";
    }
    
    
    $connection = null;
    
}//END OF FUNCTION

//Finished
function loginAdmin($admin)
{
    global $connection;
    $email = mysql_prep($admin->email);
    $password = mysql_prep($admin->password);
    $password = sha1($password);
    
    $query = "SELECT apt_id  FROM apartment WHERE email ='{$email}' AND password ='{$password}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    if (!empty($row)) {
        session_start();
        $row = $row['apt_id'];
        $_SESSION["apt_id"] = $row;
        echo($_SESSION["apt_id"]);

    } else {
        echo "fail";
    }

    $connection = null;//Close connection
    
}//E O F

//Finished
function descriptionUpdate($data, $connection) //Update description
{
    $current_user_id = $_GET['id'];
    $description = mysql_prep($data->description);

    $sql = "UPDATE apartment SET description ='{$description}' WHERE apt_id='{$current_user_id}'";
    $result = mysqli_query($connection, $sql);
    confirm_query($result);
    if ($result) {
        echo "success";

    } else {
        echo "server error";
    }

    $connection = null;//Close connection

}//E O F


/************** Call the functions ******************/
try {

    if ($data->register == "register") {
        signUp($data);
    } elseif ($data->type == "update") {
        submitInfo($data);
    } elseif ($data->createApartment == "create") {
        submitInfo($data);
    } elseif ($data->title == "description") {
        descriptionUpdate($data, $connection);
    } elseif ($data->login == "login") {
        loginAdmin($data);
    } else {
        echo "<div style='color:red;'><h1 style='text-align: center; margin-top: 50px;'>STOP IT!<br>
              <span style='font-size: 70px;'>&#x1f620;</span><br>You have no permission.</h1></div>";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}









