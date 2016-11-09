<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$eventID = $_GET['eventid'];
		deleteEventAndCommnets($eventID);
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
					<div class="vidburdir-yfirlit-container">
						<div class="vidburdir-yfirlit">
							<div class="vidburdir-card-container">
								<?php getEvents(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

<?php include('includes/footer.php')  ?>
