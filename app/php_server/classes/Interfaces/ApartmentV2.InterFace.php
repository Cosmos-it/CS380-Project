<?php

/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 4/12/2016
 * Time: 4:01 PM
 */
interface ApartmentV2_InterFace
{
    public function setPrice($price);

    public function getPrice();

    public function setLeaseTerm($lease);

    public function getLeaseTerm();

    public function setAptName($apt_name);

    public function getAptName();

    public function setAddress($location);

    public function getAddress();

    public function setPets($pets);

    public function getPets();
    
}