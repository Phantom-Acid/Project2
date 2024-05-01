<?php
session_start();
require_once('dbFuncs.php');
$pdo = connectDB();

try {
    $insertion = "INSERT INTO budgets(userID, limitAmount, category, date) VALUES (:userID, :limitAmount, :category, :date)";
    $stmt = $pdo->prepare($insertion);
    $stmt->execute([
        'userID' => $_SESSION['id'],
        'limitAmount' => $_POST['limitAmount'],
        'category' => $_POST['category'],
        'date' => $_POST['date']
    ]);
    header('Location: Budget.php');
    exit();

} catch (Exception $e) {
    echo "<script> alert(\"Invalid input\"); window.location.href = \"Budget.php\"; </script>";
}
?>
