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


	$stmt = $mysqli->prepare("SELECT users_id, events_id, date_time, comments, id FROM comments ORDER BY id DESC");
  $stmt->execute();
  $stmt->bind_result($userID, $eventsID, $dateTime, $comments, $commentID);
	while ($stmt->fetch()) {
		echo "<div class='comment-box'><p>";
		echo $userID;
		echo $dateTime."<br>";
		echo "<p>".$comments;
		echo "</p>
      <div class'buttons buttons-comments'>
      <a class='edit-button-a' href='editcomment.php?edit=true&commentID=".$commentID."'>
      <button class='edit-button'>Edit</button></a>
      <a class='delete-button-a' href='oneevent.php?delete=true&commentID=".$commentID."'>
      <button class='delete-button'>Delete</button></a>
      </div>



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

		$stmt = $mysqli->prepare("DELETE FROM comments WHERE id=?");
    $stmt->bind_param("i", $commentID);
	  $stmt->execute();
		//header("Location: ./.php");
}
}





?>
