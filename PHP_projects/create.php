<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';

$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD);
if ($con) {
    //echo 'Connection successfull';
    $sql="create database `phptutorial`";
    $queryexecute=mysqli_query($con,$sql);
    if($queryexecute){
        echo "Sucessfully database created";
    } else{
        die(mysqli_error($con));
    }
} else {
    die(mysqli_error($con));
}


?>