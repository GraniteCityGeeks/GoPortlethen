<?php
/**
 * Created by PhpStorm.
 * User: 1608354
 * Date: 17/10/2016
 * Time: 15:58
 */
$db = new mysqli(
    "localhost",
    "root",
    "Latte",
    "portlethen");
if ($db->connect_errno){
    die('Connectfailed['.$db->connect_error.']');
}


