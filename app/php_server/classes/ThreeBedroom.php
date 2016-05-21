<?php

/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/19/16
 * Time: 9:43 AM
 */

require_once('Interfaces/RoomTypeInterFace.php');

class ThreeBedroom implements RoomTypeInterFace
{
    private $price;
    private $image;
    private $available;
    private static $instance;

    /**
     * RoomType constructor.
     */
    public function __construct()
    {
        $this->price = 0.0;
        $this->image = null;
        $this->available = false;
    }

    /**
     * @return mixed
     */
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

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * The value passed here will be an image string
     * @param $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * The value has to be true or false
     * @return mixed
     */
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

    public static function createThreeBedroom()
    {
        if (!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
    }
}