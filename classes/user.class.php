<?php

class User {
 private $_db;
 private $_mysqli;

 public function createUsers($username, $password, $email, $firstname, $lastname, $profilePic, $userRole) {
 	// Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

 	// prepare and bind
 	$stmt = $mysqli->prepare("INSERT INTO users(username, password, firstname, lastname, email, profile_pic, user_role_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
 	$stmt->bind_param("ssssssi", $username, $password, $firstname, $lastname, $email, $profilePic, $userRole);

 	$stmt->execute();

 	$stmt->close();
 	//mysqli->close();
  header('Location: ./dashboard.php');
 }

 public function getAllUsers() {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

  	// prepare and bind
  	$stmt = $mysqli->prepare("SELECT id, firstname, lastname, username, email, user_role_id, profile_pic FROM users");
    $stmt->execute();
    $stmt->bind_result($userid, $firstname, $lastname, $username, $email, $userRole, $profilePic);


    //var_dump($stmt);
    while ($stmt->fetch()) {
      if($userRole === 1) {
        $userRole = 'kennari-class';
      } else {
        $userRole = 'nemandi-class';
      }
      if(loginSuperCheck() == true) {
        echo '<div class="notendayfirlit-card '.$userRole.'">';
        echo '
            <h4>'.$firstname.' '.$lastname.'</h4>
            <p>'.$email.'</p>
            <div class="timaskraning-stok-takkar notendayfirlit-stok-takkar">
            <a class="timaskraning-admin-takki notendayfirlit-admin-takki" href="edituser.php?edit=true&userid='.$userid.'">Breyta</a>
            <a class="timaskraning-admin-takki notendayfirlit-admin-takki" href="studentattendance.php?student=true&userid='.$userid.'">Mæting</a>
            <a class="timaskraning-admin-takki notendayfirlit-admin-takki" href="users.php?delete=true&userid='.$userid.'">Eyða</a>
            </div>


            ';
        echo '</div>';
      } else {
        echo '<div class="notendayfirlit-card '.$userRole.'">';
        echo '
            <h4>'.$firstname.' '.$lastname.'</h4>
            <p>'.$email.'</p>
            ';
        echo '</div>';
      }

    }

 }


 public function getAllUsers2() {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

    // prepare and bind
    $stmt = $mysqli->prepare("SELECT id, firstname, lastname, username, email, user_role_id, profile_pic FROM users");
    $stmt->execute();
    $stmt->bind_result($userid, $firstname, $lastname, $username, $email, $userRole, $profilePic);


    //var_dump($stmt);
    while ($stmt->fetch()) {
      if($userRole === 1) {
        $userRole = 'kennari-class-1';
      } else {
        $userRole = 'nemandi-class-1';
      }

      if(loginSuperCheck() == true) {
        echo '<div class="notendayfirlit-card '.$userRole.'">';
        echo '
            <h4>'.$firstname.' '.$lastname.'</h4>
            <p>'.$email.'</p>
            <div class="timaskraning-stok-takkar notendayfirlit-stok-takkar">
            <a class="timaskraning-admin-takki notendayfirlit-admin-takki" href="edituser.php?edit=true&userid='.$userid.'">Breyta</a>
            <a class="timaskraning-admin-takki notendayfirlit-admin-takki" href="users.php?delete=true&userid='.$userid.'">Eyða</a>
            </div>


            ';
        echo '</div>';
      } else {
        echo '<div class="notendayfirlit-card '.$userRole.'">';
        echo '
            <h4>'.$firstname.' '.$lastname.'</h4>
            <p>'.$email.'</p>
            ';
        echo '</div>';
      }
    }

 }




// Get all user info from user table by user_id
public function getUserById($userid) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("SELECT firstname, lastname, password, username, email, user_role_id, profile_pic FROM users	WHERE id = ?");
   $stmt->bind_param('i', $userid);
   $stmt->execute();
   $stmt->bind_result($firstname, $lastname, $password, $username, $email, $userRole, $profilePic);

   // Only returning info from 1 user so I will create an array that I can easily work with on my page
   $userArr;
   while ($stmt->fetch()) {
     $userArr['firstname'] = $firstname;
     $userArr['lastname'] = $lastname;
     $userArr['password'] = $password;
     $userArr['username'] = $username;
     $userArr['email'] = $email;
     $userArr['user_role_id'] = $userRole;
     $userArr['profile_pic'] = $profilePic;
     $userArr['userid'] = $userID;
   }

  // Close connection
  $stmt->close();
  //mysqli->close();
  return $userArr;
}

public function updateUser($firstname, $lastname, $username, $password, $email, $userRole, $profilePic, $userid) {
 // Connecting to Database
 $db = $GLOBALS['gdb'];
 $mysqli = $db->getConnection();

 // prepare and bind
 $stmt = $mysqli->prepare("UPDATE users SET firstname=?, lastname=?, username=?, password=?, email=?, user_role_id=?, profile_pic=? WHERE id=?");
 $stmt->bind_param("sssssisi", $firstname, $lastname, $username, $password, $email, $userRole, $profilePic, $userid);
 $stmt->execute();

 // $stmt->close();
 // $//mysqli->close();
 // unset($mysqli);
 //header('Location: ./users.php?updated=true');
}

public function deleteUser($userid) {
 // Connecting to Database
 $db = $GLOBALS['gdb'];
 $mysqli = $db->getConnection();

 // prepare and bind
 $stmt = $mysqli->prepare("DELETE FROM users WHERE id=? LIMIT 1");
 $stmt->bind_param("i", $userid);
 $stmt->execute();

 $stmt->close();
 //$//mysqli->close();
 //header('Location: ./users.php?updated=true');
}

}
 ?>
