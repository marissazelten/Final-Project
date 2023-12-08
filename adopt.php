<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutts & Meows - Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .adoption-container {
            max-width: 450px;
            margin: 125px auto;
            padding: 20px;
            background-color: lightgray;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: black;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table td {
            padding: 10px;
        }

        table label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        button {
            background-color: rgb(27, 122, 255);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border-style: none;
        }

        button:hover {
            background-color: rgb(0, 74, 171);
            text-decoration: underline;
        }

        .dogInfoContainer{
            background-color: rgb(194, 107, 181);; 
            border: 1px solid #333;
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .dogInfoContainer img{
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 20px 0;
        }
        .dogInfoContainer td,p,h3,h6{
            font-size: 18px;
            align-items: center;
            justify-content: center;
            padding: 5px 1px;
        }
        #dogInfoContainer:empty{
            display: none;
        }

        ul{
            list-style: none;
            /* font-weight: lighter; */
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <a href="index.html" class="logo"> <img src="images/logo.jpg" alt="Mutts and Meows Logo"> </a>
            <a href="index.html"> Home</a>
            <a href="About.html"> About Us</a>
            <a href="reviews.html"> Testimonials</a>
            <a href="gallery.html"> Gallery</a>
            <a href="products.html"> Products</a>
            <a href="store-info.html"> Store Info</a>
            <a href="contact-us.html"> Contact Us</a>
        </ul>
    </nav>


    <div class="adoption-container">
        <h1>Find your perfect dog!</h1>
        <p>Select the most important qualities you wish to have in your dog</p>
        
        <!-- onsubmit="return validateANDfetch()" -->
        <form action="#">
            <table>

                <!-- <tr>
                    <td><label for="good_with_children">good_with_children:</label></td>
                    <td><input type="checkbox" id="good_with_children" name="good_with_children"></td>
                </tr>
                <tr>
                    <td><label for="good_with_other_dogs">good_with_other_dogs:</label></td>
                    <td><input type="checkbox" id="good_with_other_dogs" name="good_with_other_dogs"></td>
                </tr> -->
                <tr>
                    <td><label for="shedding">shedding:</label></td>
                    <td><input type="checkbox" id="shedding" name="shedding"></td>
                </tr>
                <!-- <tr>
                    <td><label for="grooming">grooming:</label></td>
                    <td><input type="checkbox" id="grooming" name="grooming"></td>
                </tr>
                <tr>
                    <td><label for="drooling">drooling:</label></td>
                    <td><input type="checkbox" id="drooling" name="drooling"></td>
                </tr>
                <tr>
                    <td><label for="coat_length">coat_length:</label></td>
                    <td><input type="checkbox" id="coat_length" name="coat_length"></td>
                </tr>
                <tr>
                    <td><label for="good_with_strangers">good_with_strangers:</label></td>
                    <td><input type="checkbox" id="good_with_strangers" name="good_with_strangers"></td>
                </tr> 
                <tr>
                    <td><label for="playfulness">playfulness:</label></td>
                    <td><input type="checkbox" id="playfulness" name="playfulness"></td>
                </tr>         -->
                <tr>
                    <td><label for="protectiveness">protectiveness:</label></td>
                    <td><input type="checkbox" id="protectiveness" name="protectiveness"></td>
                </tr>        
                <tr>
                    <td><label for="trainability">trainability:</label></td>
                    <td><input type="checkbox" id="trainability" name="trainability"></td>
                </tr>     
                <tr>
                    <td><label for="energy">energy:</label></td>
                    <td><input type="checkbox" id="energy" name="energy"></td>
                </tr>  
                <tr>
                    <td><label for="barking">barking:</label></td>
                    <td><input type="checkbox" id="barking" name="barking"></td>
                </tr>                    
                <tr>
                    <td colspan="2">
                        <button type="submit" onclick="validateANDfetch()">Find my perfect dog!</button>
                    </td>
                </tr>
            </table>
        </form>

        <div class="dogInfoContainer" id="dogInfoContainer">
            <!-- dog info goes here -->
        </div>

    </div>

    <div>
    <!-- <?php
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
        ?> -->


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


    </div>


    <footer>
        <p>&copy; 2023 Mutts & Meows</p>
    </footer>
</body>

<script>

    var matchedBreeds = [];

    function validateANDfetch() {
        event.preventDefault();

        var checkedBoxes = [];

        //iterates through checkboxes and adds to checkedBoxes array
        document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
            if(checkbox.checked){
                console.log("checkbox is" + checkbox.id);

                if(checkbox.id == "protectiveness" || checkbox.id == "energy" || checkbox.id == "trainability"){
                    checkedBoxes.push(checkbox.id+"=5");
                    checkedBoxes.push(checkbox.id+"=4");
                    // checkedBoxes.push(checkbox.id+"=3");

                } else if(checkbox.id == "shedding" || checkbox.id == "barking"){
                    checkedBoxes.push(checkbox.id+"=1");
                    checkedBoxes.push(checkbox.id+"=2");
                    // checkedBoxes.push(checkbox.id+"=3");

                }
            }
        });
       
        console.log("checked boxes are " + checkedBoxes);
        if (checkedBoxes.length > 0) {
                fetchDogInfo(checkedBoxes.join('&'));
        } else {
                alert('Please select at least one characteristic.');
        }
        
    }

    function fetchDogInfo(trait){
        const apiKey = 'vojR2IW3faueNoaU4O5u1Q==ohjNvC8WpNa44LlT';
        var apiUrl = 'https://api.api-ninjas.com/v1/dogs?' + trait;

        console.log("url is:" + apiUrl);

        
        //from Dogs API Documentation
        $.ajax({
            method: 'GET',
            url: apiUrl,
            headers: { 'X-Api-Key': apiKey },
            contentType: 'application/json',
            success: function (result) {
                //update the page with relevent dogs
                updateDogInfo(result);
                console.log("here is the data from Dogs API");
                console.log(result);

            },
            error: function ajaxError(jqXHR) {
                console.error('Error: ', jqXHR.responseText);
            }
        });
    }

    function updateDogInfo(data) {
        var dogInfoContainer = document.getElementById('dogInfoContainer');
        dogInfoContainer.innerHTML = "";

        //display dog info
        data.forEach(function(dog){
            var dogItem = document.createElement('div');
            dogItem.className = 'dogItem';

            var dogName = document.createElement('h2');
            dogName.innerText = dog.name;
           // console.log("dog name is " + dog.name)
            dogItem.append(dogName);


            //display dog image
            var dogImg = document.createElement('img');
            dogImg.src = dog.image_link;
            dogImg.alt = 'Dog Image';
            dogItem.append(dogImg);

// PHP starts here
            dogInfoContainer.innerHTML= "starting php now";
<?php
            echo("in php");

            $sql = "SELECT * FROM Dogs WHERE Status = 'available'"; 
            $results = $connection->query($sql); 
            
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
            echo("done w php");
?>
            console.log("outside of php");
// phps ends here


            //dogItem.append("Scale:")

            var good_with_children = document.createElement('ul');
            good_with_children.innerText = "Good with children: " + dog.good_with_children;
           // console.log("good w children " + dog.good_with_children);
            dogItem.append(good_with_children);


            var good_with_other_dogs = document.createElement('ul');
            good_with_other_dogs.innerText = "Good with other dogs: " + dog.good_with_other_dogs
          //  console.log("good w dogs " + dog.good_with_other_dogs);
            dogItem.append(good_with_other_dogs);


            var grooming = document.createElement('ul');
            grooming.innerText = "Grooming: " + dog.grooming;
            //console.log("grooming " + dog.grooming);
            dogItem.append(grooming);

            var drooling = document.createElement('ul');
            drooling.innerText = "Drooling: " + dog.drooling;
            // console.log("drooling " + dog.drooling);
            dogItem.append(drooling);

            var coat_length = document.createElement('ul');
            coat_length.innerText = "Coat length: " + dog.coat_length;
            // console.log("coat_length " + dog.coat_length);
            dogItem.append(coat_length);

            var good_with_strangers = document.createElement('ul');
            good_with_strangers.innerText = "Good with strangers: " + dog.good_with_strangers;
            // console.log("good_with_strangers " + dog.good_with_strangers);
            dogItem.append(good_with_strangers);

            var playfulness = document.createElement('ul');
            playfulness.innerText = "Playfulness: " + dog.playfulness;
            // console.log("playfulness " + dog.playfulness);
            dogItem.append(playfulness);

            var lifeExpectancy = document.createElement('ul');
            var avgLifeExpectancy = ((dog.min_life_expectancy) + (dog.max_life_expectancy))/2;
            lifeExpectancy.innerText = "Average Life Expectancy: " + avgLifeExpectancy + " years";
            // console.log("avg life expectancy " + avgLifeExpectancy);
            dogItem.append(lifeExpectancy);

            var height = document.createElement('ul');
            var avgHeight = ((dog.min_height_male) + (dog.min_height_female) + (dog.max_height_male) + (dog.max_height_female))/4;
            height.innerText = "Average Height : " + avgHeight + " inches";
            // console.log("avg height " + avgHeight);
            dogItem.append(height);


            var weight = document.createElement('ul');
            var avgWeight = ((dog.max_weight_male) + (dog.max_weight_female) + (dog.min_weight_male) + (dog.min_weight_female))/4;
            weight.innerText = "Average Weight : " + avgWeight + " pounds";
            // console.log("avg weight " + avgWeight);
            dogItem.append(weight);
            
            dogItem.innerHTML += '<hr>';


            matchedBreeds.push(dog.name);

            //add dog card to dogInfoContainer
            dogInfoContainer.appendChild(dogItem);
        });

         console.log("matched breeds are " + matchedBreeds)

    }

</script>



</html>
