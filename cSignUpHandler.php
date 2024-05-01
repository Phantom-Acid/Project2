<?php 
session_start();
require_once 'dbFuncs.php';

$pdo = connectDB();

// Check if all required form fields are present
if(isset($_POST['email'], $_POST['pwd'], $_POST['name'], $_POST['phone'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Check if username (email) already exists
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` = ?");
    $stmt->execute([$email]);
    if($stmt->rowCount() > 0) {
        $errMsg = "Username already exists.";
        header("Location: ./Sign Up.php?errMsg=$errMsg");
        exit();
    }

    // Insert new user into the database
    $stmt = $pdo->prepare("INSERT INTO `users` (`username`, `password`, `name`, `phoneNumber`) VALUES (?, SHA1(?), ?, ?)");
    $stmt->execute([$email, $pwd, $name, $phone]);

    // Set session variable and redirect to home page
    $_SESSION['user'] = $email;
    $id_lookup = "SELECT userID from users WHERE username = \"{$_POST['email']}\"";
	$id = $pdo->query($id_lookup)->fetch()['userID'];
	$_SESSION['id'] = $id;

    header("Location: ./Overview.php");
    exit();
} else {
    // Handle the case where required form fields are missing
    $errMsg = "Required form fields are missing.";
    header("Location: ./Sign Up.php?errMsg=$errMsg");
    exit();
}
?>
