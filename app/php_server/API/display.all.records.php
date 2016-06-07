<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 6/2/16
 * Time: 12:12 AM
 */

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


function returnData()
{
    global $connection;
    $sql = "SELECT * FROM apartment LEFT JOIN location ON apartment.apt_id = location.APT_ID
  INNER JOIN Studio ON apartment.apt_id = Studio.APT_ID
  INNER JOIN OneBedroom ON apartment.apt_id = OneBedroom.APT_ID
  INNER JOIN TwoBedroom ON apartment.apt_id = TwoBedroom.APT_ID
  INNER JOIN ThreeBedroom ON apartment.apt_id = ThreeBedroom.APT_ID";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Database query failed");
    }
    $array_data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $array_data[] = $row;
    }
//encode the data into array.
    $json = json_encode($array_data);
    echo $json;
}


returnData();
