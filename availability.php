<?php
$servername = "localhost";
$username = "uuu9s7lqeekc7";
$password = "dogdatabase1";
$dbname = "dbklmqdle5ki76";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// echo "<h1>Find Your Furry Friend</h1>";


$matchedBreeds = $_POST['matchedBreeds'];


$sql = "SELECT * FROM Dogs WHERE Status = 'available'"; 
$results = $connection->query($sql); 
// $matchedBreeds = array("Boston Terrier", "Golden Retriever", "Black Lab");
echo "before if"

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $ourCurrentBreed = strtolower($row['Breed']);
        echo "before for"

        for ($i = 0; $i < count($matchedBreeds); $i++) {
            $current_breed = strtolower($matchedBreeds[$i]);
            echo "before 2nd if"

            if (strpos($current_breed, $ourCurrentBreed) !== false) {
                $dogInfo = array(
                    'Image' => $row['Image'],
                    'Name' => $row['Name'],
                    'Breed' => $row['Breed'],
                    'Description' => $row['Description'],
                    'Status' => $row['Status']                
                );

                $availableDogs[] = $dogInfo;
                        // echo "<div class='dogs-item'>";
                        // echo "<p><img src='{$row['Image']}' alt='Image' style='max-width: 100%; height: auto;'></p>";
                        // echo "<p>Name: {$row['Name']}</p>";
                        // echo "<p>Breed: {$row['Breed']}</p>";
                        // echo "<p>Description: {$row['Description']}</p>";
                        // echo "<p>Availability: {$row['Status']}</p>";
                        // echo "</div>";
            }
        }
    }
} else {
    echo "No results";
}


$connection->close();

//encode the array as json and echo the result
echo json_encode($availableDogs);

?>
