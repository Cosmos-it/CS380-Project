<?php
/******************* IMPORT FILES ***********************/
require_once("../Auto-Load.php");
require_once("../classes/ApartmentV2.php");
require_once("../classes/Admin.php");
require_once("../Functions/included_functions.php");
/************* Database connections *********************/

$database = LocalDatabase::getInstance();
$connection = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

studioImageUpload($connection);

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

function descriptionUpdate($data, $connection) //Update description
{
    $current_user_id = $_GET['id'];
    $description = $data->description;

    $sql = "UPDATE apartment SET description='{$description}' WHERE apt_id ='{$current_user_id}'";

    mysqli_query($connection, $sql);


    $connection = null;//Close connection

}//E O F