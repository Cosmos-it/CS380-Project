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

display();

/* Method calling */
function display() {
    $data = displayData();
    foreach ($data as $item) {
        echo "Apartment name: " . $item['name'] . " | Bed Room: " . $item['rooms'] .
            " | Pets: " . $item['pets'] . " | Lease term: " . $item['lease'] .
            " | Cost: " . $item['cost'] . " | Address " . $item['address'] . "<br>\n";
    }
}

//Update the information
function updateInfo() { }

function deleteById() {}

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







