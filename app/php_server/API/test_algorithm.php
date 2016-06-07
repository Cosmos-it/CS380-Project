<?php
/**********************
 * Created by Nico and Dillon.
 * User: Taban
 * Date: 9/21/15
 * Time: 9:03 PM
 ****************************/


/******************* IMPORT FILES ************************/
require_once("../Auto-Load.php");
require_once("../classes/ApartmentV2.php");
require_once("../Functions/included_functions.php");

/************* Database connections ******************/
/* Database accessible from the Heroku cloud */
//$herokuDB = Database::getInstance();
//$herokuDB_Connection = $herokuDB->getConnection();

$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
//$data = json_decode(file_get_contents("php://input"));


sortDataWhenDisplaying();

function sortDataWhenDisplaying()
{
    //Create an object
    $apart1 = new ApartmentV2();
    $apart1->setAptName("The Groove");
    $apart1->setAddress("Ellensburg");
    $apart1->setLeaseTerm(3);
    $apart1->setPrice(850.00);
    $apart1->setNumBedrooms(2);
    $apart1->setPets("Yes");

    //Create another object
    $apart2 = new ApartmentV2();
    $apart2->setAptName("Juniper Ave.");
    $apart2->setAddress("Ellensburg");
    $apart2->setLeaseTerm(2);
    $apart2->setPrice(925.00);
    $apart2->setNumBedrooms(3);
    $apart2->setPets("Yes");

    //Create another object
    $apart3 = new ApartmentV2();
    $apart3->setAptName("Water St.");
    $apart3->setAddress("Ellensburg");
    $apart3->setLeaseTerm(4);
    $apart3->setPrice(550.00);
    $apart3->setNumBedrooms(2);
    $apart3->setPets("Yes");

    /* Create another object*/
    $apart4 = new ApartmentV2();
    $apart4->setAptName("Timothy Park");
    $apart4->setAddress("Ellesnburg");
    $apart4->setLeaseTerm(5);
    $apart4->setPrice(725.00);
    $apart4->setNumBedrooms(4);
    $apart4->setPets("Yes");
    
    /* Create another object*/
    $apart5 = new ApartmentV2();
    $apart5->setAptName("The Groove");
    $apart5->setAddress("Ellensburg");
    $apart5->setLeaseTerm(2);
    $apart5->setPrice(320.00);
    $apart5->setNumBedrooms(3);
    $apart5->setPets("No");
    
    /* Create a new Object*/
    $apart6 = new ApartmentV2();
    
    /* Set Values*/
    $apart6->setAptName("Water St.");
    $apart6->setAddress("Ellensburg");
    $apart6->setLeaseTerm(2);
    $apart6->setPrice(575.00);
    $apart6->setNumBedrooms(4);
    $apart6->setPets("Yes");
    
    /* Create a new Object*/
    $apart7 = new ApartmentV2();
    
    /* Set Values*/
    
    $apart7->setAptName("The Groove");
    $apart7->setAddress("Ellensburg");
    $apart7->setLeaseTerm(8);
    $apart7->setPrice(300.00);
    $apart7->setNumBedrooms(2);
    $apart7->setPets("No");
    
    
    /* Get Values */
    
    /* Create a new Object*/
    
    $apart8 = new ApartmentV2();
    
    /* Set Values */
    
    $apart8->setAptName("Timothy Park");
    $apart8->setAddress("Ellensburg");
    $apart8->setLeaseTerm(7);
    $apart8->setPrice(650.00);
    $apart8->setNumBedrooms(4);
    $apart8->setPets("No");
    
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
        return;
    }

    $numBedSearch = null;
    $priceSearch = null;
    $petSearch = "Yes";
    $leaseSearch = null;
    $locationSearch = null;

    echo "Size of array is " . sizeof($apart_array) . "<br /> \n";
    foreach ($apart_array as $apart) {
        echo "Name: " . $apart->getAptName() . "|Bedrooms: " . $apart->getNumBedrooms() .
            " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .
            " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }
    
    $refinedSearchPosition = 0;
    for ($i = 0; $i < sizeof($apart_array); $i++) {
        $apartWorks = true;
        
        if ($numBedSearch != null) {
            if ($apart_array[$i]->getNumBedrooms() != $numBedSearch) {
                $apartWorks = false;
            }
        }
        if ($petSearch != null) {
            if ($apart_array[$i]->getpets() != $petSearch) {
                $apartWorks = false;
            }
        }
        if ($priceSearch != null) {
            if ($apart_array[$i]->getPrice() > $priceSearch) {
                $apartWorks = false;
            }
        }
        if ($leaseSearch != null) {
            if ($apart_array[$i]->getLeaseTerm() != $leaseSearch) {
                $apartWorks = false;
            }
        }
        if ($locationSearch != null) {
            if ($apart_array[$i]->getLocation() != $locationSearch) {
                $apartWorks = false;
            }
        }
        if ($apartWorks == true) {
            $apart_search[$refinedSearchPosition] = $apart_array[$i];
            $refinedSearchPosition = $refinedSearchPosition + 1;
        }
        
    }
    
    echo "Size of array after search " . "<br /> \n";
    foreach ($apart_search as $apart) {
        echo "Name: " . $apart->getAptName() . "|Bedrooms: " . $apart->getNumBedrooms() .
            " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .
            " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }
    
    for ($i = 0; $i < sizeof($apart_search); $i++) {
        for ($j = 0; $j < sizeof($apart_search) - 1; $j++) {
            if ($apart_search[$j]->getPrice() < $apart_search[$j + 1]->getPrice()) {
                $apartTemp = $apart_search[$j];
                $apart_search[$j] = $apart_search[$j + 1];
                $apart_search[$j + 1] = $apartTemp;
            }
        }
    }
    
    echo "Sorted by price from greatest to least" . "<br /> \n";
    foreach ($apart_search as $apart) {
        echo "Name: " . $apart->getAptName() . "|Bedrooms: " . $apart->getNumBedrooms() .
            " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .
            " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }
    
    for ($i = 0; $i < sizeof($apart_search); $i++) {
        for ($j = 0; $j < sizeof($apart_search) - 1; $j++) {
            if ($apart_search[$j]->getPrice() > $apart_search[$j + 1]->getPrice()) {
                $apartTemp = $apart_search[$j + 1];
                $apart_search[$j + 1] = $apart_search[$j];
                $apart_search[$j] = $apartTemp;
            }
        }
    }
    
    echo "Sorted by price from least to greatest" . "<br /> \n";
    foreach ($apart_search as $apart) {
        echo "Name: " . $apart->getAptName() . "|Bedrooms: " . $apart->getNumBedrooms() .
            " |Price: " . $apart->getPrice() . " |Lease term: " . $apart->getLeaseTerm() .
            " |Pets: " . $apart->getPets() . " |Location: " . $apart->getLocation() . "<br /> \n";
    }
    
}
