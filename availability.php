<?php
//actually db info
$servername = "localhost";
$username = "uuu9s7lqeekc7";
$password = "dogdatabase1";
$dbname = "dbklmqdle5ki76";


// //Emmas test db info
// $servername = "localhost";
// $username = "uctaqyp6whqgb";
// $password = "H$44mblcz#$1";
// $dbname = "dbb9amnxg8mjho";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$dogNames = json_decode($_POST['dogNames']);


$matchedBreeds = array();

$sql = "SELECT * FROM Dogs WHERE Status = 'available'";
$results = $connection->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $ourCurrentBreed = strtolower($row['Breed']);

        for ($i = 0; $i < count($dogNames); $i++) {
            $current_breed = strtolower($dogNames[$i]);
        // for ($i = 0; $i < count($matchedBreeds); $i++) {
        //     $current_breed = strtolower($matchedBreeds[$i]);

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
