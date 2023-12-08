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
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .dogs-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
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

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "<h1>Find Your Furry Friend</h1>";

$sql = "SELECT * FROM Dogs WHERE Status = 'available'"; 
$results = $connection->query($sql); 
$matchedBreeds = array("Boston Terrier", "Golden Retriever", "Black Lab");

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $ourCurrentBreed = strtolower($row['Breed']);
     
        for ($i = 0; $i < count($matchedBreeds); $i++) {
            $current_breed = strtolower($matchedBreeds[$i]);


    if (strpos($current_breed, $ourCurrentBreed) !== false) {
                echo "<div class='dogs-item'>";
                echo "<p><img src='{$row['Image']}' alt='Image' style='max-width: 100%; height: auto;'></p>";
                echo "<p>Name: {$row['Name']}</p>";
                echo "<p>Breed: {$row['Breed']}</p>";
                echo "<p>Description: {$row['Description']}</p>";
                echo "<p>Availability: {$row['Status']}</p>";
                echo "</div>";
            }
        }
    }
} else {
    echo "No results";
}

$connection->close();
?>

<form action="/action_page.php" method="post">
  <label for="dogname">Dog name:</label><br>
  <input type="text" id="dogname" name="dogname" value=""><br>
  <label for="firstname">First name:</label><br>
  <input type="text" id="firstname" name="firstname" value=""><br>
  <label for="lastname">Last name:</label><br>
  <input type="text" id="lastname" name="lastname" value=""><br><br>
  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address" value=""><br>
  <label for="adoptionreason">Why you want to adopt this dog:</label><br>
  <input type="text" id="adoptionreason" name="adoptionreason" value=""><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
