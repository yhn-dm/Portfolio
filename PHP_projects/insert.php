<!-- inserting data -->
<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='phptutorial';

$con=mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if($con){
    $sql="insert into `data`(username, email)values ('user', 'mail@gmail.com')";
    $queryexecute=mysqli_query($con,$sql);
    if( $queryexecute){
echo "Data inserted successfully";
    }else{
die(mysqli_error($con));
    }
}else{
die(mysqli_error($con));
}
?>