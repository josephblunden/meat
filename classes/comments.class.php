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
    $mysqli->close();

    //header("Location: ./oneevent.php?one=true&eventid='.$events_id.'");


}

public function getAllComments(){
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();


	$stmt = $mysqli->prepare("SELECT user_id, events_id, date_time, comments, id FROM comments ORDER BY id DESC");
  $stmt->execute();
  $stmt->bind_result($userID, $eventsID, $dateTime, $comments, $commentID, );
	while ($stmt->fetch()) {
		echo "<div class='comment-box'><p>";
		echo $userID."<br>";
		echo $dateTime."<br>";
		echo nl2br($comments);
		echo "</p>
				<form class='delete-form' method='POST' action='".deleteComments()."'>
					<input type='hidden' name='id' value='".$commentID."'>
					<button name='commentDelete'>Delete</button>
				</form>

				<form class='edit-form' method='POST' action='editcomment.php'>
					<input type='hidden' name='id' value='".$commentID."'>
					<input type='hidden' name='users_id' value='".$userID."'>
					<input type='hidden' name='date_time' value='".$dateTime."'>
					<input type='hidden' name='comments' value='".$comments."'>
					<button>Edit</button>
				</form>

		</div>";
	};

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

 // $stmt->close();
 // $mysqli->close();
 //header('Location: ./users.php?updated=true');
}


function deleteComment($commentID) {
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

		$stmt = $mysqli->prepare("DELETE FROM comments WHERE id=? LIMIT 1");
    $stmt->bind_param("i", $commentID);
	  $stmt->execute();
		//header("Location: ./.php");
}
}


}


?>
