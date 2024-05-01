<!--This PHP script starts a session and dynamically generates an HTML page displaying a menu of items retrieved from a database. It checks if a user is logged in by checking the session variable 'user'. Depending on the login status, it adjusts the menu options accordingly (e.g., showing 'LogOut' and 'Cart' if logged in, or 'Login' and 'Sign Up' if not).

The script retrieves menu items from a database table named 'menus' and displays them in a grid layout using Bootstrap. For each menu item, it displays an image, name, price, and topping. Additionally, it includes a form for adding items to a shopping cart, which submits the selected item's details to another PHP script named 'addToCart.php'.
-->


<?php 
session_start();
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />
    
    <title>Home | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container-2">
    <?php 
    require_once 'pageFormat.php';
    require_once 'dbFuncs.php';
    if(isset($_SESSION['user']))
    {
      $arr = array("Overview", "Income", "Expense", "Budget", "Reminder", "LogOut");
    }
    else
      $arr = array("Home", "Income", "Expense", "Budget", "Contact", "Login", "Sign Up");

    pageHeader("Home", "./images/logo.png", $arr);
    ?>
    </div>

    <div class="intro">
      <header>
          <h1>Welcome to Finance Track App</h1>
      </header>
      <main>
          <section class="features">
              <p><u>Features</u></p>
              <ul>
                  <li>Track your expenses and income</li>
                  <li>Create budgets and manage your finances</li>
                  <li>Receive reminders for upcoming bills</li>
                  <li>Analyze your spending habits with financial analytics</li>
              </ul>
          </section>
          <section class="benefits">
              <p><u>Benefits</u></p>
              <ul>
                  <li>Stay organized and in control of your finances</li>
                  <li>Gain insights into your financial health</li>
                  <li>Save time and effort with automated reminders</li>
                  <li>Make informed decisions with detailed financial analysis</li>
              </ul>
          </section>
      </main>
    </div>

    <div class="signup">
      <img src="./images/signup.png" alt="Avatar">
      <div class="signup-text">
        <p>Join our finance tracking app today!</p>
        <a href="Sign Up.php"><button class="signup-btn">Sign Up</button></a>
      </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>