<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	//Check if parameter exists and is set to true
	if(isset($_GET['update']) && $_GET['update'] == 'true') {
		$eventid = $_POST['update_eventid'];
		$tilte = $_POST['update_title'];
		$eventDate = $_POST['update_event_date'];
		$description = $_POST['update_description'];
		$author = $_POST['update_author'];
		$eventImg = $_POST['update_image'];

		$event = new Event();
		$event->updateEvents($eventid, $tilte, $eventDate, $description, $author, $eventImg);
	}

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$eventid = $_GET['eventid'];

		$event = new Event();
		$event->deleteEvent($eventid);
	}
?>
<div class="container-fluid">
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
					<table class="table table-striped">
						<thead> <tr> <th>#</th> <th>Title</th> <th>Event Date</th> <th>Description</th><th>author</th></tr> </thead>
						<tbody>
							<?php getEvents(); ?>
						</tbody>
					</table>
				</div>
			</div>
	</div>
</div>

<?php include('includes/footer.php')  ?>
