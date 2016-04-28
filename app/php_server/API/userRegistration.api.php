<?php
/****************************************************
 * This API inserts data into the database
 * Created by PhpStorm.
 * User: Taban
 * Date: 9/9/15
 * Time: 12:38 PM
 ****************************/

/*********** IMPORT FILES  *************/
require_once("../Auto-Load.php");
include("../classes/Registration.php");

//Database Connection
$database = LocalDatabase::getInstance();
$connection =& $database->getConnection();
$data = json_decode(file_get_contents("php://input"));

/**
 * @param $data
 * @param $connection
 * @throws Exception
 */

function registerUser($data, $connection)
{
    $query = "";
    try {
        //Registration object
        $createUser = new Registration();

        // Set the data from the user
        $firstName = $data->firstName;
        $lastName = $data->lastName;
        $email = $data->email;
        $password = $data->password;
        $roomStatus = $data->roomOwner;

        //user profile image

        //Set values
        $createUser->setFirstName($firstName);
        $createUser->setLastName($lastName);
        $createUser->setEmail($email);
        $createUser->setPassword($password);
        $createUser->setRoomStatus($roomStatus);

        /** Post the data to database **/
        $userName = $createUser->getUsername();
        $roomOwner = $createUser->getRoomStatus();
        $firstName = $createUser->getFirstName();
        $lastName = $createUser->getLastName();
        $email = $createUser->getEmail();
        $password = $createUser->getPassword();

        //Get values and post them into query.
        $query = "INSERT INTO users (";
        $query .= " username, firstname, lastname, password, roomstats, email";
        $query .= " ) VALUES ( '{$userName}', '{$firstName}', '{$lastName}', ";
        $query .= "'{$password}', '{$roomOwner}', '{$email}')";

        $result = mysqli_query($connection, $query);
        confirm_query($result, $connection);

        echo $result . json_encode($userName);//return user name.

    } catch (PDOException $e) {
        echo $query . $e->getMessage();
    }
    $connection = null; //Closed connection
}
registerUser($data, $connection);










