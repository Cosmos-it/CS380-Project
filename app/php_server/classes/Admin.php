<?php

/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/20/16
 * Time: 5:21 PM
 */
class Admin
{
    private static $instance;
    private $username;
    private $password;
    private $_id;

    /**
     * Admin constructor.
     * @param $_id
     * @param $password
     * @param $username
     */
    public function __construct()
    {
        $this->_id = 0;
        $this->password = "";
        $this->username = "";
    }

    public static function createAdmin()
    {
        if (!self::$instance) { // If no instance then make one
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    
}