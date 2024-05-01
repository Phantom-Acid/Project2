<!--What does it do: This PHP script handles user authentication using session management and a database. It starts a session, connects to a database using functions defined in 'dbFuncs.php', retrieves user credentials from a form submission ($_POST), executes a SQL query to check if the entered username and password match any records in the 'customers' table, and then redirects the user accordingly based on the authentication result. If the credentials are valid, it sets a session variable 'user' with the username and redirects to a menu page; otherwise, it redirects back to the login page with an error message.-->


<?php 
session_start();
require_once 'dbFuncs.php';

$pdo = connectDB();
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$sql = "SELECT * FROM `users` WHERE `username` = \"$email\" AND `password` = SHA1(\"$pwd\");";
$result = $pdo->query($sql);
$row = $result->rowCount();
if($row == 0)
{
	echo "Invalid Username or Password";
	header("Location: ./Login.php?errMsg=Invalid Username or Password, Try again.");
}
else
{
	$id_lookup = "SELECT userID from users WHERE username = \"{$_POST['email']}\"";
	$id = $pdo->query($id_lookup)->fetch()['userID'];
	$_SESSION['id'] = $id;

	$_SESSION['user'] = $email;
	header("Location: ./Overview.php");
}


?>