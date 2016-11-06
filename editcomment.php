
<?php
include('includes/config.php');
loginCheck();

include('includes/header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$commentID = $_GET['commentID'];
		$comment = new Comment();
		$commentInfo = $event->getCommentsById($commentID);
	};
	?>


  <form method='POST' action='../events.php?update=true'>
		<div class="form-group">
			<label for="update_comments">Title</label>
			<input type="text" class="form-control" name="update_comments" value="<?php echo $commentInfo['comments']; ?>">
		</div>
		<input type="hidden" name="update_commentID" value="<?php echo $commentID ?>">
		<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Comment">
  	</form>



<?php include('footer.php')  ?>
