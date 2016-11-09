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
        $userRole = '<span class="tag tag-success">Kennari</span>';
      } else {
        $userRole = '<span class="tag tag-warning">Nemandi</span>';
      }

    //   echo '<div>';
    //     echo '<th scope="row"><td class="users-profile-picture-td"><img src="'.$profilePic.'" alt="profile pic" height="50" width="50"></td> <td class="users-name-td">' .$firstname.' '.$lastname. ' </td> <td>' .$username.'</td><td>' .$email.'</td><td>' .$userRole.'</td><td><a class="edit-button-a" href="edituser.php?edit=true&userid='.$userid.'"><button class="edit-button">Edit</button></a><a class="delete-button-a" href="users.php?delete=true&userid='.$userid.'"><button class="delete-button">Delete</button></a></td>';
    //   echo '</div>';
    // }

      echo '<div class="notendayfirlit-card">';
        echo '
          <h4>'.$firstname.' '.$lastname.'</h4>
          <img class="notendayfirlit-img" src="'.$profilePic.'" alt="'.$firstname.'">
          <p>'.$email.'</p>
          <p>'.$username.'</p>
          <p>'.$userRole.'</p>
          <p></p>
          <p></p>
          <div class="timaskraning-stok-takkar">
          <a class="timaskraning-admin-takki" href="editattendance.php?edit=true&attendid='.$attendid.'">Breyta</a>
          <a class="timaskraning-admin-takki" href="attendance.php?delete=true&attendid='.$attendid.'">Eyða</a>
          </div>


        ';
      echo '</div>';
    }

    //  echo '<div class="timaskraning-stok '.$status.'">';
    //     echo '
    //       <h4>'.$statusDay.'</h4>
    //       <p><span class="timaskraning-bold">'.$status1.'</span></p>
    //       <p>Skráð klukkan '.$statusTime.'</p>
    //       <div class="timaskraning-stok-takkar">
    //       <a class="timaskraning-admin-takki" href="editattendance.php?edit=true&attendid='.$attendid.'">Breyta</a>
    //       <a class="timaskraning-admin-takki" href="attendance.php?delete=true&attendid='.$attendid.'">Eyða</a>
    //       </div>
    //     ';
    //   echo '</div>';

    // }

   /**
     * Close connection
   */
  //  $stmt->close();
  //  $//mysqli->close();
  //  unset($mysqli);

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
