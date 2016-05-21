<?php

/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/19/16
 * Time: 9:43 AM
 */

require_once('Interfaces/RoomTypeInterFace.php');

class OneBedroom implements RoomTypeInterFace
{
    private $price;
    private $image;
    private $available;
    private static $instance;

    public function __construct()
    {
        $this->price = 0.0;
        $this->image = null;
        $this->available = false;
    }
    public static function createOneBedroom()
    {
        if (!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
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

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getAvailable()
    {
        return $this->available;
    }
    public function setAvailable($available)
    {
        if (!is_null($available)) {
            if (is_bool($available)) {
                $this->available = $available;
            }
        } else {
            throw new Exception("Type error found: " . $available);
        }
    }

}
