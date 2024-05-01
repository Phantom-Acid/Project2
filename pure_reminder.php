<?php
require_once 'dbFuncs.php';
function fetchReminders($userID) {
    $conn = connectDB();
    $userEmail = $_SESSION['user'];
    $sql = "SELECT userID FROM users WHERE username = :userEmail";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userEmail', $userEmail);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $userID = $userData['userID'];

    $sql = "SELECT * FROM remainders WHERE userID = :userID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function deleteReminder($remainderID) {
    $conn = connectDB();
    $sql = "DELETE FROM remainders WHERE remainderID = :remainderID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':remainderID', $remainderID);
    $stmt->execute();
}
if (!isset($_SESSION['user'])) {
    header("Location: Login.php");
    exit();
}
if (isset($_POST['createReminder'])) {
    $conn = connectDB();
    $userEmail = $_SESSION['user'];
    $sql = "SELECT userID FROM users WHERE username = :userEmail";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userEmail', $userEmail);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $userID = $userData['userID'];
    $description = $_POST['description'];
    $sql = "INSERT INTO remainders (userID, remainderDate, description) VALUES (:userID, CURRENT_DATE(), :description)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->bindParam(':description', $description);
    $stmt->execute();

    header("Location: Reminder.php");
}
if (isset($_POST['deleteReminder'])) {
    $remainderID = $_POST['remainderID'];
    deleteReminder($remainderID);
}
$userID = $_SESSION['user'];
$reminders = fetchReminders($userID);
?> 