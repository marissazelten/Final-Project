<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woofs and Wags</title>
    <!-- page style -->
    <style>
        body {
            font-family: "Arial", sans-serif;
            margin: 20px;
              display: block;
  margin-left: auto;
  margin-right: auto;
        }
        .center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}

        h1 {
            color: #333;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .dogs-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .dogs-item {
            border: 1px solid #ccc;
            padding: 15px;
            background-color: #f9f9f9;
            max-width: 300px;
              display: block;
  margin-left: auto;
  margin-right: auto;
        }

        .dogs-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
              display: block;
  margin-left: auto;
  margin-right: auto;
        }
    </style>
</head>
<body>
  
<?php
$servername = "localhost";
$username = "uuu9s7lqeekc7";
$password = "dogdatabase1";
$dbname = "dbklmqdle5ki76";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "<h1>Find Your Furry Friend</h1>";

$connection->select_db($dbname);

$sql = "SELECT * FROM Dogs WHERE Status = 'available'"; 
$results = $connection->query($sql); 

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {

        if (in_array($row['Breed'], $matchedBreeds)) {
            echo "<div class='dogs-item'>";
            echo "<p><img src='{$row['Image']}' alt='Image' style='max-width: 100px; height: auto;'></p>";
            echo "<p>Name: {$row['Name']}</p>";
            echo "<p>Breed: {$row['Breed']}</p>";
            echo "<p>Description: {$row['Description']}</p>";
            echo "<p>Availability: {$row['Status']}</p>";
            echo "</div>";
        }
    }
} else {
    echo "No results";
}

$connection->close();
?>

<form action="/action_page.php">
  <label for="fname">Dog name:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value=""><br><br>
    <label for="fname">Address:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>
    <label for="fname">Why you want to adopt this dog:</label><br>
  <input type="text" id="fname" name="fname" value=""><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
