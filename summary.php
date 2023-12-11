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
</script>

<h1> View your order summary below:</h1>
 </br>
 <div class="paragraph">

      <?php
  
  //establish connection info
$server = "localhost";
$userid = "u78oi0lkmq59t";
$pw = "dogdatabase1";
$db = "dbklmqdle5ki76";
      
// Create connection
$conn = new mysqli($server, $userid, $pw);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successful </br>";
  
//select the database
$conn->select_db($db);

  //run a query
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$ordersum = 0;
$email = " Hello ". $_POST['fname'] . ", \n Thank you for your order from Mutts and Meows. \n View your order summary below: \n \n";
//get results
if ($result->num_rows > 0) 
{ 
  while($row = $result->fetch_array()) 
  { 
    $ordernum = "order" . $row["index"];
    $ordertotal = $row["price"] * $_POST[$ordernum];
    if ($ordertotal > 0) {
      echo "<img src='".$row["image"]."' height='200' style='margin: auto; display: block'> </br> ";
      echo $row["name"] ." Ordered: ". $_POST[$ordernum] . " x $" . $row["price"] . " = $". $ordertotal ."</br> </br>";
      
      $email = $email . $row["name"] ." Ordered: ". $_POST[$ordernum] . " x $" . $row["price"] . " = $". $ordertotal . " \n ";
      $ordersum = $ordertotal + $ordersum;
    }
  }
  $tax = round($ordersum * 0.0625, 2); 
  $total = round($tax + $ordersum, 2);
  echo "Subtotal: $" . round($ordersum, 2) . "</br> Tax: $". $tax ."</br> </br> Total: $" .$total;
  echo "</br> </br> <div style = 'text-align: left'> An email was sent to ". $_POST['email'] . " with your order summary </div>";
  
  $email = $email . "Subtotal: $" . round($ordersum, 2) . "\n Tax: $". $tax ." \n \n Total: $" .$total;
  $email = wordwrap($email,70);
  $headers = "From: alibbe01@tufts.edu";
  $to = $_POST['email'];
  $sucess = mail($to, "Your Mutts and Meows Order", $email, $headers);
} 
else 
  echo "no results";
  
//close the connection	
$conn->close();

  ?>
</div>
</br> 
</br> 
    <footer>
          <p>&copy; 2023 Mutts & Meows</p>
          <a href="contact-us.html"> Contact Us</a>
        </br>
    </footer>
</body>
