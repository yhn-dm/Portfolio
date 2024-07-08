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
            while ($row = mysqli_fetch_assoc($queryexecute)) {
                ?>
                <table>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                    </tr>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                </table>
                <?php
            }
        }
    } else {
        die(mysqli_error($con));
    }
} else {
    die(mysqli_error($con));
}



?>