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
require_once("../classes/ApartmentV2.php");


/*****************************************************
 * This API inserts data into the database
 * Things to do:
 *  1: Catching errors
 *      Checking for all inputs before they are submitted to the
 *      database
 *      Sending the result back to frontend so that
 *      a friendly message can be display to the users.
 *
 *****************************************************************/

/** Database connections **/

/* Database accessible from the Heroku cloud */

//$herokuDB = Database::getInstance();
//$herokuDB_Connection = $herokuDB->getConnection();

/* Local database connection for test purposes */
//Instantiate database
//$database = LocalDatabase::getInstance();
//$connection =& $database->getConnection();


/* Data received from the user interface
* apartmentName
* location
* leaseTerm
* price
*/


//$data = json_decode(file_get_contents("php://input"));


/**
 * @param $connection
 * @param $database
 * @internal param $databaseInstance
 * @internal param $data
 */

//$data1 = '
//{\"users\":
// [
//        {\"apt_Id\":\"1\",\"name\":\"College place\",\"rooms\":\"two-bedroom\",\"cost\":\"800\",\"lease\":\"12\",\"pets\":\"yes\",\"address\":\"1901 Walnut Circle #97, Ellensburg WA 98926\"},
//        {\"apt_Id\":\"2\",\"name\":\"Chateau Alder Apartment\",\"rooms\":\"two-bedroom\",\"cost\":\"700\",\"lease\":\"6\",\"pets\":\"no\",\"address\":\"1108 N Alder St.\"},
//        {\"apt_Id\":\"3\",\"name\":\"Brook Cottages\",\"rooms\":\"three-bedroom\",\"cost\":\"1100\",\"lease\":\"12\",\"pets\":\"no\",\"address\":\"1608 Brook Court\"},
//        {\"apt_Id\":\"4\",\"name\":\"Brooklane\",\"rooms\":\"one-bedroom\",\"cost\":\"680\",\"lease\":\"6\",\"pets\":\"yes\",\"address\":\"1900 N Brooklane St.\"},
//        {\"apt_Id\":\"5\",\"name\":\"Alderwood Manor\",\"rooms\":\"two-bedroom\",\"cost\":\"720\",\"lease\":\"12\",\"pets\":\"no\",\"address\":\"1100, N Alder St.\"},
//        {\"apt_Id\":\"6\",\"name\":\"Alderwood Manor\",\"rooms\":\"one-bedroom\",\"cost\":\"540\",\"lease\":\"12\",\"pets\":\"no\",\"address\":\"1100, N Alder St.\"},
//        {\"apt_Id\":\"7\",\"name\":\"Brooklane\",\"rooms\":\"two-bedroom\",\"cost\":\"840\",\"lease\":\"6\",\"pets\":\"yes\",\"address\":\"1900 N Brooklane St.\"},
//        {\"apt_Id\":\"8\",\"name\":\"Willow Cottages\",\"rooms\":\"three-bedroom\",\"cost\":\"1100\",\"lease\":\"12\",\"pets\":\"no\",\"address\":\"1309 N Willow St.\"},
//        {\"apt_Id\":\"9\",\"name\":\"Brooklane\",\"rooms\":\"three-bedroom\",\"cost\":\"912\",\"lease\":\"6\",\"pets\":\"yes\",\"address\":\"1900 N Brooklane St.\"},
//        {\"apt_Id\":\"10\",\"name\":\"The Grove\",\"rooms\":\"studio\",\"cost\":\"600\",\"lease\":\"6\",\"pets\":\"no\",\"address\":\"2420 Airport Rd.\"},
//        {\"apt_Id\":\"11\",\"name\":\"Kangaroo Apartment\",\"rooms\":\"one-bedroom\",\"cost\":\"600\",\"lease\":\"6\",\"pets\":\"yes\",\"address\":\"12128 N Cosmos St.\"}
//     ]
//    }';

//var_dump($data);

//var_dump($data1);
//$data = json_decode($data1);
//
//echo $data1['users'];

