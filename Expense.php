<!-- FIXME : Messy code maybe change organization -->

<?php
require_once 'ExpenseDatabaseFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="img/jpg" href="images/symbol.png" />

    <title>Expenses | FinTrac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/styleIncome.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <!-- My Scripts -->
    <script src="js/ExpenseDatabaseFunctions2.js"></script>
    
    <script>
    // FIXME : where to put this code for example? it requires a php variable
    $(document).ready(function () {
        $('#hidden-button').hide();

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {text: "Daily Expense Data"},
            axisY: {title: "USD", titleFontSize: 24},
            data: [{ 
                type: "spline",
                dataPoints: getData(<?php echo json_encode($expense_arr, JSON_NUMERIC_CHECK); ?>)
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

<form class="p-5" action="ExpenseHandler.php" method="POST">
    <div class="form-group">
        <label for="expense">Expense amount:</label>
        <input type="text" class="form-control" id="expense" name="expense" placeholder="$0.00">
    </div>

    <br>

    <!--<div class="mb-3">
        <label for="category" class="form-label">Expense Category:</label>
        <select class="form-select" id="category" name="category">
            <option value="">Select category</option>
            <option value="Utilities">Utilities</option>
            <option value="Food">Food</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Rent">Rent</option>
            <option value="Insurance">Insurance</option>
            <option value="Transportation">Transportation</option>
            <option value="Education">Education</option>
            <option value="Advertising">Advertising</option>
            <option value="Interest">Interest</option>
            <option value="Others">Others</option>
        </select>
    </div>-->

    <div class="form-group" id="cat_selector" onchange="load_new_content()">
        <label for="category">Expense category:</label>
        <select class="form-control" id="category" name="category">
            <?php
            foreach ($categories as $category) {
                echo "<option>{$category['category']}</option>";
            }
            ?>
            <option>Add Category</option>
        </select>
    </div>
    <div class="form-group hidden_button" id="hidden-button">
        <br>
        <label for="add_category">Add category:</label>
        <input type="text" class="form-control" id="add_category" name="add_category">
    </div>

    <br>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <br>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

</body>
</html>
