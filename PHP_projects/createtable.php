<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='phptutorial';

$con=mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
if($con){
    $sql="CREATE TABLE `data`(`id` INT(100) NOT NULL AUTO_INCREMENT, `username` VARCHAR(100) NOT NULL, `email`VARCHAR(100) NOT NULL,PRIMARY KEY(`id`))";
    $queryexecute=mysqli_query($con,$sql);
    if($queryexecute){
        echo "Table successfuly created";
    }else{
        die(mysqli_error($con));
    }
} else {
    die(mysqli_error($con));
}
?>