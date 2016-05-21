<?php

require("Interfaces/ApartmentV2.InterFace.php");
require("Admin.php");
require("Studio.php");
require("OneBedroom.php");
require("TwoBedroom.php");
require("ThreeBedroom.php");


/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 4/12/2016
 * Time: 3:52 PM
 */
class ApartmentV2 implements ApartmentV2_InterFace

{
    private static $instance;
    private $studio;
    private $admin;
    private $oneBedroom;
    private $twoBedroom;
    private $threeBedroom;
    private $numBedrooms;
    private $apt_name;
    private $location;
    private $price;
    private $leaseTerm;
    private $pets;
    private $description;

    /**
     * @return mixed
     */

    public function __construct()
    {
        $this->studio = Studio::createStudio();
        $this->oneBedroom = OneBedroom::createOneBedroom();
        $this->twoBedroom = TwoBedroom::createTwoBedroom();
        $this->threeBedroom = ThreeBedroom::createThreeBedroom();
        $this->admin = Admin::createAdmin();
        $this->description = null;
        $this->numBedrooms = 0;
        $this->apt_name = null;
        $this->location = null;
        $this->price = 0.0;
        $this->leaseTerm = 0;
        $this->pets = null;

    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        if (!is_null($description)) {
            if (is_string($description)) {
                $this->description = $description;
            } else {
                throw new Exception("Apartment name is not of type String: " . $description);
            }
        } else {
            throw new Exception("Apartment name is not found " . $description);
        }    }

    //GetNumBedRooms to be removed later
    public function getNumBedrooms()
    {
        return $this->numBedrooms;
    }
    public function setNumBedrooms($numBedrooms)
    {
        if (!is_null($numBedrooms)) {
            if (is_int($numBedrooms)) {
                $this->numBedrooms = $numBedrooms;
            } else {
                throw new Exception("Data is not of type integer: " . $numBedrooms);
            }
        } else {
            throw new Exception("Type integer not found: ");
        }

    }

    public function getPrice()
    {

        return $this->price;
    }
    public function setPrice($price)
    {

        if (!is_null($price)) {

            if (is_double($price)) {
                $this->price = $price;
            } else {
                throw new Exception("Price is not set as type double: " . $price);
            }
        } else {
            throw new Exception("Price is not found: " . $price);
        }
    }

    public function getLeaseTerm()
    {

        return $this->leaseTerm;
    }
    public function setLeaseTerm($lease)
    {

        if (!is_null($lease)) {
            if (is_int($lease)) {
                $this->leaseTerm = $lease;
            } else {
                throw new Exception("Lease is not of type integer " . $lease);
            }

        } else {
            throw new Exception("Lease is not found: " . $lease);
        }
    }

    public function getAptName()
    {

        return $this->apt_name;
    }
    public function setAptName($apt_name)
    {

        if (!is_null($apt_name)) {
            if (is_string($apt_name)) {
                $this->apt_name = $apt_name;
            } else {
                throw new Exception("Apartment name is not of type String: " . $apt_name);
            }
        } else {
            throw new Exception("Apartment name is not found " . $apt_name);
        }
    }

    public function getAddress()
    {

        return $this->location;
    }
    public function setAddress($location)
    {

        if (!is_null($location)) {
            if (is_string($location)) {
                $this->location = $location;
            } else {
                throw new Exception("Location is not of type String " . $location);
            }
        } else {
            throw new Exception("Location is not found: " . $location);
        }
    }

    public function getPets()
    {
        return $this->pets;
    }
    public function setPets($pets)
    {
        if (!is_null($pets)) {
            if (is_string($pets)) {
                $this->pets = $pets;
            } else {
                throw new Exception("Pets is not of type String " . $pets);
            }
        } else {
            throw new Exception("Pets is not found: " . $pets);
        }
    }

    public function getStudio()
    {
        return $this->studio;
    }
    public function getOneBedroom()
    {
        return $this->oneBedroom;
    }
    public function getTwoBedroom()
    {
        return $this->twoBedroom;
    }
    public function getThreeBedroom()
    {
        return $this->threeBedroom;
    }
    public function getAdmin()
    {
        return $this->admin;
    }
    
    public static function CreateApartment()
    {
        if (!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;

    }

}