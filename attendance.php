<?php
	include('includes/config.php');
	loginSuperCheck();
	include('includes/header.php');

	//Check if parameter exists and is set to true
	if(isset($_GET['update']) && $_GET['update'] == 'true') {
		$attendid = $_POST['update_attendid'];
		$status = $_POST['update_status'];

		$user = new Attend();
		$user->updateAttendance($status, $attendid);
	}

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$attendid = $_GET['attendid'];

		$attend = new Attend();
		$attend->deleteAttendance($attendid);
	};
	// var_dump($_SESSION['user_role_id']);
?>

<div class="timaskraning-container">
		<div class="timaskraning">
			<div class="row">
				<div class="">
					<?php if(isset($_GET['updated']) && $_GET['updated'] == 'true') : ?>
						<div class="alert alert-success" role="alert">
  						<strong>Well done!</strong> You successfully update the user.
						</div>
					<?php endif; ?>
					<?php if(isset($_GET['delete']) && $_GET['delete'] == 'true') : ?>
						<div class="alert alert-danger" role="alert">
  						<strong>Well done!</strong> You successfully deleted the user.
						</div>
					<?php endif; ?>
						<div class="timaskraning-nemandi-container">
							<?php
								echo '<h3 style="margin-bottom: 20px; margin-top: 10px;">Nemandi: '.$_SESSION['firstname'].'</h3>';
							?>
						</div>
						<div class="timaskraning-nemandi-container">
							<?php getAttend(); ?>
						</div>
				</div>
			</div>
	</div>
</div>


<?php include('includes/footer.php')  ?>
