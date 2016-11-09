<?php
	include('includes/config.php');
	//loginCheck();
	loginSuperCheck();
	include('includes/header.php');

	//Check if parameter exists and is set to true
	if(isset($_GET['update']) && $_GET['update'] == 'true') {
		$attendid = $_POST['update_attendid'];
		$status = $_POST['update_status'];
    $statusTime = $_POST['update_status_time'];

		$user = new Attend();

		$user->updateAttendance($status, $statusTime, $attendid);
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
					<!-- <table class="table table-striped">
						<thead> <tr> <th>Nemandi</th> <th>Skráning</th> <th>Tímastimpill</th><th>Aðgerðir</th> </tr> </thead>
						<tbody> -->
						<div class="timaskraning-nemandi-container">
							<?php 
								echo '<h3 style="margin-bottom: 20px; margin-top: 10px;">Nemandi: '.$_SESSION['firstname'].'</h3>';
							?>
						</div>
						<div class="timaskraning-nemandi-container">
							<?php getAttend(); ?>
						</div>
					
		<!-- 				</tbody>
					</table> -->
				</div>
			</div>
	</div>
</div>

<!-- Modal HTML embedded directly into document -->
  <div id="ex1" style="display:none;">
    <p>Thanks for clicking.  That felt good.  <a href="#" rel="modal:close">Close</a> or press ESC</p>
  </div>

   <!-- Link to open the modal -->
  <p><a href="#ex1" rel="modal:open">Open Modal</a></p>


<!-- <div class="">
					<a class="btn btn-primary btn-sm pull-right" style="float: right;" href="createuser.php">Create User</a>
				</div> -->
<?php include('includes/footer.php')  ?>
