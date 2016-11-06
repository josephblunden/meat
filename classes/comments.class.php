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


	$stmt = $mysqli->prepare("SELECT * FROM comments ORDER BY id DESC");
  $stmt->execute();

	while ($row = $stmt->fetch()) {
		echo "<div class='comment-box'><p>";
		echo $row['users_id']."<br>";
		echo $row['date_time']."<br>";
		echo nl2br($row['comments']);
		echo "</p>
				<form class='delete-form' method='POST' action='".deleteComments()."'>
					<input type='hidden' name='id' value='".$row['id']."'>
					<button name='commentDelete'>Delete</button>
				</form>

				<form class='edit-form' method='POST' action='editcomment.php'>
					<input type='hidden' name='id' value='".$row['id']."'>
					<input type='hidden' name='users_id' value='".$row['users_id']."'>
					<input type='hidden' name='date_time' value='".$row['date_time']."'>
					<input type='hidden' name='comments' value='".$row['comments']."'>
					<button>Edit</button>
				</form>

		</div>";
	};

}

function editComments($commentID) {
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

	if(isset($_POST['commentSubmit'])){
		$events_id = $_POST['events_id'];
		$users_id = $_POST['users_id'];
		$date_time = $_POST['date_time'];
		$comments = $_POST['comments'];

		$stmt = $mysqli->prepare("UPDATE comments SET comments='$comments' WHERE id='$commentID'");
    $stmt->execute();
		header("Location: ./oneevent.php");
	}

}


function deleteComments($commentID) {
  $db = $GLOBALS['gdb'];
  $mysqli = $db->getConnection();

	if(isset($_POST['commentDelete'])){
		$commentID = $_POST['id'];

		$stmt = $mysqli->prepare("DELETE FROM comments WHERE id=?");
    $stmt->bind_param("i", $commentID);
	  $stmt->execute();
		header("Location: ./oneevent.php");
}
}


}
// if(isset($_POST['commentSubmit'])){
// editComments($commentID);
// }
//
// if(isset($_POST['commentDelete'])){
// 	deleteComments($commentID);
// }

?>
