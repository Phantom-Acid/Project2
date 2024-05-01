<?php
session_start();
require_once('dbFuncs.php');
$pdo = connectDB();

try {
    $insertion = <<<EOT
        INSERT INTO expenses(userID, amount, category, date, description) 
        VALUES ({$_SESSION['id']}, {$_POST['expense']}, '{$_POST['category']}', CURRENT_DATE(), '{$_POST['description']}');
    EOT;
    $pdo->query($insertion);
    header('Location: Expense.php');
    exit();

} catch (Exception $e) {
    echo "<script> alert(\"Invalid input\"); window.location.href = \"Expense.php\"; </script>";
    
}