<?php

/********************************/
require_once("../Auto-Load.php");
require_once("../classes/Preference.php");
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/2/16
 * Time: 7:51 AM
 */

$databaseInstance = LocalDatabase::getInstance();
$connection = $databaseInstance->getConnection();
//
//$data = displayData();

$data = json_decode(file_get_contents("php://input"));



//Search database
function searchWithThreeParameters($data, $bedType, $cost, $location)
{
    foreach ($data as $item) {
        if ($item['cost'] <= $cost && $item['rooms'] === $bedType && strpos($item['address'], $location)) {
            echo "Apartment name: " . $item['name'] . " | Bed Room: " . $item['rooms'] .
                " | Pets: " . $item['pets'] . " | Lease term: " . $item['lease'] .
                " | Cost: " . $item['cost'] . " | Address " . $item['address'] . "<br>\n";
        }
    }
}

$email = "test@test.com";
$password = sha1("1");

$query = "SELECT apt_id  FROM apartmentDB.apartment" . " WHERE email ='{$email}' AND password ='{$password}' LIMIT 1";
$result = mysqli_query($connection, $query);
$array_data = array();

$row = mysqli_fetch_assoc($result);

if (!empty($row)) {
    session_start();
    $row = $row['apt_id'];
    $_SESSION["username"] = $row;
    echo ($_SESSION["username"]);
} else {
    echo "error login";
}

//if ($result) {
//    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//    session_start();
////        $_SESSION['username'] = uniqid('ang_');
//    echo $_SESSION[$row['apt_id']];
//} else {
//    echo "fail";
//}


//Close database after successful connection
if (isset($connection)) {
    mysqli_close($connection);
}









