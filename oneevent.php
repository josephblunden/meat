<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$eventid = $_GET['eventid'];
		$event = new Event();
		$eventInfo = $event->getEventsById($eventid);
	};

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$commentID = $_GET['commentID'];
		$comment = new Comment();
		$commentInfo = $event->getCommentsById($commentID);
	}
	if(isset($_GET['update']) && $_GET['update'] == 'true') {
		//$commentID = $_POST['update_commentID'];
		$comments = $_POST['update_comments'];
		//$dateTime = $_POST['update_dateTime'];

		$comment = new Comment();
		$comment->updateComments($comments, $dateTime, $commentID);
	}

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$commentID = $_GET['commentID'];
		$comment = new Comment();
		$comment->deleteComment($commentID);
	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<div class="">
					<?php if(isset($_GET['updated']) && $_GET['updated'] == 'true') : ?>
						<div class="alert alert-success" role="alert">
  						<strong>Well done!</strong> You successfully update the event.
						</div>
					<?php endif; ?>
					<?php if(isset($_GET['delete']) && $_GET['delete'] == 'true') : ?>
						<div class="alert alert-danger" role="alert">
  						<strong>Well done!</strong> You successfully deleted the event.
						</div>
					<?php endif; ?>
        <h2><?php echo $eventInfo['title']; ?></h2>
        <h3><?php echo $eventInfo['eventDate']; ?></h3>
        <p>
            <?php echo $eventInfo['description']; ?>
        </p>
        <h3><?php echo $eventInfo['author']; ?></h3>
			</div>
		</div>
		</div>
	</div>
</div>
<form method='POST'>
		<input type='hidden' name='date_time' value='".<?php date('d-m-y H:i:s'); ?>."'>
		<textarea name='comments'></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
</form>
<table class="table table-striped">
	<tbody>
		<?php getComments(); ?>
	</tbody>
</table>



<?php include('includes/footer.php'); ?>
