<?php
	include('includes/config.php');

	loginCheck();

	include('includes/header.php');

	//Check if parameter exists and is set to true
	if(isset($_GET['one']) && $_GET['one']) {
		$eventid = $_GET['eventid'];
		$event = new Event();
		$eventInfo = $event->getEventsById($eventid);
	}

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$commentID = $_GET['commentID'];
		$comment = new Comment();
		$comment->deleteComment($commentID);
	}
?>
<div class="oneevent-container">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
					<?php if(isset($_GET['delete']) && $_GET['delete'] == 'true') : ?>
						<div class="alert alert-danger" role="alert">
  						<strong>Well done!</strong> You successfully deleted the event.
						</div>
					<?php endif; ?>
			<div class="event-container">
        <h2><?php echo $eventInfo['title']; ?></h2>
        <h3><?php echo $eventInfo['eventDate']; ?></h3>
        <p><?php echo $eventInfo['description']; ?></p>
        <h3><?php echo $eventInfo['author']; ?></h3>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="comment-post">
<form method='POST'>
		<input type='hidden' name='date_time' value='".<?php date('d-m-y H:i:s'); ?>."'>
		<textarea name='comments'></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
</form>
</div>
<div class="comment-container">
	<?php
		$GLOBALS['eventID'] = $_GET['eventid'];
		error_log('function.php '.$GLOBALS['eventID']);
		$allComments = new Comment();
		$commentArr = $allComments->getAllComments($GLOBALS['eventID']);
		for ($i=0; $i < count($commentArr); $i++) {
	?>
<table class="table table-striped">
	<tbody>
		<div class='comment-box'>
			<div class="upper-comment">
				<div class="userid-comment">
					<?php
						echo $commentArr[$i]['userID']."<br/>";
					?>
				</div>
				<div class="date-comment">
					<?php
						echo $commentArr[$i]['dateTime']."<br/>";
					?>
				</div>
			</div>
			<p>
				<?php
					echo $commentArr[$i]['comments']."<br/>";
				?>
			</p>
			<div class'buttons buttons-comments'>
				<a class='delete-button-a' href='oneevent.php?delete=true&commentID=".$commentID."'>
					<button class='delete-button'>Delete</button>
				</a>
			</div>
		</div>
	</tbody>
</table>
<?php }?>
</div>
</div>

<?php include('includes/footer.php'); ?>
