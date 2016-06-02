<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 6/1/16
 * Time: 4:38 PM
 */

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


if ($data->display == "three") {
    displayThreeBedroom();
} else {
    echo "Not allowed here";
}

//Display Studio
function displayThreeBedroom()
{
    global $connection;
    $current_user_id = $_GET['id'];
    $sql = "SELECT available, price, image FROM ThreeBedroom WHERE APT_ID = {$current_user_id}";
    //Performing mysql query
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die("Database query failed");
    }

    //New data converted into array
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);


}