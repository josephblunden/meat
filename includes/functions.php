<?php
include('./classes/classes.php');
//---------------------   Users  ---------------------------------

	if(isset($_POST['create_username']) && !empty($_POST['create_username']) && isset($_POST['create_password']) && !empty($_POST['create_password'])) {
		$username = $_POST['create_username'];
		$password = $_POST['create_password'];
		$email = $_POST['create_email'];
		$firstname = $_POST['create_firstname'];
		$lastname = $_POST['create_lastname'];
		$profilePic = $_POST['create_profile_pic'];
		$userRole = $_POST['create_user_role'];

		$user = new User();
		$user->createUsers($username, $password, $email, $firstname, $lastname, $profilePic, $userRole);
	}
	// Geting all the users from user.class.php gettAllUsers()
  function getUsers() {
  	$alluser = new User();
  	$alluser->getAllUsers();
  }
//---------------------   Events ---------------------------------

//
if(isset($_POST['create_event_name']) && !empty($_POST['create_event_name'])) {
	$eventName = $_POST['create_event_name'];
	$eventDate = $_POST['create_event_date'];
	$eventDesc = $_POST['create_event_desc'];
	$authorName = $_SESSION['firstname']['lastname'];
	$event = new Event();
	$event->createEvent($eventName, $eventDate, $eventDesc, $authorName);
}
// Geting all the users from user.class.php gettAllUsers()
function getEvents() {
	$alluser = new Event();
	$alluser->getAllEvents();
}


//---------------------   Attending ---------------------------------

$_POST['todayTime'] = date("F j, Y, g:i a");
$GLOBALS['status'] = 0;
if(isset($_POST['create_status']) && !empty($_POST['create_status'])) {
	$GLOBALS['status'] = $_POST['create_status'];
	$statusTime = $_POST['todayTime'];
	$event = new Attend();
	$event->createNewAttendance($GLOBALS['status'], $statusTime);
}
function getAttend() {
	$alluser = new Attend();
	$alluser->getAllAttendance();
}


?>
