<?php
class Attend {
 private $_db;
 private $_mysqli;

 public function createNewAttendance($userid, $status, $statusTime) {
 	// Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

 	// prepare and bind
 	$stmt = $mysqli->prepare("INSERT INTO checkin(user_id, status, status_time) VALUES(?, ?, ?)");
 	$stmt->bind_param("iis", $userid, $status, $statusTime);

 	$stmt->execute();

 	$stmt->close();
 	$mysqli->close();
  //header('Location: ./dashboard.php');

 }

 public function getAllAttendance($userid) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

  	// prepare and bind
  	$stmt = $mysqli->prepare("SELECT id, status, status_time FROM checkin WHERE user_id=$userid");
    $stmt->execute();
    $stmt->bind_result($attendid, $status, $statusTime);


    //var_dump($stmt);
    while ($stmt->fetch()) {
      if($status === 1) {
        $status = '<span class="tag tag-success">Mætt/ur</span>';
      } elseif($status === 2) {
        $status = '<span class="tag tag-warning">Veik/ur</span>';
      } else{
        $status = '<span class="tag tag-warning">Í leyfi</span>';
      }

      echo '<tr>';
        echo '<th scope="row">' .$attendid. ' <td>' .$status. '</td> <td>' . $statusTime.'</td><td>' .$_SESSION['firstname'].'</td><td><a class="edit-button-a" href="editattendance.php?edit=true&attendid='.$attendid.'"><button class="edit-button">Edit</button></a><a class="delete-button-a" href="attendance.php?delete=true&attendid='.$attendid.'"><button class="delete-button">Delete</button></a></td>';
      echo '</tr>';
    }

   /**
     * Close connection
   */
  //  $stmt->close();
  //  $mysqli->close();
  //  unset($mysqli);

 }
// Get all user info from user table by user_id
public function getAttendanceById($userid) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("SELECT status, status_time FROM checkin	WHERE user_id = ?");
   $stmt->bind_param('i', $userid);
   $stmt->execute();
   $stmt->bind_result( $status, $statusTime);

   // Only returning info from 1 user so I will create an array that I can easily work with on my page
   $attendArr;
   while ($stmt->fetch()) {
     $attendArr['status'] = $status;
     $attendArr['status_time'] = $statusTime;

   }

  // Close connection
  $stmt->close();
  $mysqli->close();
  return $attendArr;
}

public function updateAttendance($status, $statusTime, $attendid) {
 // Connecting to Database
 $db = $GLOBALS['gdb'];
 $mysqli = $db->getConnection();

 // prepare and bind
 $stmt = $mysqli->prepare("UPDATE checkin SET status=?, status_time=? WHERE id=?");
 $stmt->bind_param("isi", $status, $statusTime, $attendid);
 $stmt->execute();

 // $stmt->close();
 // $mysqli->close();
 //header('Location: ./users.php?updated=true');
}

public function deleteAttendance($attendid) {
 // Connecting to Database
 $db = $GLOBALS['gdb'];
 $mysqli = $db->getConnection();

 // prepare and bind
 $stmt = $mysqli->prepare("DELETE FROM checkin WHERE id=? LIMIT 1");
 $stmt->bind_param("i", $attendid);
 $stmt->execute();

 $stmt->close();
 //$mysqli->close();
 //header('Location: ./users.php?updated=true');
}

}
 ?>
