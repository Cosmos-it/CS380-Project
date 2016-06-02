<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 5/29/16
 * Time: 4:12 PM
 */


session_id('apt_id');
session_start();
session_destroy();
session_commit();