<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'phptutorial';
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if ($con) {
    $sql = "select * from `data` ";
    $queryexecute = mysqli_query($con, $sql);
    if ($queryexecute) {
        $numRows = mysqli_num_rows($queryexecute);
        if ($numRows > 0) {
            $row = mysqli_fetch_assoc($queryexecute);
            echo $row['id']."." .$row['username']."and" .$row['email'];
            echo "<br>";
            $row = mysqli_fetch_assoc($queryexecute);
            echo $row['id']."." .$row['username']."and" .$row['email'];
            echo "<br>";
            $row = mysqli_fetch_assoc($queryexecute);
            echo $row['id']."." .$row['username']."and" .$row['email'];
            echo "<br>";
            $row = mysqli_fetch_assoc($queryexecute);
            echo $row['id']."." .$row['username']."and" .$row['email'];
            echo "<br>";
            $row = mysqli_fetch_assoc($queryexecute);
            echo $row['id']."." .$row['username']."and" .$row['email'];
            echo "<br>";
        }
    } else {
        die(mysqli_error($con));
    }
} else {
    die(mysqli_error($con));
}



?>