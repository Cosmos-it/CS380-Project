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
require_once ("../classes/Login.php");
require_once("../Functions/included_functions.php");

/************* Database connections *********************/
$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
$data = json_decode(file_get_contents("php://input"));

/******** Create Apartment details function **************
 * @param $data
 * @throws Exception
 *********************************************************/
function createApartment($data)
{
    global $connection;
    /* Create apartment */
    $apartment = ApartmentV2::CreateApartment();
    $apartment->setAptName($data->name);
    $apartment->setPets($data->pets);
    $apartment->setLeaseTerm($data->lease);
    $apartment->setDescription($data->description);

    $apartment->setAddress($data->address);
    
    /* Create Studio */
    $apartment->getStudio()->setAvailable($data->studio);
//    $apartment->getStudio()->getImage($data);
    $apartment->getStudio()->setPrice($data->studioPrice);
    
    /* Create getOneBedroom */
    $apartment->getOneBedroom()->setAvailable($data->oneBedroom);
//    $apartment->getOneBedroom()->getImage($data->oneBedroomCheck);
    $apartment->getOneBedroom()->getPrice($data->oneBedroomPrice);
    
    /* Create getTwoBedroom */
    $apartment->getTwoBedroom()->setAvailable($data->twoBedroom);
//    $apartment->getTwoBedroom()->getImage($data->twoBedroomImage);
    $apartment->getTwoBedroom()->getPrice($data->twoBedroomPrice);
    
    /* Create getThreeBedroom */
    $apartment->getThreeBedroom()->setAvailable($data->threeBedroom);
//    $apartment->getThreeBedroom()->getImage($data->threeBedroomImage);
    $apartment->getThreeBedroom()->getPrice($data->threeBedroomPrice);

    /***************************************************************************
     *   INSERT DATA INTO DATABASE
     ***************************************************************************/
    $sql = "INSERT INTO apartment(name, leaseTerm, pets, description)";
    $sql .= " VALUES( '{$apartment->getAptName()}', '{$apartment->getLeaseTerm()}',";
    $sql .= "'{$apartment->getPets()}', '{$apartment->getDescription()}')";
    $result = mysqli_query($connection, $sql);
    confirm_query($sql);
    /*$last_id = $connection->insert_id;*/

    if ($result) {
        echo json_encode("success");
    } else {
        echo json_encode("failed");
    }
    $connection = null; //Closed connection
}

/* Sign up function */
function signUp($data)
{

    global $connection;
    $name = $data->name;
    $email = $data->email;
    $password = $data->password;
    $sql = "INSERT INTO apartment (name, email, password)";
    $sql .= " VALUES ( '{$name}', '{$email}', '{$password}')";
    $result = mysqli_query($connection, $sql);
    confirm_query($result);

    $last_id = $connection->insert_id;

    echo json_encode($last_id);

    $connection = null;
}

/* Login function  */
/**
 * @param $data
 * @throws Exception
 */
function loginAdmin($data)
{
    global $connection;

    $login = Admin::createAdmin();
    $email = $login->setEmail($data->email);
    $password = $login->setPassword($data->passoword);
    $sql = "SELECT email, password FROM apartment ";
    $sql .= " WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_guery($connection, $sql);
    confirm_query($result);
    $connection = null;//Close connection
}

/************** Call the functions ******************/
try {

    if ($data->register == "register") {
        signUp($data);

    } elseif ($data->createApartment == "create") {
        createApartment($data);

    } elseif ($data->login == "login") {
        loginAdmin($data);
    } else {
        echo "<div style='color:red;'><h1 style='text-align: center; margin-top: 50px;'>STOP IT!<br>
              <span style='font-size: 70px;'>&#x1f620;</span><br>You have no permission.</h1></div>";
    }

} catch (Exception $e) {
    echo $e;
}










