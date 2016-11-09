<?php
	include('includes/config.php');
	include('includes/header.php');
?>

		<div class="login-form-2 center-block">
			<?php if(isset($_GET['login']) and $_GET['login'] == 'denied' || $_GET['login'] == 'empty' ) : ?>
			<div class="alert alert-danger" role="alert">
				<?php if($_GET['login'] == 'denied') : ?>
				<?php echo LOGINERROR; ?>
				<?php elseif($_GET['login'] == 'empty') : ?>
				<?php echo LOGINEMPTY; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="logo">
				<img src="images/logo.svg">
			</div>
			<div class="login-index">
				<form action="" method="post">
					<fieldset class="login-login">
							<label for="username">Username</label>
							<input type="text" placeholder="Notendanafn" class="form-control-2" name="username" value="">
							<label for="password">Password</label>
							<input placeholder="Lykilorð" type="password" class="form-control-2" name="password" value="">
							<button name="submit" value="Login">
								Skrá inn
							</button>
						</div>
					</fieldset>
				</form>
	</div>

<?php include('includes/footer.php'); ?>
