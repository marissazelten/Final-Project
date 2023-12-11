<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutts & Meows - Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Mutts & Meows </title>
    <style>
      h1 {
          text-align: center;
          font-size: 2.5em;
        }
      .paragraph{
        justify-content: center;
        text-align: right;
        line-height: 1.5;
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        border-style: solid;
        padding: 10px;
        background-color: pink; 
        border-radius: 10px;
      } 
        
    @media (max-width: 768px) {
        h1 {
        font-size: 20px;
        padding-top: 20px; 
        margin-top: 70px; 
      }

      .paragraph {
        width: 400px;
      }

    }
    </style> 
</head>

<body>
<nav>
    <ul>
        <a href="index.html" class="logo"> <img src="images/logo.jpg" alt="Mutts and Meows Logo"> </a>
        <a href="About.html"> About Us</a>
        <a href="reviews.html"> Testimonials</a>
        <a href="adopt.html"> Adopt</a>
        <a href="products.php"> Products</a>
        <a href="store-info.html"> Store Info</a>
    </ul>
</nav>
<div class="dropdown">
        <button onclick="myFunction()" onmouseover="myFunction()" class="dropbtn"> <i class="fa fa-bars" style = "margin-left: 15px; height: fit-content;"></i></button>
        <div id="myDropdown" class="dropdown-content">
            <a href="#"> &nbsp;</a>
            <a href="index.html"> Home</a>
            <a href="About.html"> About Us</a>
            <a href="reviews.html"> Testimonials</a>
            <a href="adopt.html"> Adopt</a>
            <a href="products.php"> Products</a>
            <a href="store-info.html"> Store Info</a>
        </div>
    </div>
    
</br>
</br>
</br>

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


//if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $Name = $_GET['dogname'];
    $email_address = $_GET['email_address'];
    $fname = $_GET['firstname'];
echo "<h1>Thank you, " . $fname  ." for starting the adoption process!</h1>";
echo "<p>We're excited to hear about your new adventure!</p>";
echo "<p>You adopted: ". $Name ."<p>" ;
echo "<p>". $Name ." Is so excited to meet you!<p>" ;
    $sql = "UPDATE Dogs SET Status='unavailable' WHERE Name='$Name'";
    if ($connection->query($sql) === TRUE) {
       // echo "<p>Thanks for adopting: " . $Name . "</p>";
    } else {
        echo "Error updating record: " . $connection->error;
    }
//}
  $email = " Hello ". $fname . ", \n Thank you for adopting "  .$Name  . "\n Thanks for making a difference in your new furry friend's life by giving them a furrever home! The adoption agency will be in contact with you shortly to arrange your adoption.\n \n";
  $email = wordwrap($email,70);
  $headers = "From: alibbe01@tufts.edu";
  $to = $_GET['email_address'];
 $success = mail($to, "Your Mutts and Meows Adoption Confirmation", $email, $headers);


$connection->close();

?>

</body>
</html>
