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

		<h1 >Login</h1>

		<form action="" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" value="">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" value="">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
			</div>
			<div class="">
				<a class="btn btn-primary btn-sm pull-right" style="float: right;" href="createuser.php">Create User</a>
			</div>
		</form>
	</div>
</div><!-- end row -->
</div><!-- end container -->


<?php include('includes/footer.php'); ?>
