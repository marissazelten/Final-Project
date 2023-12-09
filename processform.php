<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php

$servername = "localhost";
$username = "ugttp8qi3togc";
$password = "dogdatabase1";
$dbname = "dbklmqdle5ki76";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "<h1>Thanks for starting the adoption process!</h1>";
echo "<p>We're excited to hear about your new adventure!</p>";

//if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $Name = $_GET['dogname'];

    $sql = "UPDATE Dogs SET Status='Unavailable' WHERE Name='$Name'";
    if ($connection->query($sql) === TRUE) {
        echo "<p>Thanks for adopting: " . $Name . "</p>";
    } else {
        echo "Error updating record: " . $connection->error;
    }
//}

$connection->close();

?>

</body>
</html>
