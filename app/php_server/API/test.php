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
require_once("../classes/Admin.php");
require_once("../Functions/included_functions.php");

/************* Database connections *********************/
$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
$data = json_decode(file_get_contents("php://input"));

loginAdmin($data);

//Finished
function loginAdmin($admin)
{
    global $connection;
    $email = ($admin->email);
    $password = ($admin->password);
    $password = sha1($password);

    $query = "SELECT apt_id  FROM apartment WHERE email ='{$email}' AND password ='{$password}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        $row = mysqli_fetch_assoc($result);

        if (!empty($row)) {
            session_start();
            $row = $row['apt_id'];
            $_SESSION["apt_id"] = $row;
            echo($_SESSION["apt_id"]);

        } else {
            echo "fail";
        }
    } else {
        echo "fail";
    }


    $connection = null;//Close connection

}//E O F