function insertApartmentInfo()
{

    // Make searchable apartment API

    //Create an object
    $apart1 = new ApartmentV2();

    /* Set values */

    $apart1->setAptName("The Groove");
    $apart1->setAddress("Ellensburg");
    $apart1->setLeaseTerm(3);
    $apart1->setPrice(850.00);
    $apart1->setNumBedrooms(2);
    $apart1->setPets("Yes");

    /* Get the results */
    $apartmentName1 = $apart1->getAptName();
    $location1 = $apart1->getLocation();
    $leaseTerm1 = $apart1->getLeaseTerm();
    $price1 = $apart1->getPrice();
    $bedrooms1 = $apart1->getNumBedrooms();
    $pets1 = $apart1->getPets();
    $user_id1 = 4;


    //Create another object
    $apart2 = new ApartmentV2();

    /* Set values */

    $apart2->setAptName("Juniper Ave.");
    $apart2->setLocation("Ellensburg");
    $apart2->setLeaseTerm(2);
    $apart2->setPrice(925.00);
    $apart2->setNumBedrooms(3);
    $apart2->setPets("Yes");


    /* Get the results */
    $apartmentName2 = $apart2->getAptName();
    $location2 = $apart2->getLocation();
    $leaseTerm2 = $apart2->getLeaseTerm();
    $price2 = $apart2->getPrice();
    $bedrooms2 = $apart2->getNumBedrooms();
    $pets2 = $apart2->getPets();
    $user_id2 = 5;

    //Create another object

    $apart3 = new ApartmentV2();

    /* Set values */
    $apart3->setAptName("Water St.");
    $apart3->setLocation("Ellensburg");
    $apart3->setLeaseTerm(4);
    $apart3->setPrice(550.00);
    $apart3->setNumBedrooms(2);
    $apart3->setPets("Yes");

    /* Get Values */
    $apartmentName3 = $apart3->getAptName();
    $location3 = $apart3->getLocation();
    $leaseTerm3 = $apart3->getLeaseTerm();
    $price3 = $apart3->getPrice();
    $bedrooms3 = $apart3->getNumBedrooms();
    $pets3 = $apart3->getPets();
    $user_id3 = 6;

    $apart4 = new ApartmentV2();

    $apart4->setAptName("Timothy Park");
    $apart4->setLocation("Ellesnburg");
    $apart4->setLeaseTerm(5);
    $apart4->setPrice(725.00);
    $apart4->setNumBedrooms(4);
    $apart4->setPets("Yes");

    /* Get Values*/
    $apartmentName4 = $apart4->getAptName();
    $location4 = $apart4->getLocation();
    $leaseTerm4 = $apart4->getLeaseTerm();
    $price4 = $apart4->getPrice();
    $bedrooms4 = $apart4->getNumBedrooms();
    $pets4 = $apart4->getPets();
    $user_id4 = 7;


    /* Create another object*/

    $apart5 = new ApartmentV2();

    /* Set Values*/
    $apart5->setAptName("The Groove");
    $apart5->setLocation("Ellensburg");
    $apart5->setLeaseTerm(2);
    $apart5->setPrice(320.00);
    $apart5->setNumBedrooms(3);
    $apart5->setPets("No");


    /* Get Values */
    $apartmentName5 = $apart5->getAptName();
    $location5 = $apart5->getLocation();
    $leaseTerm5 = $apart5->getLeaseTerm();
    $price5 = $apart5->getPrice();
    $bedrooms5 = $apart5->getNumBedrooms();
    $pets5 = $apart5->getPets();
    $user_id5 = 8;


    /* Create a new Object*/

    $apart6 = new ApartmentV2();

    /* Set Values*/

    $apart6->setAptName("Water St.");
    $apart6->setLocation("Ellensburg");
    $apart6->setLeaseTerm(2);
    $apart6->setPrice(575.00);
    $apart6->setNumBedrooms(4);
    $apart6->setPets("Yes");



    /* Get Values*/

    $apartmentName6 = $apart6->getAptName();
    $location6 = $apart6->getLocation();
    $leaseTerm6 = $apart6->getLeaseTerm();
    $price6 = $apart6->getPrice();
    $bedrooms6 = $apart6->getNumBedrooms();
    $pets6 = $apart6->getPets();
    $user_id6 = 9;


    /* Create a new Object*/

    $apart7 = new ApartmentV2();

    /* Set Values*/

    $apart7->setAptName("The Groove");
    $apart7->setLocation("Ellensburg");
    $apart7->setLeaseTerm(8);
    $apart7->setPrice(300.00);
    $apart7->setNumBedrooms(2);
    $apart7->setPets("No");


    /* Get Values */

    $apartmentName7 = $apart7->getAptName();
    $location7 = $apart7->getLocation();
    $leaseTerm7 = $apart7->getLeaseTerm();
    $bedrooms7 = $apart7->getNumBedrooms();
    $pets7 = $apart7->getPets();
    $price7 = $apart7->getPrice();
    $user_id7 = 10;

    /* Create a new Object*/

    $apart8 = new ApartmentV2();

    /* Set Values */

    $apart8->setAptName("Timothy Park");
    $apart8->setLocation("Ellensburg");
    $apart8->setLeaseTerm(7);
    $apart8->setPrice(650.00);
    $apart8->setNumBedrooms(4);
    $apart8->setPets("No");



    /* Get Values */

    $apartmentName8 = $apart8->getAptName();
    $location8 = $apart8->getLocation();
    $leaseTerm8 = $apart8->getLeaseTerm();
    $price8 = $apart8->getPrice();
    $pets8 = $apart8->getPets();
    $price8 = $apart8->getPrice();
    $user_id8 = 11;

    $apart_array = array();
    $apart_search = array();

    if (is_array($apart_array)) {
        $apart_array[] = $apart1;
        $apart_array[] = $apart2;
        $apart_array[] = $apart3;
        $apart_array[] = $apart4;
        $apart_array[] = $apart5;
        $apart_array[] = $apart6;
        $apart_array[] = $apart7;
        $apart_array[] = $apart8;
    } else {
//         echo "No data";
    }


//    echo "Test in progress" . "\n";

    $numBedSearch = null;
    $priceSearch = null;
    $petSearch = "Yes";
    $leaseSearch = null;
    $locationSearch = null;



    echo "Size of array is ". sizeof($apart_array) ."<br /> \n";
    foreach ($apart_array as $apart){
        echo "Name: " . $apart->getAptName() . "|Bedrooms: ". $apart->getNumBedrooms() . " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .  " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }

    $refinedSearchPosition = 0;
    for($i = 0; $i < sizeof($apart_array); $i++) {
        $apartWorks = true;

        if($numBedSearch != null){
            if($apart_array[$i]->getNumBedrooms() != $numBedSearch){
                $apartWorks = false;
            }
        }
        if($petSearch != null){
            if($apart_array[$i]->getpets() != $petSearch){
                $apartWorks = false;
            }
        }
        if($priceSearch != null){
            if($apart_array[$i]->getPrice() > $priceSearch){
                $apartWorks = false;
            }
        }
        if($leaseSearch != null){
            if($apart_array[$i]->getLeaseTerm() != $leaseSearch){
                $apartWorks = false;
            }
        }
        if($locationSearch != null){
            if($apart_array[$i]->getLocation() != $locationSearch){
                $apartWorks = false;
            }
        }
        if($apartWorks == true){
            $apart_search[$refinedSearchPosition] = $apart_array[$i];
            $refinedSearchPosition = $refinedSearchPosition + 1;
        }

    }

    echo "Size of array after search "."<br /> \n";
    foreach ($apart_search as $apart){
        echo "Name: " . $apart->getAptName() . "|Bedrooms: ". $apart->getNumBedrooms() . " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .  " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }

    for($i = 0; $i < sizeof($apart_search); $i++){
        for($j = 0; $j < sizeof($apart_search) - 1; $j++){
            if($apart_search[$j]->getPrice() < $apart_search[$j + 1]->getPrice()){
                $apartTemp = $apart_search[$j];
                $apart_search[$j] = $apart_search[$j + 1];
                $apart_search[$j + 1] = $apartTemp;
            }
        }
    }

    echo "Sorted by price from greatest to least"."<br /> \n";
    foreach ($apart_search as $apart){
        echo "Name: " . $apart->getAptName() . "|Bedrooms: ". $apart->getNumBedrooms() . " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .  " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }

    for($i = 0; $i < sizeof($apart_search); $i++){
        for($j = 0; $j < sizeof($apart_search) - 1; $j++){
            if($apart_search[$j]->getPrice() > $apart_search[$j + 1]->getPrice()){
                $apartTemp = $apart_search[$j + 1];
                $apart_search[$j + 1] = $apart_search[$j];
                $apart_search[$j] = $apartTemp;
            }
        }
    }

    echo "Sorted by price from least to greatest" ."<br /> \n";
    foreach ($apart_search as $apart){
        echo "Name: " . $apart->getAptName() . "|Bedrooms: ". $apart->getNumBedrooms() . " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .  " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }

}



try {
    insertApartmentInfo();

} catch (Exception $e) {
    echo $e;
}
