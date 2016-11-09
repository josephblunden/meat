<?php
	include('includes/config.php');

	loginCheck();

	include('includes/header.php');

	//Check if parameter exists and is set to true
	if((isset($_GET['one']) && $_GET['one']) || (isset($_GET['delete']) && $_GET['delete'] == 'true')) {
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
<div class="vidburdur-stakur-info-container">
	<div class="vidburdur-stakur-info">
		<?php echo '
			<img class="vidburdur-stakur-mynd" src="'.$eventInfo['eventImg'].'">
			<h2 class="vidburdur-nafn-fyrirsogn">'.$eventInfo['title'].'</h2>
			<h4>'.$eventInfo['eventDate'].'</h4>
			<p>'.$eventInfo['description'].'</p>

		' ?>
	</div>
</div>

	<div class="vidburdur-stakur-info-container">
		<div class="vidburdur-stakur-info">


			<?php if(loginSuperCheck()==true) { echo '    <a class="edit-button-a" href="editevent.php?edit=true&eventid='.$eventid.'">
					<button class="edit-button">Edit</button>
				</a>
				<a class="delete-button-a" href="events.php?delete=true&eventid='.$eventid.'">
					<button class="delete-button">Delete</button>
				</a>'; }; ?>





			
		</div>
	</div>
		
<div class="vidburdur-stakur-info-container-bakgrunnslaust">
	<div class="vidburdur-stakur-info">
		<div class="comment-post">
			<form class="comment-form-form" method='POST'>
			<input type='hidden' name='date_time' value='".<?php date('d-m-y H:i:s'); ?>."'>
			<textarea placeholder="Athugasemd við viðburð" name='comments'></textarea><br>
			<button type='submit' name='commentSubmit'>Comment</button>
			</form>
		</div>
	</div>
</div>


<?php
		$GLOBALS['eventID'] = $_GET['eventid'];
		$allComments = new Comment();
		$commentArr = $allComments->getAllComments($GLOBALS['eventID']);
		for ($i=0; $i < count($commentArr); $i++) {
	?>




<div class="comment-single-container">
	<div class="comment-stakur-info">
	<div class="comment-first-name">
		<?php 
			$userid = $commentArr[$i]['userID'];
                    $user = new User();
                    $userInfo = $user->getUserById($userid);
                        echo '<p class="comment-first-name-name">'.$userInfo['firstname'].'</p>';
		?>

	<?php
			echo $commentArr[$i]['dateTime']."<br/>";
		?>

	</div>

	
	<p class="vidburdur-comment-comment">
		<?php
			echo $commentArr[$i]['comments']."<br/>";
		?>
	</p>


	

				

	<div class'buttons buttons-comments'>
					<?php if(loginSuperCheck()==true) { echo '<a class="delete-button-a" href="oneevent.php?delete=true&commentID='.$commentArr[$i]['commentID'].'&eventid='.$eventid.'">
					<button class="delete-button delete-comment-button">Delete</button>
				</a>'; }; ?>
	</div>
	</div>
</div>

<?php }?>
<!-- 
</div>
</div> -->

<?php include('includes/footer.php'); ?>
