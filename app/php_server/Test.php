<?php

/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/11/16
 * Time: 10:26 PM
 */


require_once 'classes/ApartmentV2.php';
require_once 'classes/Studio.php';
require_once 'classes/OneBedroom.php';
require_once 'classes/TwoBedroom.php';
require_once 'classes/ThreeBedroom.php';


class Test extends PHPUnit_Framework_TestCase
{
    private $ApartmentObject;
    private $Admin;
    private $studio;
    private $oneBedroom;
    private $twoBedroom;
    private $threeBedroom;

    
    public function testApartment()
    {
        
        //Apartment
        $this->ApartmentObject = ApartmentV2::CreateApartment();
        $this->ApartmentObject->setAptName("Test");
        $this->ApartmentObject->setLeaseTerm(12);
        $this->ApartmentObject->setNumBedrooms(2);
        $this->ApartmentObject->setAddress("Ellensburg");
        $this->ApartmentObject->setPets("yes");
        $this->ApartmentObject->setPrice(800.00);
        
        /* TESTS */
        $this->assertEquals("Test", $this->ApartmentObject->getAptName());
        $this->assertEquals(12, $this->ApartmentObject->getLeaseTerm());
        $this->assertEquals("Ellensburg", $this->ApartmentObject->getAddress());
        $this->assertEquals(2, $this->ApartmentObject->getNumBedrooms());
        $this->assertEquals("yes", $this->ApartmentObject->getPets());
        $this->assertEquals(800.00, $this->ApartmentObject->getPrice());
    }

    public function testAdmin()
    {
        $this->Admin = ApartmentV2::CreateApartment()->getAdmin();
        $this->Admin->setId(1);
        $this->Admin->setEmail("Thegrove");
        $this->Admin->setPassword("admin");

        //Tests
        $this->assertEquals(1, $this->Admin->getId());
        $this->assertEquals("Thegrove", $this->Admin->getEmail());
        $this->assertEquals("admin", $this->Admin->getPassword());


    }
    
    public function testStudioTest()
    {
        //Studio
        $this->studio = Studio::createStudio();
        $this->studio->setAvailable(true);
        $this->studio->setPrice(700.00);
        $this->studio->setImage("image/studio.jpg");

        //Test
        $this->assertEquals(true, $this->studio->getAvailable());
        $this->assertEquals(700.00, $this->studio->getPrice());
        $this->assertEquals("image/studio.jpg", $this->studio->getImage());

    }


    public function testOneBedroom()
    {
        //One bedroom
        $this->oneBedroom = OneBedroom::createOneBedroom();
        $this->oneBedroom->setAvailable(true);
        $this->oneBedroom->setPrice(700.00);
        $this->oneBedroom->setImage("image/onebedroom.jpg");

        //Test
        $this->assertEquals(true, $this->oneBedroom->getAvailable());
        $this->assertEquals(700.00, $this->oneBedroom->getPrice());
        $this->assertEquals("image/onebedroom.jpg", $this->oneBedroom->getImage());
    }

    public function testTwoBedroom()
    {
        //Two bedroom
        $this->twoBedroom = TwoBedroom::createTwoBedroom();
        $this->twoBedroom->setAvailable(true);
        $this->twoBedroom->setPrice(700.00);
        $this->twoBedroom->setImage("image/twobedroon.jpg");

        //Test
        $this->assertEquals(true, $this->twoBedroom->getAvailable());
        $this->assertEquals(700.00, $this->twoBedroom->getPrice());
        $this->assertEquals("image/twobedroon.jpg", $this->twoBedroom->getImage());
    }


    public function testThreeBedroom()
    {
        //Three bedroom
        $this->threeBedroom = ThreeBedroom::createThreeBedroom();
        $this->threeBedroom->setAvailable(true);
        $this->threeBedroom->setPrice(700.00);
        $this->threeBedroom->setImage("image/threebedroom.jpg");

        //Test
        $this->assertEquals(true, $this->threeBedroom->getAvailable());
        $this->assertEquals(700.00, $this->threeBedroom->getPrice());
        $this->assertEquals("image/threebedroom.jpg", $this->threeBedroom->getImage());
    }



}
