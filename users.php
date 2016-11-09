<?php
	include('includes/config.php');
	// loginCheck();
	loginSuperCheck();

	include('includes/header.php');

	//Check if parameter exists and is set to true
	if(isset($_GET['update']) && $_GET['update'] == 'true') {
		$userid = $_POST['update_userid'];
		$firstname = $_POST['update_firstname'];
		$lastname = $_POST['update_lastname'];
		$username = $_POST['update_username'];
		$email = $_POST['update_email'];
		$password = $_POST['update_password'];
		$userRole = $_POST['update_user_role'];
		$profilePic = $_POST['update_profile_pic'];

		$user = new User();

		$user->updateUser($firstname, $lastname, $username, $password, $email, $userRole, $profilePic, $userid);
	}

	//Check if parameter exists and is set to true
	if(isset($_GET['delete']) && $_GET['delete'] == 'true') {
		$userid = $_GET['userid'];

		$user = new User();
		$user->deleteUser($userid);
	}
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
							<h3 style="margin-bottom: 20px; margin-top: 10px">Nemendur</h3>
						</div>
						
						<div class="notendayfirlit-container">
							<?php getUsers(); ?>
						</div>

						<div class="timaskraning-nemandi-container">
							<h3 style="margin-bottom: 20px; margin-top: 30px">Kennarar</h3>
						</div>
						
						<div class="notendayfirlit-container">
							<?php getUsers2(); ?>
						</div>
					
		<!-- 				</tbody>
					</table> -->
				</div>
			</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
