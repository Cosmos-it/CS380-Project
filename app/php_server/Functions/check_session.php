<?php


/**
 * ================
 * User login sessions
 *
 */
if (isset($_SESSION['uid'])) {
    echo($_SESSION['uid']);
}
