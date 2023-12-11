<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<style>
   echo "<body style='background-color:pink'>";
</style>
    
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
    $email_address = $_GET['email_address'];
    $fname = $_GET['firstname'];


    $sql = "UPDATE Dogs SET Status='unavailable' WHERE Name='$Name'";
    if ($connection->query($sql) === TRUE) {
        echo "<p>Thanks for adopting: " . $Name . "</p>";
    } else {
        echo "Error updating record: " . $connection->error;
    }
//}

$connection->close();
$email = " Hello ". $fname . ", \n Thank you for adopting "  .$Name  . "\n Thanks for making a difference in your new furry friend's life by giving them a furrever home! \n \n";

 $email = wordwrap($email,70);
 $headers = "From: alibbe01@tufts.edu";
 $to = $_GET['email_address']; //change this part to retrieve email from your form
 $success = mail($to, "Your Mutts and Meows Order", $email, $headers);

?>

</body>
</html>
