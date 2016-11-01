<?php
	include('includes/config.php');
	include('includes/header.php');
?>
<div class="container-fluid">
	<div class="row">
		<div class="login-form center-block">
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

		<div class="login">
			<form action="" method="post">
				<fieldset>
						<label for="username">Username</label>
						<input type="text" placeholder="Notendanafn" class="form-control" name="username" value="">

						<label for="password">Password</label>
						<input placeholder="Lykilorð" type="password" class="form-control" name="password" value="">

						<button name="submit" value="Login">
							Skrá inn
						</button>
	
					</div>
					<div class="">
						<a class="btn btn-primary btn-sm pull-right" style="float: right;" href="createuser.php">Create User</a>
					</div>
				</fieldset>
			</form>
		</div>

		
	</div>
</div><!-- end row -->
</div><!-- end container -->


<?php include('includes/footer.php'); ?>
