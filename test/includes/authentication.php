<?php
  // include('functions.php');

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
}
function loginUserCheck($username, $password){
  $db = Database::getInstance();
  $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("SELECT username, password, firstname FROM users");
   $stmt->execute();
   $stmt->bind_result($_username, $_password, $_firstname);
   while ($stmt->fetch()) {
     if ($username == $_username && $password == $_password) {
      $_SESSION['isLoggedin'] = true;
			$_SESSION['firstname'] = $_firstname;
       header('Location: dashboard.php');
       break;
     }  else {
         $_SESSION['isLoggedin'] = false;
         header('Location: ../login.php?login=denied');
       }
   }
   $stmt->close();
   $mysqli->close();
}

  if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	if($username != '' and $password != '') {
		loginUserCheck($username, $password);
	} else {

		$_SESSION['isLoggedin'] = false;
		header('Location: ../login.php?login=empty');

	}
}
?>
