<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/29/16
 * Time: 4:14 PM
 */


if (isset($_GET['user'])) {
    session_start();
    if (isset($_SESSION['user'])) {
        if ($_GET['user'] == $_SESSION['user']) echo $_GET['user'];
    }
}