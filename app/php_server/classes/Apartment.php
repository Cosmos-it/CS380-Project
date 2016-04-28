<?php

/**********************
 * Created by PhpStorm.
 * User: Taban
 * Date: 8/22/15
 * Time: 3:07 AM
 ***********************/

require("Interfaces/Apartment.InterFace.php");

class Apartment implements Apartment_InterFace
{

    private $apt_name;
    private $location;
    private $price;
    private $leaseTerm;
    private $image;


    public function __construct()
    {

        $this->apt_name = null;
        $this->location = null;
        $this->price = 0.0;
        $this->leaseTerm = 0;
    }

    public function getPrice()
    {

        return $this->price;
    }

    public function setPrice($price)
    {

        if (is_double($price) && !is_null($price)) {
            $this->price = $price;
        } else {
            throw new Exception("Type double expected and not null, found: " . $price);
        }
    }

    public function getImage()
    {

        return $this->image;
    }

    /**Check this implement later during image upload.
     *================================================
     * Image declaration is not used yet.
     *
     */


    public function setImage($image)
    {

        if (is_string($image) && !is_null($image)) {
            $this->image = $image;
        } else {
            throw new Exception("Type int expected and not null, found: " . $image);
        }
    }

    public function getLeaseTerm()
    {

        return $this->leaseTerm;
    }

    public function setLeaseTerm($lease)
    {

        if (is_int($lease) && !is_null($lease)) {
            $this->leaseTerm = $lease;
        } else {
            throw new Exception("Type int expected and not null, found: " . $lease);
        }
    }

    public function getAptName()
    {

        return $this->apt_name;
    }

    public function setAptName($apt_name)
    {

        if (is_string($apt_name) && !is_null($apt_name)) {
            $this->apt_name = $apt_name;
        } else {
            throw new Exception("Type string expected and not null, found: " . $apt_name);
        }
    }

    public function getLocation()
    {

        return $this->location;
    }

    public function setLocation($location)
    {

        if (!is_null($location) && is_string($location)) {
            $this->location = $location;
        } else {
            throw new Exception("Type location expected and not null, found: " . $location);
        }
    }
}


