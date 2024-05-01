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

// Retrieve income from database
$my_query = <<<EOT
    SELECT SUM(amount) AS amount, date FROM income 
    WHERE userID = {$_SESSION['id']}
    GROUP BY date;
EOT;
$income_arr = $pdo->query($my_query)->fetchall();

// Retrieve categories array from database
$query = "SELECT DISTINCT frequency FROM income";
$categories = $pdo->query($query)->fetchall();
?>