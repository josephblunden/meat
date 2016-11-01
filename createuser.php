<?php
	include('includes/config.php');


	include('includes/header.php');

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<form action="" method="post">
					<div class="form-group">
						<label for="create_username">Username</label>
						<input type="text" class="form-control" name="create_username" value="">
					</div>
					<div class="form-group">
						<label for="create_password">Password</label>
						<input type="password" class="form-control" name="create_password" value="">
					</div>
					<div class="form-group">
						<label for="create_email">Email</label>
						<input type="email" class="form-control" name="create_email" value="">
					</div>
					<div class="form-group">
						<label for="create_firstname">First name</label>
						<input type="text" class="form-control" name="create_firstname" value="">
					</div>
					<div class="form-group">
						<label for="create_lastname">Last name</label>
						<input type="text" class="form-control" name="create_lastname" value="">
					</div>
					<fieldset class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="create_user_role" value="1">
								Kennari
							</label>
						</div>
						<div class="form-check">
						<label class="form-check-label">
								<input type="radio" class="form-check-input" name="create_user_role" value="2">
								Nemandi
							</label>
						</div>
					</fieldset>
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Create User">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
