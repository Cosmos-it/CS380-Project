<?php

/*************************
 * Created by PhpStorm.
 * User: Taban
 * Date: 8/22/15
 * Time: 2:58 AM
 * This class contains individual user preferences.
 *
 *****************************************************/
require("Interfaces/Preference_Interface.php");

class userPreference implements PreferenceInterface
{

    private $id;
    private $smoking;
    private $partying;
    private $hygiene;
    private $drinking;
    private $about;

    public function __construct()
    {

        $this->id = null;
        $this->smoking = null;
        $this->partying = null;
        $this->hygiene = null;
        $this->drinking = null;
        $this->about = null;
    }

    public function getId()
    {

        return $this->id;
    }

    public function setId($id)
    {

        if (is_int($id) && !is_null($id)) {
            $this->id = $id;
        } else {
            throw new Exception("Type int expected and not nul, found: " . $id);
        }
    }

    public function setSmokeStatus($smoking)
    {

        if (is_int($smoking) && !is_null($smoking)) {
            $this->smoking = $smoking;
        } else {
            throw new Exception("Type int expected and not null, found: " . $smoking);
        }

    }

    public function getSmokeStatus()
    {

        return $this->smoking;
    }

    public function setPartyStatus($partying)
    {

        if (is_int($partying) && !is_null($partying)) {
            $this->partying = $partying;
        } else {
            throw new Exception("Type int expected and not null, found: " . $partying);
        }
    }

    public function getPartyStatus()
    {

        return $this->partying;
    }

    public function setHygieneStatus($hygiene)
    {

        if (is_int($hygiene) && !is_null($hygiene)) {
            $this->hygiene = $hygiene;
        } else {
            throw new Exception("Type int expected and not null, found: " . $hygiene);
        }
    }

    public function getHygieneStatus()
    {

        return $this->hygiene;
    }

    public function setDrinkingStatus($drinking)
    {

        if (is_int($drinking) && !is_null($drinking)) {
            $this->drinking = $drinking;
        } else {
            throw new Exception("Type int expected and not null, found: " . $drinking);
        }
    }

    public function getDrinkingStatus()
    {
        return $this->drinking;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function setAbout($about)
    {
        if (is_string($about) && !is_null($about)) {
            $this->about = $about;
        } else {
            throw new Exception("Type string expected and not null, found: " . $about);
        }
    }

}

