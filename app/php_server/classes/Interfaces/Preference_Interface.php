<?php

/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 3/22/16
 * Time: 9:04 PM
 */
Interface PreferenceInterface
{

    public function setId($id);

    public function getId();

    public function setSmokeStatus($smoking);

    public function getSmokeStatus();

    public function setPartyStatus($partying);

    public function getPartyStatus();

    public function setHygieneStatus($hygiene);

    public function getHygieneStatus();

    public function setDrinkingStatus($drinking);

    public function getDrinkingStatus();

    public function setAbout($about);

    public function getAbout();
}