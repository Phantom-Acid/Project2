<!--This appears to be a sign-up page for a website or web application. It includes form elements for users to input their desired username and password. Additionally, it incorporates PHP code to handle errors (displaying error messages via GET parameters) and includes references to external resources like Bootstrap for styling and functionality. The form action points to a PHP script (ccontactHandler.php) which likely processes the form submission and handles user sign-up logic.-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "Form submitted";
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Contact Us | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contactstyle.css" />

  </head>
  <body>
    


  <a href="Home.php" class="home-button">Home</a>

    <div class="contact-container">
      <div class="contact-image">
        <img src="./images/contact.avif" alt="Avatar" style="width: 100%; height: 100%;">
      </div>
      <div class="contact-form">
        <h3>Contact Us.</h3>

        <?php if(isset($message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form id="contact-form" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="" class="rounded" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="" class="rounded" required><br><br>

            <label for="phone">Phone Number:</label><br>
            <input type="tel" id="phone" name="phone" value="" class="rounded" required><br><br>

            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" class="rounded" rows="3" required></textarea>

            <input type="submit" value="Submit" class="contact-button rounded">
        </form>
      </div>
    </div>

    <script src="js/contactvalidation.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
