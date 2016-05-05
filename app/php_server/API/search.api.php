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


/* Display all data */
function displayAllData($data)
{
    foreach ($data as $item) {
        echo "Apartment name: " . $item['name'] . " | Bed Room: " . $item['rooms'] .
            " | Pets: " . $item['pets'] . " | Lease term: " . $item['lease'] .
            " | Cost: " . $item['cost'] . " | Address " . $item['address'] . "<br>\n";
    }
}


//Global variable
echo("\nDisplay all data:");
echo("..........................................................................................................<br>\n");
displayAllData($data); //Display data

echo("\nThree bedroom with price less $1000 location Brooklane <br>\n");
echo("..........................................................................................................<br>\n");
searchWithThreeParameters($data, "three-bedroom", 1230, "Brooklane"); //search the data.

echo("\nTwo bedroom search price less than $700 location Alder <br>\n");
echo("..........................................................................................................<br>\n");
searchWithThreeParameters($data, "two-bedroom", 1100, "Alder"); //search the data.

echo("\nThree bedroom $1000 Brooklane <br>\n");
echo("..........................................................................................................<br>\n");
searchWithThreeParameters($data, "three-bedroom", 1300, "Brooklane"); //search the data.

echo("\nStudio price $1000 Airport <br>\n");
echo("..........................................................................................................<br>\n");
searchWithThreeParameters($data, "one-bedroom", 1000, "Airport"); //search the data.


//Close database after successful connection
if (isset($connection)) {
    mysqli_close($connection);
}