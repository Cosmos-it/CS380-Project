<?php

/*******************************
 * Takes in raw data
 * Does array fetch and
 * then encode the data to
 * JSON type before returning data
 **************************************
 * @param $data
 * @return string
 */


function convertToJson($data)
{
    global $connection;
    $result = mysqli_fetch_all($connection, $data);
    $json = json_encode($result);

    return $json;
}

function mysql_prep($string)
{
    global $connection;
    $result = mysqli_real_escape_string($connection, $string);
    return $result;
}

/**
 * function from (Includes_PHP) Checks
 * if the connection has not failed.
 * Use returned data (if any)
 *
 * @param $result_set
 */


function confirm_query($result_set)
{
    global $connection;
    if (!$result_set) {
        die("Database query failed." . mysqli_errno($connection));
    }
}

/*
Call this method when a message needs to be encoded or decoded
    once it reaches the user on the other side of the client.
    All incoming and out going messages should be encoded using the
    base64_decode()
*/

function encode_message($stringText)
{
    if (empty($stringText)) {
        return exception();
    } else {
        base64_encode($stringText);
    }
}

function decode_message($stringText)
{
    if (empty($stringText)) {
        return exception();
    } else {
        base64_decode($stringText);
    }
}

/******** Display all data **************/
function displayData()
{
    global $connection;
    $sql = "SELECT * FROM apartment INNER JOIN location ON apartment.apt_id = location.apt_id INNER JOIN Studio ON apartment.apt_id = Studio._id   INNER JOIN OneBedroom ON apartment.apt_id = OneBedroom._id INNER JOIN TwoBedroom ON apartment.apt_id = TwoBedroom._id INNER JOIN ThreeBedroom ON apartment.apt_id = ThreeBedroom._id";

    //Performing mysql query
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die("Database query failed");
    }

    //New data converted into array
    $array_data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $array_data[] = $row;
    }
    return $array_data;

}





