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


displayCurrentRecords();


function displayCurrentRecords()
{
    global $connection;
    $current_user_id = $_GET['id'];

    $query = "SELECT * FROM apartment WHERE apartment.apt_id = '{$current_user_id}'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Database query failed");
    }

    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);

}







