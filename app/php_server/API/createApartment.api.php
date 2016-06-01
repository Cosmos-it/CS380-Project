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


//Global initialization
$apartment = ApartmentV2::CreateApartment();

/******** Create Apartment details function **************
 * @param $data
 * @param $apartment
 * @throws Exception
 *********************************************************/
function createApartment($data, $apartment)
{
    global $connection;
    /* Create apartment */
    $apartment->setAptName($data->name);
    $apartment->setPets($data->pets);
    $apartment->setLeaseTerm($data->lease);
    $apartment->setDescription($data->description);
    $apartment->setAddress($data->address);

    $sql = "INSERT INTO apartment(leaseTerm, pets)";
    $sql .= " VALUES('{$apartment->getLeaseTerm()}',";
    $sql .= "'{$apartment->getPets()}''";
    $result = mysqli_query($connection, $sql);
    confirm_query($sql);


    $connection = null; //Closed connection
    
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


function loginAdmin($admin)
{
    global $connection;
    $email = $admin->email;
    $password = $admin->password;
    $password = sha1($password);
    
    $query = "SELECT apt_id  FROM apartmentDB.apartment" . " WHERE email ='{$email}' AND password ='{$password}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);

    if (!empty($row)) {
        session_start();
        $row = $row['apt_id'];
        $_SESSION["apt_id"] = $row;
        echo ($_SESSION["apt_id"]);

    } else {
        echo "fail";
    }

    $connection = null;//Close connection
    
}//E O F


function descriptionUpdate($data) //Update description
{
    global $connection;
    $session_id = $_GET['apt_id'];
    $description = $data->description;

    $sql = "UPDATE apartment SET description='{$description}' WHERE apt_id='{$session_id}'";
    $result = mysqli_query($connection, $sql);
    confirm_query($result);

    $connection = null;//Close connection

}//E O F


function roomTypeInfo($data) //Room type info
{
    $id = $_GET['apt_id'];
    $pets = $data->pets;
    $description = $data->description;
    $sql = "UPDATE apartment SET pets='{$pets}', description='{$description}' WHERE apt_id='{$id}')";
    $result = query_db($sql);
    confirm_query($result);
    
    echo json_encode("success");
    
    $connection = null;
    
}//E O F

/* Login function  */
/**
 * @param $admin
 * @throws Exception
 */


/************** Call the functions ******************/
try {
    
    if ($data->register == "register") {
        signUp($data);
    } elseif ($data->createApartment == "roomType") {
        roomTypeInfo($data);
    } elseif ($data->createApartment == "create") {
        createApartment($data, $apartment);
    } elseif ($data->descriptionTitle == "description") {
        descriptionUpdate($data);
    } elseif ($data->login == "login") {
        loginAdmin($data);
    } else {
        echo "<div style='color:red;'><h1 style='text-align: center; margin-top: 50px;'>STOP IT!<br>
              <span style='font-size: 70px;'>&#x1f620;</span><br>You have no permission.</h1></div>";
    }
    
} catch (Exception $e) {
    echo $e->getMessage();
}










