<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/20/16
 * Time: 5:41 PM
 */

/******************* IMPORT FILES ************************/
require_once("../Auto-Load.php");
require_once("../classes/ApartmentV2.php");
require_once("../Functions/included_functions.php");

/************* Database connections ******************/
$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

/************** Data from the front-end ******************/
//$data = json_decode(file_get_contents("php://input"));