<!--This appears to be a sign-up page for a website or web application. It includes form elements for users to input their desired username and password. Additionally, it incorporates PHP code to handle errors (displaying error messages via GET parameters) and includes references to external resources like Bootstrap for styling and functionality. The form action points to a PHP script (cSignUpHandler.php) which likely processes the form submission and handles user sign-up logic.-->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Create your login | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style3.css" />

  </head>
  <body>
    


  <a href="Home.php" class="home-button">Home</a>

    <div class="signup-container">
      <div class="signup-image">
        <img src="./images/signup2.webp" alt="Avatar" style="width: 100%; height: 100%;">
      </div>
      <div class="signup-form">
        <h3>Create Your Account.</h3>
        <div class="container-2">
          <?php
          if(isset($_GET['errMsg']))
          {
            $m = $_GET['errMsg'];
            echo "<h3 class = \"alert alert-warning\"> $m </h3>";
          }
          ?>
        </div>


        <form id="signup-form" action="./cSignUpHandler.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="" class="rounded" required><br><br>
            
            <label for="email">Username:</label><br>
            <input type="email" id="email" name="email" value="" class="rounded" required><br><br>

            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="pwd" value="" class="rounded" required><br><br>

            <label for="phone">Phone Number:</label><br>
            <input type="tel" id="phone" name="phone" value="" class="rounded" required><br><br>

            <input type="submit" value="Sign Up" class="signup-button rounded">
        </form>
        <p>Already on FinTrac? <a href="Login.php">Login</a></p> <!-- Link to login page -->
      </div>
    </div>

    <script src="js/validation.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
