<?php

/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 4/12/2016
 * Time: 4:01 PM
 */
interface ApartmentV2_InterFace
{
    public function setUsername($username);

    public function getUsername();

    public function setNumBedrooms($numBedrooms);

    public function getNumBedrooms();

//    public function setImage($image);
//
//    public function getImage();

    public function setPrice($price);

    public function getPrice();

    public function setLeaseTerm($lease);

    public function getLeaseTerm();

    public function setAptName($apt_name);

    public function getAptName();

    public function setLocation($location);

    public function getLocation();

    public function setPets($pets);

    public function getPets();
    
}