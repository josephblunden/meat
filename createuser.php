<?php
	include('includes/config.php');


	include('includes/header.php');

?>
<div class="users-container">
	<div class="users">
		<div class="login-form">
			<div class="row">
				<form action="" method="post">
					<div class="form-group">
						<label for="create_username">Username</label>
						<input type="text" class="form-control" name="create_username" value="" placeholder="Notendanafn">
					</div>
					<div class="form-group">
						<label for="create_password">Password</label>
						<input type="password" class="form-control" name="create_password" value="" placeholder="Lykilorð">
					</div>
					<div class="form-group">
						<label for="create_email">Email</label>
						<input type="email" class="form-control" name="create_email" value="" placeholder="Netfang">
					</div>
					<div class="form-group">
						<label for="create_firstname">First name</label>
						<input type="text" class="form-control" name="create_firstname" value="" placeholder="Fornafn">
					</div>
					<div class="form-group">
						<label for="create_lastname">Last name</label>
						<input type="text" class="form-control" name="create_lastname" value="" placeholder="Kennitala">
					</div>
					<div class="form-group">
						<label for="create_profile_pic">Profile pic path</label>
						<input type="text" class="form-control" name="create_profile_pic" value="" placeholder="Slóð á profilemynd">
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
					<button type="submit" class="user-button" value="Create User">
					Stofna notanda
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
