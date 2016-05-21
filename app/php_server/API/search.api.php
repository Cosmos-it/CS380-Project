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

$data = displayData();

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

//Close database after successful connection
if (isset($connection)) {
    mysqli_close($connection);
}









