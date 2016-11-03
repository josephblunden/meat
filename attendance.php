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
	var_dump($_SESSION['user_role_id']);
?>

<div class="container-fluid">
		<div class="col-md-9 p-a-3">
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
					<table class="table table-striped">
						<thead> <tr> <th>#</th> <th>Status</th> <th>Time Created</th> <th>First Name</th><th>Action</th> </tr> </thead>
						<tbody>
							<?php getAttend(); ?>
						</tbody>
					</table>
				</div>
				<div class="">
					<a class="btn btn-primary btn-sm pull-right" style="float: right;" href="createuser.php">Create User</a>
				</div>
			</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
