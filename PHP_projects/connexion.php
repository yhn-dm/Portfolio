<?php
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
$mysqli=new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);
if ($mysqli) {
    echo 'Connection successfull';
} else {
    die(mysqli_error($mysqli));
}