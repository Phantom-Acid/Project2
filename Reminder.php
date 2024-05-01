<?php
session_start();
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Reminder | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reminderstyle.css" />
  </head>
  <body>
    <div class="container-2">
    <?php 
    require_once 'pageFormat.php';
    require_once 'dbFuncs.php';
    require_once 'pure_reminder.php';
    if(isset($_SESSION['user']))
    {
      $arr = array("Overview", "Income", "Expense", "Budget", "Reminder", "LogOut");
    }
    else
      $arr = array("Home", "Income", "Expense", "Budget", "Contact", "Login", "Sign Up");

    pageHeader("Home", "./images/logo.png", $arr);
    ?>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-md-5">
      <h2>Create Reminder</h2>
      <form method="post" action="">
        <label for="description">Enter your reminder here:</label><br>
        <input type="text" id="description" name="description" required><br><br>
        <button type="submit" name="createReminder" class="btn btn-primary">Create Reminder</button>
      </form>
    </div>
    
    <div class="col-md-5">
      <h2>Reminders</h2>
      <?php if (!empty($reminders)) : ?>
        <ul>
          <?php foreach ($reminders as $reminder) : ?>
            <li>
              <span style="color: black; font-size: 20px;">
                <?php echo $reminder['description'] . " - " . $reminder['remainderDate']; ?>
              </span>

              <form method="post" action="">
                <input type="hidden" name="remainderID" value="<?php echo $reminder['remainderID']; ?>">
                <button type="submit" name="deleteReminder" class="btn btn-danger">Delete reminder</button>
              </form>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p>No reminders.</p>
      <?php endif; ?>
    </div>
  </div>
  

    <!--<div class="container p-5">
        <h1>Under Construction. Will be done by due date.</h1>
    </div>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>