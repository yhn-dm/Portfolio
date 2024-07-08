<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulaire_fb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choice = $_POST['choice'];

    
    $stmt = $conn->prepare("INSERT INTO feedback (choice) VALUES (?)");
    $stmt->bind_param("s", $choice);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


$result = $conn->query("SELECT choice, COUNT(*) as count FROM feedback GROUP BY choice");
$votes = ['Pouce Vert' => 0, 'Pouce Rouge' => 0];

while ($row = $result->fetch_assoc()) {
    if ($row['choice'] == 'Pouce Vert') {
        $votes['Pouce Vert'] = $row['count'];
    } else if ($row['choice'] == 'Pouce Rouge') {
        $votes['Pouce Rouge'] = $row['count'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
</head>
<body>
    <form action="" method="post">
        <button type="submit" name="choice" value="Pouce Vert">Pouce Vert</button>
        <button type="submit" name="choice" value="Pouce Rouge">Pouce Rouge</button>
    </form>

    <table>
        <tr>
            <th>Pouce Vert</th>
            <th>Pouce Rouge</th>
        </tr>
        <tr>
            <td><?php echo $votes['Pouce Vert']; ?></td>
            <td><?php echo $votes['Pouce Rouge']; ?></td>
        </tr>
    </table>
</body>
</html>