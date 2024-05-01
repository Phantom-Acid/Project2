<!--This PHP script initiates a session, clears all session variables, destroys the session, deletes the session cookie, and then redirects the user to a login page (assuming there's one at "./Login.php"). This is commonly used for logging users out of a web application. -->


<?php 
session_start();
$_SESSION = array();
setcookie(session_name(), "", time()-2592000, "/");
session_destroy();
header('Location: ./Login.php');
?>