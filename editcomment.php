
<?php
	include('config.php');

	include('header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$commentID = $_GET['commentID'];
		$comment = new Comment();
		$commentInfo = $event->getCommentsById($commentID);
	};
	?>


  <form method='POST' action='../createcomment.php'>
  		<input type='hidden' name='commentID' value='<?php echo $commentInfo['commentID']; ?>'>
  		<input type='hidden' name='users_id' value='<?php echo $commentInfo['userID']; ?>'>
  		<input type='hidden' name='date_time' value='<?php echo $commentInfo['dateTime']; ?>'>
  		<textarea name='comments'><?php echo $commentInfo['comments']; ?></textarea><br>
  		<button type='submit' name='commentSubmit'>Edit</button>
  	</form>



<?php include('footer.php')  ?>
