<form action="forms.php" method="post">
    <div><input type="text" name="username" placeholder="Enter your name" autocomplete="off"></div>
    <div><input type="email" name="email" placeholder="Enter your email" autocomplete="off"></div>
<br><br>
<button type="submit">Submit</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$username=$_POST['username'];
$email=$_POST['email'];
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='phptutorial';
}

$con=mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if($con){
    $sql="insert into `data` (username, email) values('$username', '$email')";
    $queryexecute=mysqli_query($con,$sql);
    if($queryexecute){
echo "Data inserted successfully";
    }else{
die(mysqli_error($con));
    }
}else{
die(mysqli_error($con));
}
?>