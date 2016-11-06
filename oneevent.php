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

	if(isset($_GET['update']) && $_GET['update'] == 'true') {
		$commentID = $_POST['update_commentID'];
		//$comments = $_POST['update_comments'];
		$dateTime = $_POST['update_dateTime'];

		$event = new Comment();
		$event->updateComments($comments, $dateTime, $commentID);
	}

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$commentID = $_GET['commentID'];

		$event = new Comment();
		$event->deleteComment($commentID);
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
        <h2><?php echo $eventInfo['title']; ?></h2>
        <!-- <h3><?php //echo $eventInfo['eventDate']; ?></h3> -->
        <p>
            <?php echo $eventInfo['description']; ?>
        </p>
        <h3><?php echo $eventInfo['author']; ?></h3>
			</div>
		</div>
	</div>
</div>
<table class="table table-striped">
	<thead> <tr> <th>#</th> <th>Title</th> <th>Event Date</th> <th>Description</th><th>author</th></tr> </thead>
	<tbody>
		<?php getComments(); ?>
	</tbody>
</table>

<form method='POST' action='../createcomment.php'>
		<input type='hidden' name='commentID' value='<?php echo $commentInfo['commentID']; ?>'>
		<input type='hidden' name='users_id' value='<?php echo $commentInfo['userID']; ?>'>
		<input type='hidden' name='date_time' value='<?php echo $commentInfo['dateTime']; ?>'>
		<textarea name='comments'><?php echo $commentInfo['comments']; ?></textarea><br>
		<button type='submit' name='commentSubmit'>Edit</button>
	</form>

<form method='POST'>
		<input type='hidden' name='date_time' value='".date('d-m-y H:i:s')."'>
		<textarea name='comments'></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
	</form>



<?php include('includes/footer.php')  ?>
