<?php
/**********************
 * Created by Taban Cosmos.
 * User: Taban
 * Date: 9/21/15
 * Time: 9:03 PM
 ****************************/
/**************************
 *  IMPORT FILES
 *********************************/
require_once("../Auto-Load.php");
require_once("../classes/Preference.php");
/*****************************************************
 * This API inserts data into the database
 *
 *
 * Things to do:
 *  1: Catching errors
 *      Checking for all inputs before they are submitted to the
 *      database
 *      Sending the result back to frontend so that
 *      a friendly message can be display to the users.
 *
 *****************************************************************/
/** Database connection **/
$databaseInstance = LocalDatabase::getInstance();
$connection = $databaseInstance->getConnection();

/**
 * @param $connection
 */

/* Method calling */
//addInfo($connection);

displayData($connection);



function displayData($connection)
{
    $sql = 'SELECT * FROM apt_table';
    //Performing mysql query
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die("Database query failed");
    }

    //New data converted into array
    $array_data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $array_data[] = $row;
    }

    //encode the data into array.
    $json = json_encode($array_data);
    echo $json;


    //Close database after successful connection
    if (isset($connection)) {
        mysqli_close($connection);
    }
}


//Update the information
function updateInfo()
{

}

function deleteById()
{


}

function addInfo($connection)
{

    $name = "Fuck it Apartment";
    $room = 1;
    $cost = 200;
    $lease = 9;
    $pets = "yes";
    $address = "12128 N Cosmos St.";
    $sql = "INSERT INTO apt_table ( ";
    $sql .= "name,rooms,cost,lease,pets,address";
    $sql .= ") VALUES ('{$name}','{$room}','{$cost}','{$lease}','{$pets}','{$address}');";

    //Performing mysql query
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die("Database query failed");
    }

}







