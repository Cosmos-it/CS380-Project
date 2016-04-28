<?php

/*
/****************************
 * Created by Taban Cosmos.
 * User: Taban
 * Date: 8/21/15
 * Time: 5:44 PM
 *********************************/

class LocalDatabase
{
    /* Database field definition */
    private static $_instance; //The single instance
    private $_connection;
    private $DB_USER;
    private $DB_PASS;
    private $DB_SERVER;
    private $DB_NAME;
    private $last_query;

    /* Initiate the database connection */
    private function __construct()
    {
        $this->DB_SERVER = "localhost";
        $this->DB_USER = "roomly_space";
        $this->DB_PASS = "roomly_space";
        $this->DB_NAME = "roomly_space";

        $this->_connection = new mysqli($this->DB_SERVER,
            $this->DB_USER,
            $this->DB_PASS,
            $this->DB_NAME);
        /* Test if connection succeeded */
        if (mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
            );
        }
    }

    /*******************************
     * Get an instance of the database
     * @return instance
     *
     *****************************************/
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getConnection()
    {
        return $this->_connection;
    }

    /* Return a connection */

    public function closeDBConnection()
    {
        if (isset($this->_connection)) {
            mysqli_close($this->_connection);
            unset($this->_connection);
        }
    }

    /* close database connection*/

    public function insert_id()
    {
        //get the last id inserted over the current db
        return mysqli_insert_id($this->_connection);
    }

    /* insert by id */

    public function affected_rows()
    {
        return mysqli_affected_rows($this->_connection);
    }

    /* affected rows*/

    public function fetch_array($result)
    {
        return mysqli_fetch_array($result);
    }

    /* fetch array*/

    public function escape_value($string)
    {
        return mysqli_real_escape_string($this->_connection, $string);
    }

    /* Escape characters */

    public function query_db($sql)
    {
        $this->last_query = $sql;
        $result = mysqli_query($this->_connection, $sql);
        $this->confirm_query($result);

        return $result;
    }

    /* Query the database */

    /************************************
     * function from (Includes_PHP) Checks
     * if the connection has not failed.
     * Use returned data (if any)
     * @param $result
     */
    public function confirm_query($result)
    {
        if (!$result) {
            $output = "Database query failed: " . mysqli_error($this->_connection) . "<br /><br />";
            //$output .= "Last SQL query: " . $this->last_query;
            die($output);
        }
    }

    public function convertToJson($data)
    {
        global $connection;
        $result = mysqli_fetch_all($data, $connection);
        $json = json_encode($result);

        return $json;
    }

    /****************************************
     * Magic method clone is empty to prevent duplication of connection
     */
    private function __clone()
    {
    }
}

