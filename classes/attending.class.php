<?php
class Attend {
 private $_db;
 private $_mysqli;

 //Create new Attendance
 public function createNewAttendance($userid, $status, $statusTime, $statusDay) {
 	// Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

 	// prepare and bind
 	$stmt = $mysqli->prepare("INSERT INTO checkin(user_id, status, status_time, status_day) VALUES(?, ?, ?, ?)");
 	$stmt->bind_param("iiss", $userid, $status, $statusTime, $statusDay);

 	$stmt->execute();

 	$stmt->close();

 }
 // getting all attendance for logged in user
 public function getAllAttendance($userid) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

  	// prepare and bind
  	$stmt = $mysqli->prepare("SELECT id, status, status_time, status_day FROM checkin WHERE user_id=$userid ORDER BY id DESC");

    $stmt->execute();
    $stmt->bind_result($attendid, $status, $statusTime, $statusDay);

    while ($stmt->fetch()) {
      $status1 = $status;

      if($status === 1) {
        $status = 'timaskraning-maeting';
      } elseif($status === 2) {
        $status = 'timaskraning-veikindi';
      } else{
        $status = 'timaskraning-leyfi';
      }

      if($status1 === 1) {
        $status1 = 'Mætt/ur';
      } elseif($status1 === 2) {
        $status1 = 'Veik/ur';
      } else{
        $status1 = 'Í leyfi';
      }


      echo '<div class="timaskraning-stok '.$userid.' '.$status.'">';
        echo '
          <h4>'.$statusDay.'</h4>
          <p><span class="timaskraning-bold">'.$status1.'</span></p>
          <p>Skráð klukkan '.$statusTime.'</p>
          <div class="timaskraning-stok-takkar">
          <a class="timaskraning-admin-takki" href="editattendance.php?edit=true&attendid='.$attendid.'">Breyta</a>
          <a class="timaskraning-admin-takki" href="attendance.php?delete=true&attendid='.$attendid.'">Eyða</a>
          </div>
        ';
      echo '</div>';

    }
 }
 //Getting attendance for all studends by user_id
 public function getAllAttendanceForStudent($userid) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

  	// prepare and bind
  	$stmt = $mysqli->prepare("SELECT id, status, status_time, status_day FROM checkin WHERE user_id=$userid ORDER BY id DESC");
    $stmt->execute();
    $stmt->bind_result($attendid, $status, $statusTime, $statusDay);

    while ($stmt->fetch()) {
      $status1 = $status;

      if($status === 1) {
        $status = 'timaskraning-maeting';
      } elseif($status === 2) {
        $status = 'timaskraning-veikindi';
      } else{
        $status = 'timaskraning-leyfi';
      }

      if($status1 === 1) {
        $status1 = 'Mætt/ur';
      } elseif($status1 === 2) {
        $status1 = 'Veik/ur';
      } else{
        $status1 = 'Í leyfi';
      }


      echo '<div class="timaskraning-stok '.$userid.' '.$status.'">';
        echo '
          <h4>'.$statusDay.'</h4>
          <p><span class="timaskraning-bold">'.$status1.'</span></p>
          <p>Skráð klukkan '.$statusTime.'</p>
          <div class="timaskraning-stok-takkar">
          <a class="timaskraning-admin-takki" href="editattendance.php?student=true&userid='.$userid.'&edit=true&attendid='.$attendid.'">Breyta</a>
          <a class="timaskraning-admin-takki" href="studentattendance.php?student=true&userid='.$userid.'&delete=true&attendid='.$attendid.'">Eyða</a>
          </div>
        ';
      echo '</div>';

    }
 }
 // Gett all attendance for user for display on dashboard
 public function getAllAttendanceDash($userid) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("SELECT id, status, status_time, status_day FROM checkin WHERE user_id=$userid ORDER BY id DESC");
   $stmt->execute();
   $stmt->bind_result($attendid, $status, $statusTime, $statusDay);

    while ($stmt->fetch()) {
      $status1 = $status;

      if($status === 1) {
        $status = 'timaskraning-maeting';
      } elseif($status === 2) {
        $status = 'timaskraning-veikindi';
      } else{
        $status = 'timaskraning-leyfi';
      }

      if($status1 === 1) {
        $status1 = 'Mætt/ur';
      } elseif($status1 === 2) {
        $status1 = 'Veik/ur';
      } else{
        $status1 = 'Í leyfi';
      }

      echo '<div class="timaskraning-stok '.$status.'">';
        echo '
          <h4>'.$statusDay.'</h4>
          <p>'.$statusTime.'</p>
          <p>'.$status1.'</p>
        ';
      echo '</div>';

    }
 }
// Get all user attendance from checkin table by user_id
public function getAttendanceById($userid) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("SELECT id, status, status_time, status_day FROM checkin	WHERE user_id = ?");
   $stmt->bind_param('i', $userid);
   $stmt->execute();
   $stmt->bind_result($attendID, $status, $statusTime, $statusDay);

   // Only returning info from 1 user so I will create an array that I can easily work with on my page
   $attendArr;
   while ($stmt->fetch()) {
     $attendArr['status'] = $status;
     $attendArr['statusTime'] = $statusTime;
     $attendArr['statusDay'] = $statusDay;
     $attendArr['attendID'] = $attendID;

   }

  // Close connection
  $stmt->close();
  // $//mysqli->close();
  return $attendArr;
}
public function getAttendanceByAttendId($attendID) {
  // Connecting to Database
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("SELECT status, status_time, status_day FROM checkin	WHERE id = ?");
   $stmt->bind_param('i', $attendID);
   $stmt->execute();
   $stmt->bind_result($status, $statusTime, $statusDay);

   // Only returning info from 1 user so I will create an array that I can easily work with on my page
   $attendInfo;
   while ($stmt->fetch()) {
     $attendInfo['attendID'] = $attendID;
     $attendInfo['status'] = $status;
     $attendInfo['status_time'] = $statusTime;
     $attendInfo['status_day'] = $statusDay;
   }

  // Close connection
  $stmt->close();

  return $attendInfo;
}
// uppdate atendance
public function updateAttendance($status, $attendid) {
 // Connecting to Database
 $db = $GLOBALS['gdb'];
 $mysqli = $db->getConnection();
error_log($status);
error_log($attendid);
 // prepare and bind
 $stmt = $mysqli->prepare("UPDATE checkin SET status=? WHERE id=?");
 $stmt->bind_param("ii", $status, $attendid);
 $stmt->execute();

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

}

}
 ?>
