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
        }

        h1 {
            color: #333;
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
        }

        .dogs-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
  
<?php

//establish connection info
$servername = "localhost";
$username = "uuu9s7lqeekc7";
$password = "dogDatabase!";
$dbname = "dbklmqdle5ki76";

//create connection
$connection = new mysqli($servername, $username, $password);

//check to see if connection was established 
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//Header title 
echo "<h1>Find Your Furry Friend</h1>";


//select the database
$connection->select_db($dbname);

//run sql query 
$sql = "SELECT * FROM Dogs"; 
$results = $connection->query($sql); 


if ($results->num_rows > 0) {
    $i = 0;
    while ($row = $results->fetch_assoc()) {
        $itemId = $i;
?>
<?php
        for ($x = 0; $x <= breeds.length(); $x++) {
            if(($row['Breed'] LIKE '%breeds[x]%') and ($row['Status'] == '%available%')) {
                <div class='dogs'>
                    <p><?php echo '<img src="' . $row['Image'] . '" alt="Image" style="max-width: 100px; height: auto;">'; ?></p>
                    <p>Name: <?php echo $row['Name']; ?></p>
                    <p>Price: <?php echo '$' . $row['Breed']; ?></p>
                    <p>Description: <?php echo $row['Description']; ?></p>
                    <p>Availability: <?php echo $row['Status']; ?></p>


                </div>
            }
        }
?>      
 
<?php
        $i++;
    }
} else {
    echo "No results";
}

//close connection
$connection->close();
?>
