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

/**
 * @param $connection
 */

display();

/* Method calling */
function display()
{
    $data = displayData();
//    var_dump($data);
    foreach ($data as $item) {
        echo "Apartment name: " . $item['name'] . " | Lease Term: " . $item['leaseTerm'] .
            " | Pets: " . $item['pets'] . " Location: " . $item['address'] . " | Description: " . $item['description'] . "<br>\n";

        echo "Studio True/false: " . $item['available'] . " | Price: " . $item['price'] .
            " | Image: " . $item['image'] . " | Description: " . "<br>\n";

        echo "One bedroom True/false: " . $item['available'] . " | Price: " . $item['price'] .
            " | Image: " . $item['image'] . " | Description: " . "<br>\n";

        echo "Two bedroom True/false: " . $item['available'] . " | Price: " . $item['price'] .
            " | Image: " . $item['image'] . " | Description: " . "<br>\n";
        echo "Three bedroom True/false: " . $item['available'] . " | Price: " . $item['price'] .
            " | Image: " . $item['image'] . " | Description: " . "<br>\n";
    }
}


function readAllData()
{


    
}







