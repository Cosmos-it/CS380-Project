<?php

/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 9/23/15
 * Time: 8:57 PM
 */
interface Apartment_InterFace
{

    public function setImage($image);

    public function getImage();

    public function setPrice($price);

    public function getPrice();

    public function setLeaseTerm($lease);

    public function getLeaseTerm();

    public function setAptName($apt_name);

    public function getAptName();

    public function setLocation($location);

    public function getLocation();
}