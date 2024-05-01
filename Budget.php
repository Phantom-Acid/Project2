<!-- FIXME : Messy code maybe change organization -->

<?php
require_once 'BudgetDatabaseFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Budget | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/styleIncome.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <!-- My Scripts -->
    <script src="js/BudgetDatabaseFunctions2.js"></script>
    
    <script>
    // FIXME : where to put this code for example? it requires a php variable
    $(document).ready(function () {
        $('#hidden-button').hide();

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {text: "Budget Data"},
            axisY: {title: "USD", titleFontSize: 24},
            data: [{ 
                type: "spline",
                dataPoints: getData(<?php echo json_encode($budget_arr, JSON_NUMERIC_CHECK); ?>)
            }]
        }
        );
        chart.render();
    });
    </script>

</head>
<body>
<div class="container-2">
    <?php 
    // Display page header
    require_once 'pageFormat.php';

    $arr = array("Overview", "Income", "Expense", "Budget", "Reminder", "LogOut");
    pageHeader("Home", "./images/logo.png", $arr);
    ?>
</div>

<div class="p-5">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>

<form class="p-5" action="BudgetHandler.php" method="POST">
    <div class="form-group">
        <label for="limitAmount">Limit Amount:</label>
        <input type="text" class="form-control" id="limitAmount" name="limitAmount" placeholder="$0.00">
    </div>

    <br>

    <div class="mb-3">
        <label for="category" class="form-label">Category:</label>
        <select class="form-select" id="category" name="category">
            <option value="">Select category</option>
            <option value="Utilities">Utilities</option>
            <option value="Food">Food</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Housing">Housing</option>
            <option value="Insurance">Insurance</option>
            <option value="Transportation">Transportation</option>
            <option value="Debt">Debt</option>
            <option value="Saving">Saving</option>
            <option value="Emergency Fund">Emergeny Fund</option>
            <option value="Others">Others</option>
            <!-- Add more categories as needed -->
        </select>
    </div>

    <br>

    <div class="mb-3">
        <label for="date" class="form-label">Date:</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>

    <br>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

</body>
</html>
