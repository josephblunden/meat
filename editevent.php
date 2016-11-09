<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$eventid = $_GET['eventid'];
		$event = new Event();
		$eventInfo = $event->getEventsById($eventid);
	};

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<form action="events.php?update=true" method="post">
					<div class="form-group">
						<label for="update_title">Title</label>
						<input type="text" class="form-control" name="update_title" value="<?php echo $eventInfo['title']; ?>">
					</div>
					<div class="form-group">
						<label for="update_event_date">Event Date</label>
						<input type="datetime-local" class="form-control" name="update_event_date" value="<?php echo $eventInfo['event_date']; ?>">
					</div>
					<div class="form-group">
						<label for="update_description">Description</label>
						<input type="text" class="form-control" name="update_description" value="<?php echo $eventInfo['description']; ?>">
					</div>
					<div class="form-group">
						<label for="update_author">Author</label>
						<input type="text" class="form-control" name="update_author" value="<?php echo $eventInfo['author']; ?>">
					</div>
					<div class="form-group">
						<label for="update_image">Mynd</label>
						<input type="text" class="form-control" name="update_image" value="<?php echo $eventInfo['eventImg']; ?>">
					</div>
					<input type="hidden" name="update_eventid" value="<?php echo $eventid ?>">
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Event">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
