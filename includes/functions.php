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
	$eventImg = $_POST['create_event_img'];
	$authorFirstName = $_SESSION['firstname'];
	$authorFirstName = $_SESSION['lastname'];
	$event = new Event();
	$event->createEvent($eventName, $eventDate, $eventDesc, $authorFirstName, $authorFirstName, $eventImg);
}
// Geting all the users from user.class.php gettAllUsers()
function getEvents() {
	$alluser = new Event();
	$alluser->getAllEvents();
}
function deleteEventAndCommnets($eventID) {
        $allComments = new Comment();
        $allComments->deleteCommentByEvents($eventID);
				$allEvents = new Event();
        $allEvents->deleteEvent($eventID);
    }

//---------------------   Attending ---------------------------------

$_POST['todayDay'] = date("j F, Y");
$_POST['todayTime'] = date("g:i a");
$GLOBALS['status'] = 0;
if(isset($_POST['create_status']) && !empty($_POST['create_status'])) {
	$GLOBALS['status'] = $_POST['create_status'];
	$statusTime = $_POST['todayTime'];
	$statusDay = $_POST['todayDay'];
	$event = new Attend();
	$event->createNewAttendance($_SESSION['userid'], $GLOBALS['status'], $statusTime, $statusDay);
}
function getAttend() {
	$alluser = new Attend();
	$alluser->getAllAttendance($_SESSION['userid']);
}
function getAttendDashboard() {
	$alluser = new Attend();
	$alluser->getAllAttendanceDash($_SESSION['userid']);
}


//---------------------   Comments ---------------------------------
$_POST['todayTimeComment'] = date("j F, Y g:i a");
if(isset($_POST['commentSubmit'])){
	$events_id = $_GET['eventid'];
	$date_time = $_POST['todayTimeComment'];
	$comments = $_POST['comments'];
	$comment = new Comment();
	$comment->setComments($_GET['eventid'], $_SESSION['userid'], $date_time, $comments);
}

// function getComments() {
// 	$GLOBALS['eventID'] = $_GET['eventid'];
// 	error_log('function.php '.$GLOBALS['eventID']);
// 	$allComments = new Comment();
// 	$allComments->getAllComments($GLOBALS['eventID']);
// }
?>
