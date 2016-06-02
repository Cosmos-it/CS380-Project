<?php
/**********************
 * Created by Taban Cosmos.
 * User: Taban
 * Date: 9/21/15
 * Time: 9:03 PM
 ****************************/

/******************* IMPORT FILES ***********************/
require_once("../Auto-Load.php");
require_once("../Functions/included_functions.php");

/************* Database connections *********************/
$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
$data = json_decode(file_get_contents("php://input"));


displayLocation();
function displayLocation()
{
    global $connection;
    $current_user_id = $_GET['id'];

    $query = "SELECT address FROM Location WHERE APT_ID = '{$current_user_id}'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Database query failed");
    }

    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);

}








