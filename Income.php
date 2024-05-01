<?php
require_once 'pageFormat.php';
require_once 'IncomeDatabaseFunctions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Income | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styleIncome.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <!-- My Scripts -->
    <script src="js/IncomeDatabaseFunctions.js"></script>

    <script>
    // FIXME : where to put this code for example? it requires a php variable
    $(document).ready(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {text: "Income Data"},
            axisY: {title: "Amount", titleFontSize: 24},
            data: [{ 
                type: "spline",
                dataPoints: getData(<?php echo json_encode($income_arr, JSON_NUMERIC_CHECK); ?>)
            }]
        });
        chart.render();
    });
    </script>

</head>
<body>
<div class="container-2">
    <?php 
    require_once 'pageFormat.php';

    // Display page header
    $arr = array("Overview", "Income", "Expense", "Budget", "Reminder", "LogOut");
    pageHeader("Home", "./images/logo.png", $arr);
    ?>
</div>

<form class="p-5" action="IncomeHandler.php" method="POST">
    <div class="form-group">
        <label for="amount">Income amount:</label>
        <input type="text" class="form-control" id="amount" name="amount" placeholder="$0.00">
    </div>

    <br>

    <div class="mb-3">
        <label for="source" class="form-label">Income Source:</label>
        <select class="form-select" id="source" name="source">
            <option value="">Select Source</option>
            <option value="Dividends">Dividends</option>
            <option value="Employment">Employment</option>
            <option value="Freelancer">Freelancer</option>
            <option value="Interest">Interest</option>
            <option value="Investments">Investments</option>
            <option value="Marketing">Marketing</option>
            <option value="Rent">Rent</option>
            <option value="Royalties">Royalties</option>
            <option value="Others">Others</option>
            <!-- Add more categories as needed -->
        </select>
    </div>


    <br>

    <div class="mb-3">
        <label for="frequency" class="form-label">Frequency:</label>
        <select class="form-select" id="frequency" name="frequency">
            <option value="">Select Frequency</option>
            <option value="Every Week">Every Week</option>
            <option value="Every 2 Weeks">Every 2 Weeks</option>
            <option value="Every Month">Every Month</option>
            <option value="Every Year">Every Year</option>            
            <option value="Others">Others</option>
            <!-- Add more categories as needed -->
        </select>
    </div>

    <br>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

</body>
</html>