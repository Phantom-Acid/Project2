<!--This appears to be a login page for a website. It includes a form for users to input their username and password. The form action is set to "./cLoginHandler.php", indicating that upon submission, the form data will be processed by a PHP script called "cLoginHandler.php". The page also includes some PHP code for handling error messages and likely includes a header section with navigation links. The styling is facilitated by Bootstrap CSS and JavaScript libraries.  --> 


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Log In | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css" />

  </head>
  <body>

    <a href="Home.php" class="home-button">Home</a>

    <div class="login-container">
      <div class="login-image">
        <img src="./images/login.png" alt="Avatar" style="width: 100%; height: 100%;">
      </div>
      
      <div class="login-form">
        <h3>Log In to FinTrac.</h3>
        <div class="container-2">
          <?php
          if(isset($_GET['errMsg']))
          {
            $m = $_GET['errMsg'];
            echo "<h3 class = \"alert alert-warning\"> $m </h3>";
          }
          ?>
        </div>


        <form action="./cLoginHandler.php" method="POST">
            <label for="email">Username:</label><br>
            <input type="email" id="email" name="email" value="" class="rounded"><br><br>

            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="pwd" value="" class="rounded"><br><br>
            
            <input type="submit" value="Login" class="login-button rounded">
        </form>
        <p>Not on FinTrac? <a href="Sign Up.php">Create an account</a></p> <!-- Link to sign up page -->
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>