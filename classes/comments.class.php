<?php
class Comment {
  private $_db;
  private $_mysqli;

public function setComments($events_id, $users_id, $date_time, $comments) {
	$db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

		$stmt = $mysqli->prepare("INSERT INTO comments(events_id, users_id, date_time, comments) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("iiss", $events_id, $users_id, $date_time, $comments);

    $stmt->execute();

    $stmt->close();
    //$mysqli->close();

    //header("Location: ./oneevent.php?one=true&eventid='.$events_id.'");


}

public function getAllComments($eventID){
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

  error_log($eventID);
	$stmt = $mysqli->prepare("SELECT users_id, date_time, comments, id FROM comments WHERE events_id = ? ORDER BY date_time DESC");
  $stmt->bind_param('i', $eventID);
  $stmt->execute();
  $stmt->bind_result($userID, $dateTime, $comments, $commentID);
  $commentInfo[] = array();
$commentArr;
  while($stmt->fetch()) {
    error_log("hello ".$comments);
    $commentInfo['userID'] = $userID;
    $commentInfo['dateTime'] = $dateTime;
    $commentInfo['comments'] = $comments;
    $commentInfo['commentID'] = $commentID;
    $commentArr[] = $commentInfo;

  }
return $commentArr;

}


// Get all user info from user table by user_id
  public function getCommentsById($commentID) {
    // Connecting to Database
    $db = $GLOBALS['gdb'];
    $mysqli = $db->getConnection();

     // prepare and bind
     $stmt = $mysqli->prepare("SELECT user_id, events_id, date_time, comments FROM comments	WHERE id =?");
     $stmt->bind_param('i', $commentID);
     $stmt->execute();
     $stmt->bind_result($userID, $eventID, $dateTime, $comments);

     // Only returning info from 1 user so I will create an array that I can easily work with on my page
     $commentArr;
     while ($stmt->fetch()) {
       $commentArr['userID'] = $userID;
       $commentArr['eventID'] = $eventID;
       $commentArr['dateTime'] = $dateTime;
       $commentArr['comments'] = $comments;
       $commentArr['commentID'] = $commentID;
     }

    // Close connection
    $stmt->close();
    $mysqli->close();
    return $commentArr;
  }

  public function updateComments($comments, $dateTime, $commentID) {
   // Connecting to Database
   $db = $GLOBALS['gdb'];
   $mysqli = $db->getConnection();

   // prepare and bind
   $stmt = $mysqli->prepare("UPDATE comments SET comments=?, date_time=? WHERE id=?");
   $stmt->bind_param("ssi", $comments, $dateTime, $commentID);
   $stmt->execute();

  }
  // Deleting comments by comment id
  function deleteComment($commentID) {
    $db = $GLOBALS['gdb'];
    $mysqli = $db->getConnection();

  		$stmt = $mysqli->prepare("DELETE FROM comments WHERE id=?");
      $stmt->bind_param("i", $commentID);
  	  $stmt->execute();
  		//header("Location: ./.php");
  }

  // Deleting comments by event id
  function deleteCommentByEvents($eventID) {
    $db = $GLOBALS['gdb'];
    $mysqli = $db->getConnection();

      $stmt = $mysqli->prepare("DELETE FROM comments WHERE events_id=?");
      $stmt->bind_param("i", $eventID);
      $stmt->execute();
      //header("Location: ./.php");
  }
}

?>
