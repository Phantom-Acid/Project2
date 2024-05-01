<?php
require_once 'dbFuncs.php';

// Start session
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: Login.php");
    exit(); // Stop further execution
}

// Connect DB
$pdo = connectDB();

// Retrieve expense from database
$my_query = <<<EOT
    SELECT SUM(limitAmount) AS limitAmount, date FROM budgets 
    WHERE userID = {$_SESSION['id']}
    GROUP BY date;
EOT;
$budget_arr = $pdo->query($my_query)->fetchall();

// Retrieve categories array from database
$query = "SELECT DISTINCT category FROM budgets";
$categories = $pdo->query($query)->fetchall();
?>