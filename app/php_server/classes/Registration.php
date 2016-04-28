<?php

/************************
 * Created by PhpStorm.
 * User: Taban
 * Date: 8/21/15
 * Time: 1:55 PM
 ****************************/

require("Interfaces/Registration.Interface.php");

class Registration implements Registration_Interface
{

    private $user_id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $roomStatus;

    public function __constructor()
    {
        $this->user_id = null;
        $this->firstName = " ";
        $this->lastName = " ";
        $this->email = " ";
        $this->password = " ";
        $this->roomStatus = 0;
    }

    public function setId($id)
    {
        if (is_int($id) && is_null($id)) {
            $this->user_id = $id;
        } else {
            throw new Exception("Type int expected and Null found: " . $id);
        }
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getFirstName()
    {

        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        if (is_string($firstName) && !($firstName == "")) {
            $this->firstName = $firstName;
        } else {
            throw new Exception("Type string expected and Null, found: " . $firstName);
        }
    }

    public function getLastName()
    {

        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        if (is_string($lastName) && !($lastName == "")) {
            $this->lastName = $lastName;
        } else {
            throw new Exception("Type string expected and not null, found:  " . $lastName);
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        /**===============================================
         * Valid the email to make sure that it is a valid
         *
         *================================================
         **/


        if (is_string($email) && !($email == "")) {
            $this->email = $email;
        } else {
            throw new Exception("Type string expected and not null, found:  " . $email);
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {

        /**==========================================================
         * Password must be encrypted before app release using MD5
         *=========================================================*/
        if (is_string($password) && !($password == "")) {
            $this->password = $password;
        } else {
            throw new Exception("Type string expected and not null, found:  " . $password);
        }
    }

    public function getRoomStatus()
    {
        return $this->roomStatus;
    }

    public function setRoomStatus($roomStatus)
    {
        /**================================================
         * Verify if user is a room owner
         * 1 = room owner
         * 0 = not room owner
         *================================================
         */
        if (is_int($roomStatus) && !($roomStatus == "")) {

            switch ($roomStatus) {
                case 1:
                    $this->roomStatus = $roomStatus;
                    break;
                default :
                    //If the user does not pick anything, the value for user
                    //room status will be assigned to 0 automatically.
                    //The user can always go back and correct this part for now.
                    $this->roomStatus = 0;
            }

        } else {
            throw new Exception("Type int expected and not null, found:  " . $roomStatus);
        }
    }

    public function getUsername()
    {
        return $this->firstName . " " . $this->lastName;
    }
}