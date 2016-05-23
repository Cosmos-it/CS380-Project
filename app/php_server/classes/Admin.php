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
    private $email;
    private $password;
    private $_id;
    
    public function __construct()
    {
        $this->_id = 0;
        $this->password = "";
        $this->email = "";
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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getEmail()
    {
        return $this->email;
    }

    
}