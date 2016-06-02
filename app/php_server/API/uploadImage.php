<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/24/16
 * Time: 1:02 PM
 */


/******************* IMPORT FILES ***********************/
require_once("../Auto-Load.php");
require_once("../classes/ApartmentV2.php");
require_once("../classes/Admin.php");
require_once("../Functions/included_functions.php");
/************* Database connections *********************/

$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));


//Finished
function studioImageUpload($connection)
{
    $session_id = $_GET['id'];
    $price = $_GET['price'];
    $check = $_GET['check'];

    if (isset($_FILES['studio'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['studio']['name'];
        $file_size = $_FILES['studio']['size'];
        $file_tmp = $_FILES['studio']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "image extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size cannot exceed 2 MB';
        }
        if (empty($errors) == true) {
            $path = 'ImageUpload/' . $file_name;
            move_uploaded_file($file_tmp, $path);

            $path = mysql_prep($path);

            $sql = "INSERT INTO Studio (available, price, image, APT_ID) " .
                "VALUES ('{$check}', '{$price}', '{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                echo "Success";
                echo $session_id;

            } else {
                echo $session_id;
            }

        } else {
            print_r($errors);
        }
    }

}

//Finished
function oneBedImageUpload($connection)
{
    $session_id = $_GET['id'];
    $price = $_GET['price'];
    $check = $_GET['check'];

    if (isset($_FILES['oneImage'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['oneImage']['name'];
        $file_size = $_FILES['oneImage']['size'];
        $file_tmp = $_FILES['oneImage']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "image extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size cannot exceed 2 MB';
        }
        if (empty($errors) == true) {
            $path = 'ImageUpload/' . $file_name;
            move_uploaded_file($file_tmp, $path);

            $path = mysql_prep($path);

            $sql = "INSERT INTO OneBedroom (available, price, image, APT_ID) " .
                "VALUES ('{$check}', '{$price}', '{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                echo "Success";
                echo $session_id;

            } else {
                echo $session_id;
            }

        } else {
            print_r($errors);
        }
    }
}

//Finished
function twoImageUpload($connection)
{
    $session_id = $_GET['id'];
    $price = $_GET['price'];
    $check = $_GET['check'];

    if (isset($_FILES['twoImage'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['twoImage']['name'];
        $file_size = $_FILES['twoImage']['size'];
        $file_tmp = $_FILES['twoImage']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "image extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size cannot exceed 2 MB';
        }
        if (empty($errors) == true) {
            $path = 'ImageUpload/' . $file_name;
            move_uploaded_file($file_tmp, $path);

            $path = mysql_prep($path);

            $sql = "INSERT INTO TwoBedroom (available, price, image, APT_ID) " .
                "VALUES ('{$check}', '{$price}', '{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                echo "Success";
                echo $session_id;

            } else {
                echo $session_id;
            }

        } else {
            print_r($errors);
        }
    }
}

//finished
function threeImageUpload($connection)
{
    $session_id = $_GET['id'];
    $price = $_GET['price'];
    $check = $_GET['check'];

    if (isset($_FILES['threeImage'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['threeImage']['name'];
        $file_size = $_FILES['threeImage']['size'];
        $file_tmp = $_FILES['threeImage']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "image extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size cannot exceed 2 MB';
        }
        if (empty($errors) == true) {
            $path = 'ImageUpload/' . $file_name;
            move_uploaded_file($file_tmp, $path);

            $path = mysql_prep($path);

            $sql = "INSERT INTO ThreeBedroom (available, price, image, APT_ID) " .
                "VALUES ('{$check}', '{$price}', '{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                echo "Success";
                echo $session_id;

            } else {
                echo $session_id;
            }

        } else {
            print_r($errors);
        }
    }
}

//Finished
function profileImage($connection)
{

    $session_id = $_GET['id'];

    if (isset($_FILES['file'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        //$file_type = $_FILES['file']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "image extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size cannot exceed 2 MB';
        }
        if (empty($errors) == true) {
            $path = 'ImageUpload/' . $file_name;
            move_uploaded_file($file_tmp, $path);

            $sql = "UPDATE apartment SET profileImage='{$path}' WHERE apt_id='{$session_id}'";
            $result = mysqli_query($connection, $sql);
            confirm_query($result);

            echo $session_id;

        } else {
            print_r($errors);
        }
    }
}


try {
    if ($image = $_FILES['file']) {
        profileImage($connection);
    } elseif ($image = $_FILES['studio']) {
        studioImageUpload($connection);
    } elseif ($image = $_FILES['oneImage']) {
        oneBedImageUpload($connection);
    } elseif ($image = $_FILES['twoImage']) {
        twoImageUpload($connection);
    } elseif ($image = $_FILES['threeImage']) {
        threeImageUpload($connection);
    } else {
        echo "Not allowed here";
    }

} catch (Exception $e) {
    echo $e;
}