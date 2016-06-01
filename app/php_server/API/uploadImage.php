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

try {
    if ($image = $_FILES['file']) {
        profileImage($connection);
    } elseif ($image = $_FILES['fstudio']) {
        studioImageUpload($connection);
    } elseif ($image = $_FILES['oneBed']) {
        oneBedImageUpload($connection);
    } elseif ($image = $_FILES['twoBed']) {
        twoImageUpload($connection);
    } elseif ($image = $_FILES['threeBed']) {
        threeImageUpload($connection);
    } else {
        echo "<div style='color:red;'><h1 style='text-align: center; margin-top: 50px;'>STOP IT!<br>
              <span style='font-size: 70px;'>&#x1f620;</span><br>You have no permission.</h1></div>";
    }


} catch (Exception $e) {
    
}


function studioImageUpload($connection)
{
    $session_id = $_GET['id'];

    if (isset($_FILES['fstudio'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['fstudio']['name'];
        $file_size = $_FILES['fstudio']['size'];
        $file_tmp = $_FILES['fstudio']['tmp_name'];
        //$file_type = $_FILES['fstudio']['type'];
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

            $sql = "INSERT INTO Studio (image, Apt_id) VALUES ('{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);
            confirm_query($result);

            $displayImages = "SELECT image FROM Studio WHERE image= '$path' ";
            $displayImages .= "LIMIT 1";
            $result1 = mysqli_query($connection, $displayImages);

            while ($row = mysqli_fetch_array($result1)) {
                $image = $row;
                echo $image[0];
            }

        } else {
            print_r($errors);
        }
    }
}


function oneBedImageUpload($connection)
{
    $session_id = $_GET['id'];

    if (isset($_FILES['oneBed'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['oneBed']['name'];
        $file_size = $_FILES['oneBed']['size'];
        $file_tmp = $_FILES['oneBed']['tmp_name'];
        //$file_type = $_FILES['oneBed']['type'];
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

            $sql = "INSERT INTO OneBedroom (image, Apt_id) VALUES ('{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);
            confirm_query($result);

            $displayImages = "SELECT image FROM Studio WHERE image= '$path' ";
            $displayImages .= "LIMIT 1";
            $result1 = mysqli_query($connection, $displayImages);

            while ($row = mysqli_fetch_array($result1)) {
                $image = $row;
                echo $image[0];
            }

        } else {
            print_r($errors);
        }
    }
}


function twoImageUpload($connection)
{
    $session_id = $_GET['id'];

    if (isset($_FILES['twoBed'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['twoBed']['name'];
        $file_size = $_FILES['twoBed']['size'];
        $file_tmp = $_FILES['twoBed']['tmp_name'];
        //$file_type = $_FILES['twoBed']['type'];
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

            $sql = "INSERT INTO TwoBedroom (image, Apt_id) VALUES ('{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);
            confirm_query($result);

            $displayImages = "SELECT image FROM Studio WHERE image= '$path' ";
            $displayImages .= "LIMIT 1";
            $result1 = mysqli_query($connection, $displayImages);

            while ($row = mysqli_fetch_array($result1)) {
                $image = $row;
                echo $image[0];
            }

        } else {
            print_r($errors);
        }
    }
}


function threeImageUpload($connection)
{
    $session_id = $_GET['id'];

    if (isset($_FILES['threeBed'])) {
        //The error validation could be done on the javascript client side.
        $errors = array();
        $file_name = $_FILES['threeBed']['name'];
        $file_size = $_FILES['threeBed']['size'];
        $file_tmp = $_FILES['threeBed']['tmp_name'];
        //$file_type = $_FILES['threeBed']['type'];
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

            $sql = "INSERT INTO ThreeBedroom (image, Apt_id) VALUES ('{$path}', '{$session_id}')";
            $result = mysqli_query($connection, $sql);
            confirm_query($result);

            $displayImages = "SELECT image FROM Studio WHERE image= '$path' ";
            $displayImages .= "LIMIT 1";
            $result1 = mysqli_query($connection, $displayImages);

            while ($row = mysqli_fetch_array($result1)) {
                $image = $row;
                echo $image[0];
            }

        } else {
            print_r($errors);
        }
    }
}


/**
 * @param $connection
 */
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

        } else {
            print_r($errors);
        }
    }
}


