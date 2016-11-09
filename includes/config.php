<?php
session_start();

include('functions.php');
include('authentication.php');

//Tjékkar hvort notandi sé skráður inn
function loginCheck() {
        if ($_SESSION['isLoggedin'] == false) {
            header('Location: login.php');
        } else {
            return true;
        }
}
    //Tjékkar hvort superuser sé skráður inn
function loginSuperCheck() {
    if ($_SESSION['isLoggedin'] == false || $_SESSION['user_role_id'] != 1) {

        header('Location: dashboard.php');
    } else {
        return true;
    }
}

if (isset($_GET['logout']) && 'true' == $_GET['logout']) {
    $_SESSION['isLoggedin'] = false;

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('Location: login.php');
}

// Constants
define('LOGINERROR', 'Username or Password is wrong!', false);
define('LOGINEMPTY', 'Username or Password is empty!', false);


?>
