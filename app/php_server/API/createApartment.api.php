<?php
/**********************
 * Created by Taban Cosmos.
 * User: Taban
 * Date: 9/21/15
 * Time: 9:03 PM
 ****************************/


/******************* IMPORT FILES ************************/
require_once("../Auto-Load.php");
require_once("../classes/ApartmentV2.php");
require_once("../Functions/included_functions.php");

/************* Database connections ******************/
$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
$data = json_decode(file_get_contents("php://input"));


/**
 * Create Apartment details function
 * @param $connection
 * @throws Exception
 */
function createApartment($connection, $data)
{
    /**
     * Example for retrieving data from the front-en
     *
     * $apartName = $data->apartName
     *
     */

//    $apartName = $data->apartName;

    
    /* Create apartment */
    $apartment = ApartmentV2::CreateApartment();
    $apartment->setAptName("The Grove");
    $apartment->setPets("yes");
    $apartment->setLeaseTerm(12);
    $apartment->setDescription("It has a pool and people have always");

    $apartment->setAddress("Ellensburg");
    
    /* Create Studio */
    $apartment->getStudio()->setAvailable(true);
    $apartment->getStudio()->getImage("string/image");
    $apartment->getStudio()->getPrice(600.00);
    
    /* Create getOneBedroom */
    $apartment->getOneBedroom()->setAvailable(true);
    $apartment->getOneBedroom()->getImage("string/image");
    $apartment->getOneBedroom()->getPrice(600.00);
    
    /* Create getTwoBedroom */
    $apartment->getTwoBedroom()->setAvailable(true);
    $apartment->getTwoBedroom()->getImage("string/image");
    $apartment->getTwoBedroom()->getPrice(600.00);
    
    /* Create getThreeBedroom */
    $apartment->getThreeBedroom()->setAvailable(true);
    $apartment->getThreeBedroom()->getImage("string/image");
    $apartment->getThreeBedroom()->getPrice(600.00);

    /***************************************************************************
     *   INSERT DATA INTO DATABASE
     ***************************************************************************/
    $sql = "INSERT INTO apartment(name, leaseTerm, pets, description)";
    $sql .= " VALUES( '{$apartment->getAptName()}', '{$apartment->getLeaseTerm()}',";
    $sql .= "'{$apartment->getPets()}', '{$apartment->getDescription()}')";
    $result = mysqli_query($connection, $sql);
    confirm_query($sql);
    $last_id = $connection->insert_id;

    $query = "INSERT INTO location(address, Apt_id)";
    $query .= " VALUES ('{$apartment->getAddress()}', '{$last_id}'";

    mysqli_query($connection, $query);
    confirm_query($result);

    echo "New record created successfully. Last inserted ID is: " . $last_id;

    $connection = null; //Closed connection

}


/* Sign up function */
function signUp($data) {

    global $connection;
    $name = $data->name;
    $email = $data->email;
    $password = $data->password;
    $sql = "INSERT INTO apartment (name, email, password)";
    $sql .=" VALUES ( '{$name}', '{$email}', '{$password}')";
    $result = mysqli_query($connection, $sql);
    confirm_query($result);

    $last_id = $connection->insert_id;

    echo json_encode($last_id);

    $connection = null;
}

/* Login function  */
function loginAdmin($data)
{
    global $connection;
    $email = $data->email;
    $password = $data->email;
    $sql = "SELECT email, password FROM apartment ";
    $sql .= " WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_guery($connection, $sql);
    confirm_query($result);
    $connection = null;//Close connection
}


/************** Call the functions ******************/
try {

    if ($data->register == "register"){
        signUp($data);
    } elseif ($data->createApartment == "create") {
        createApartment($connection, $data);
    }

} catch (Exception $e) {
    echo $e;
}










