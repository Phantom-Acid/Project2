<?php
session_start();
require_once('dbFuncs.php');
$pdo = connectDB();

try {
    $insertion = <<<EOT
        INSERT INTO income(userID, amount, source, date, frequency) 
        VALUES ({$_SESSION['id']}, {$_POST['amount']}, '{$_POST['source']}', CURRENT_DATE(), '{$_POST['frequency']}');
    EOT;
    $pdo->query($insertion);
    header('Location: Income.php');
    exit();

} catch (Exception $e) {
    echo "<script> alert(\"Invalid input\"); window.location.href = \"Income.php\"; </script>";
    
}