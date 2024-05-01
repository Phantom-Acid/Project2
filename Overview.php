<?php 
session_start();
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Overview | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/overviewstyle.css" />

   
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
    <?php
    $pdo = connectDB();
    $sql_query = <<<EOT
    WITH expenses2 AS (
    SELECT SUM(amount) AS spent, category from expenses WHERE date >= DATE(NOW() - INTERVAL 7 DAY) AND userID={$_SESSION['id']}
      GROUP BY category
    )
    SELECT * FROM budgets b
    INNER JOIN expenses2 ON expenses2.category = b.category;

    EOT;
    $categories = $pdo->query($sql_query)->fetchall();
    $budgets = $pdo->query("SELECT SUM(limitAmount) FROM budgets WHERE userID={$_SESSION['id']}")->fetchall()[0]['SUM(limitAmount)'];

    $expenditures = 0;
    foreach ($categories as $c=>$a) {
      $expenditures = $expenditures + $a['spent'];
    }
    ?>

    <div class="container">
      <div class="row p-3">
        <h3 style="color: black">Your weekly budget is $<?php echo $budgets;?>. You have spent $<?php echo $expenditures;?> so far.</h3>
      </div>
    </div>

    <div class="row p-0 m-0">
      <div class="col-6">
        <div class="form-group span2" id="catselector" onchange="change_content()">
          <select class="form-control" id="category" name="category">
            <?php
            foreach ($categories as $cat) 
            {
              echo "<option>{$cat['category']}</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row text-center p-0 m-0 h-100">
        <div class="col-6">
          <div id="chartContainer"></div>
        </div>

        <div class="col-6">
          <div id="chartContainer2"></div>
        </div>
      </div>
    </div>

    <script src="js/overview.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>