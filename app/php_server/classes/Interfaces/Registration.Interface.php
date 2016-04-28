<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 9/23/15
 * Time: 9:00 PM
 */

/************************
 * Created by PhpStorm.
 * User: Taban
 * Date: 8/21/15
 * Time: 1:55 PM
 ****************************/
interface Registration_Interface
{

    public function setId($id);

    public function getId();

    public function getUsername();

    public function setFirstName($firstName);

    public function getFirstName();

    public function setLastName($lastName);

    public function getLastName();

    public function setEmail($email);

    public function getEmail();

    public function setPassword($password);

    public function getPassword();

    public function setRoomStatus($roomStatus);

    public function getRoomStatus();
}