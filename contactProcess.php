<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutts & Meows - Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

    <style>
        .contact-container{
            max-width: 450px;
            margin: 125px auto;
            padding: 20px;
            background-color: pink;
            border-radius: 10px;
        }
    </style>

<body>
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

    <div class="contact-container">
    <h1>Thank You for contacting Mutts & Meows!</h1>
    <p>We appreciate your message! We'll get back to you as soon as possible.</p>

    <p>Contact Form Submission Details:</p>

    <?php
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        echo "<p><strong>First Name: </strong>$firstName</p>";
        echo "<p><strong>Last Name: </strong>$lastName</p>";
        echo "<p><strong>Email: </strong>$email</p>";
        echo "<p><strong>Subject: </strong>$subject</p>";
        echo "<p><strong>Message: </strong>$message</p>";  
    ?>
    </div>

    <footer>
          <p>&copy; 2023 Mutts & Meows</p>
          <a href="contact-us.html"> Contact Us</a>
          </br>
    </footer>

</body>
</html>
