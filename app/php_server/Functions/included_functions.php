<?php

/* redirect pages */
function redirect_to($new_location)
{
    header("Location: " . trim($new_location));
    exit;
}

/*******************************
 * Takes in raw data
 * Does array fetch and
 * then encode the data to
 * JSON type before returning data
 ***************************************/
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


