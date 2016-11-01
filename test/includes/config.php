<?php
	session_start();
include('functions.php');
include('authentication.php');

//Tjékkar hvort notandi sé skráður inn
function loginCheck() {
  if($_SESSION['isLoggedin'] == false) {
    header('Location: login.php');

    return false;
  } else {
    return true;
  }
}

if(isset($_GET['logout']) && 'true' == $_GET['logout']) {
  $_SESSION['isLoggedin'] = false;

  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();
}


// Constants
define('LOGINERROR', 'Username or Password is wrong!', false);
define('LOGINEMPTY', 'Username or Password is empty!', false);


?>
