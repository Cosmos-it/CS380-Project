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


/************** Data from the front-end ******************/
$data = json_decode(file_get_contents("php://input"));


if ($data->display == "display") {
    displayCurrentRecords();
} else {
    echo "Not allowed here";

}


function displayCurrentRecords()
{
    global $connection;
    $current_user_id = $_GET[id];

    $query = "SELECT username, profileImage, leaseTerm, pets, description, address FROM apartment " .
        "INNER JOIN Location ON (apartment.Apt_id = Location.APT_ID) " .
        "WHERE apartment.apt_id = '{$current_user_id}' LIMIT 1";

    $result = mysqli_query($connection, $query);

//    $sql = "SELECT username, leaseTerm, pets, description, profileImage FROM apartment WHERE apt_id='{$current_user_id}'";
//    $result = mysqli_query($connection, $sql);


    if (!$result) {
        die("Database query failed");
    }
    //New data converted into array
    $array_data = array();
//    while ($row = mysqli_fetch_assoc($result)) {
//        $array_data[] = $row;
//    }
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);

}







