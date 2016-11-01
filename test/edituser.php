<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$userid = $_GET['userid'];
		$user = new User();
		$userInfo = $user->getUserById($userid);
	};

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<form action="users.php?update=true" method="post">
					<div class="form-group">
						<label for="update_username">Username</label>
						<input type="text" class="form-control" name="update_username" value="<?php echo $userInfo['username']; ?>">
					</div>
					<div class="form-group">
						<label for="update_password">Password</label>
						<input type="password" class="form-control" name="update_password" value="<?php echo $userInfo['password']; ?>">
					</div>
					<div class="form-group">
						<label for="update_email">Email</label>
						<input type="email" class="form-control" name="update_email" value="<?php echo $userInfo['email']; ?>">
					</div>
					<div class="form-group">
						<label for="update_firstname">First name</label>
						<input type="text" class="form-control" name="update_firstname" value="<?php echo $userInfo['firstname']; ?>">
					</div>
					<div class="form-group">
						<label for="update_lastname">Last name</label>
						<input type="text" class="form-control" name="update_lastname" value="<?php echo $userInfo['lastname']; ?>">
					</div>
					<div class="form-group">
						<label for="update_profile_pic">Profile Pic</label>
						<input type="text" class="form-control" name="update_profile_pic" value="<?php echo $userInfo['profile_pic']; ?>">
					</div>
          <fieldset class="form-group">
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="update_user_role"
								<?php if($userInfo['user_role_id'] == 1){

								?>checked="checked"<?php } ?>
									value="1">
				        Kennari
				      </label>
				    </div>
				    <div class="form-check">
				    <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="update_user_role"
								<?php if($userInfo['user_role_id'] == 2){

								?>checked="checked"<?php } ?>
										 value="2">
				        Nemandi
				      </label>
				    </div>
  				</fieldset>
					<input type="hidden" name="update_userid" value="<?php echo $userid ?>">
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update User">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
