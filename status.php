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
echo "<h1>Begin Your Adoption</h1>";


//select the database
$connection->select_db($dbname);

//run sql query 
$sql = "SELECT * FROM menu"; 
$results = $connection->query($sql); 



?>
<form action="processform.php" method="get" onsubmit=" return validateForm()">
        <div class='dogs'>

                <select dog name='selected_items<?php echo $row['Name']; ?>'>
                    <?php
                    for ($j = 0; $j <= 20; $j++) {
                        echo "<option value='$j'>$j</option>";
                    }
                    ?>
            </select>
        </div>
<?php
        $i++;
    }
} else {
    echo "No results";
}

//close connection
$connection->close();
?>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="Address">Address:</label>
        <textarea id="Address" name="Address" rows="4" cols="50"></textarea>
        
        <label for="Application">Why do you think this furry friend will be a good addition to your home?:</label>
        <textarea id="Application" name="Application" rows="4" cols="50"></textarea>
        
        <input type="submit" value="Submit Form">
    </form>
<script>
     function validateForm() {
        var selectedItems = document.querySelectorAll('[name^="selected_items"]');
        var ordered = Array.from(selectedItems).some(item => parseInt(item.value) > 0);

        if (!ordered) {
            alert('Please add atleast one dog');
            return false;
        }

        var first_name = document.getElementById('first_name').value.trim();
        var last_name = document.getElementById('last_name').value.trim();
        var first_name = document.getElementById('Address').value.trim();
        var last_name = document.getElementById('Application').value.trim();

        if (first_name === '' || last_name === '' || Address === '' || Application === '') {
            alert("Please fill out all fields.");
            return false;
        }

        return true;
    }
</script>

</body>
</html>

