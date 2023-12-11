<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutts & Meows - Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
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

    <h1>Thank You for contacting Mutts & Meows!</h1>
    <p>We appreciate your message. We'll get back to you as soon as possible.</p>

    <h1>Contact Form Submission Details:</h1>

    <?php
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        echo "<p><strong>First Name:</strong>$firstName</p>";
        echo "<p><strong>Last Name:</strong>$lastName</p>";
        echo "<p><strong>Email:</strong>$email</p>";
        echo "<p><strong>Subject:</strong>$subject</p>";
        echo "<p><strong>Message:</strong>$message</p>";  
    ?>

    <footer>
          <p>&copy; 2023 Mutts & Meows</p>
          <a href="contact-us.html"> Contact Us</a>
          </br>
    </footer>
    
</body>
</html>
