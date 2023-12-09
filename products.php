<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutts & Meows - Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        div.product {
            margin: 10px;
            display: inline-block;
            width: 300px;
            border-style: solid;
            height: 500px;
            padding: 10px;
            background-color: pink; 
            border-radius: 10px;
      }
        div.ptext {
            padding: 0px 5px; 
            display: block; 
            height: 200px
        }
      h1 {
          text-align: center;
          font-size: 2.5em;
        }
        
@media (max-width: 768px) {
    h1 {
        font-size: 20px;
        padding-top: 20px; 
        margin-top: 70px; 
    }
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

<script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        function validateForm() 
    {
        var firstName = document.getElementById('fname').value;
        var lastName = document.getElementById('lname').value;
        var email = document.getElementById('email').value;
        var order1 = document.getElementById('order1').value;
        var order2 = document.getElementById('order2').value;
        var order3 = document.getElementById('order3').value;
        var order4 = document.getElementById('order4').value;
        var order5 = document.getElementById('order5').value;
        var order6 = document.getElementById('order6').value;
        var order7 = document.getElementById('order7').value;
        var order8 = document.getElementById('order8').value;

        if (firstName.trim() == "") {
            alert('First Name is required');
            return false;
        }

        if (lastName.trim() == "") {
            alert('Last Name is required');
            return false;
        }
         if (email.trim()== "") {
            alert('An email is required');
            return false;
        }
        if (email.search("@") == -1) {
            alert('Please enter a valid email');
            return false;
        }
        if (order1.trim() == 0 && order2.trim() == 0 && order3.trim() == 0 && order4.trim() == 0 && order5.trim() == 0 && order6.trim() == 0 && order7.trim() == 0 && order8.trim() == 0) {
            alert('Please place at least one order');
            return false;
        }

      return true;
    } 
     </script>

    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"> <i class="fa fa-bars" style = "margin-left: 15px; height: fit-content;"></i></button>
        <div id="myDropdown" class="dropdown-content">
            <a href="#"> &nbsp;</a>
            <a href="index.html"> Home</a>
            <a href="About.html"> About Us</a>
            <a href="reviews.html"> Testimonials</a>
            <a href="gallery.html"> Gallery</a>
            <a href="products.html"> Products</a>
            <a href="store-info.html"> Store Info</a>
            <a href="contact-us.html"> Contact Us</a>
        </div>
    </div>
    
</br>
</br>
</br>
<div style="margin: 10px">
    <h1>Our Products</h1>
    <?php
  
  //establish connection info
$server = "localhost";// your server
$userid = "ugjneis3axmvm"; // your user id
$pw = "d7jvh5nhng87"; // your pw
$db= "dbjmdhkmuriqnk"; // your database
      
// Create connection
$conn = new mysqli($server, $userid, $pw);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//select the database
$conn->select_db($db);
//run query
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

//creates the select element in a string to print out
function selectoption($index) {
      $select = "<select name='order". $index ."' id='order". $index ."'>";
      for ($i = 0; $i < 11; $i++) {
        $select = $select . "<option>" . $i . "</option>";

      }
      $select = $select . "</select>";
      return $select;
    }

//get results
if ($result->num_rows > 0) 
//puts SQL in a form
{ ?> 
<form action="summary.php" method="post" onsubmit="return validateForm()">
<span style="margin:auto; justify-content: center">
 <?php 
  while($row = $result->fetch_array()) 
  { 
    //echos each element
    $selectstring = selectoption($row["index"]);
    echo "<div class='product'> <img src='".$row["image"]."' height='200' style='margin: auto; display: block'> <div class='ptext'> <h3>" . $row["name"] . " </h3> $" . $row["price"] . "</br> Description: " . $row["description"] . "</div> </br> " . $selectstring . "</br> </div> ";
    
  }
  ?>  
  </span>
  </br>
  <div style='width: 100%; margin: 15px''>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br><br>
  <label for="specialinst">Special Instructions:</label>
  <textarea id="specialinst" name="specialinst" rows="4" cols="50"></textarea>
  </br>
  </br>
  </br>
  <input type="submit" value="Submit Order">
  </div> 
  </form>
   <?php 
} 
else 
  echo "no results";
  
//close the connection	
$conn->close();

  ?>

    </div>
    <footer>
        <p>&copy; 2023 Mutts & Meows</p>
    </footer>

    <script>
        const navToggle = document.querySelector('nav');
        navToggle.addEventListener('click', () => {
            navToggle.querySelector('ul').classList.toggle('show');
        });
    </script>
</body>