<?php
$servername = "localhost";
$username = "uuu9s7lqeekc7";
$password = "dogdatabase1";
$dbname = "dbklmqdle5ki76";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$dogNames = json_decode($_POST['dogNames']);
$availableDogs = array();
$matchedBreeds = array();
$chosenDog = array();

$sql = "SELECT * FROM Dogs WHERE Status = 'available'";
$results = $connection->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $ourCurrentBreed = strtolower($row['Breed']);

        // Check if the dog has already been chosen
        if (!in_array($row['Name'], $chosenDog, FALSE)) {
            for ($i = 0; $i < count($dogNames); $i++) {
                $current_breed = strtolower($dogNames[$i]);

                if (strpos($current_breed, $ourCurrentBreed) !== false) {
                    $dogInfo = array(
                        'Image' => $row['Image'],
                        'Name' => $row['Name'],
                        'Breed' => $row['Breed'],
                        'Description' => $row['Description'],
                        'Status' => $row['Status']
                    );
                    $availableDogs[] = $dogInfo;
                    $matchedBreeds[] = $row['Breed'];
                    $chosenDog[] = $row['Name'];
                    break; // Break out of the loop once a match is found
                }
            }
        }
    }
} else {
    echo "No results";
}

header('Content-Type: application/json');
echo json_encode($availableDogs);

$connection->close();
?>


