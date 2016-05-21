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
//$data = json_decode(file_get_contents("php://input"));


/**
 * @param $connection
 * @throws Exception
 */

function createApartment($connection)
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


//    $query .= "SELECT '{$apartment->getAddress()}', {$last_id}";
//    mysqli_query($connection, $query);

//    echo $last_id;
    /*
        if ($result === TRUE) {
            $last_id = $connection->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $last_id;
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }*/


//
//INSERT INTO Studio(available, price, image, apt_id) 
//	SELECT "false", 0.00, "image/thegrove/jpg", @max;
//
//INSERT INTO OneBedroom(available, price, image, apt_id) 
//	SELECT "true", 540.00, "image/thegrove/jpg", @max;
//
//INSERT INTO TwoBedroom(available, price, image, apt_id) 
//	SELECT "true", 7200.00, "image/thegrove/jpg", @max;
//
//INSERT INTO ThreeBedroom(available, price, image, apt_id) 
//	SELECT "false", 0.00, "image/thegrove/jpg", @max;

    $connection = null; //Closed connection

}


/************** Execute the function ******************/
try {
    createApartment($connection);

} catch (Exception $e) {
    echo $e;
}










