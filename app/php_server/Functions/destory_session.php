<?php
/**
 * Created by Taban Cosmos.
 * User: Taban
 * Date: 2/24/16
 * Time: 9:17 AM
 */


session_id('uid');
session_start();
session_destroy();
session_commit();

