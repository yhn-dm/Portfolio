<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='phptutorial';
$con=mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if($con){
    $sql="update `data` set `username`='user1' where `username`='user'";
    $queryexecute=mysqli_query($con,$sql);
    if( $queryexecute){
echo "Data updated successfully";
    }else{
die(mysqli_error($con));
    }
}else{
die(mysqli_error($con));
}





?>