<?php
	include('includes/config.php');
	loginCheck();
	include('includes/header.php');

	$today = date("D, F, Y");
?>


	<div class="timaskraning-container">
		<div class="timaskraning">
			<h3><?php echo $today ?></h3>
				<form action="" method="post">
					<div class="form-check">
						<label class="form-check-label">
								<input type="radio" class="form-check-input" name="create_status" value="1">
								Mætt/ur
						</label>
						</div>
						<div class="form-check">
						<label class="form-check-label">
								<input type="radio" class="form-check-input" name="create_status" value="2">
								Veik/ur
						</label>
						</div>
						<div class="form-check">
						<label class="form-check-label">
								<input type="radio" class="form-check-input" name="create_status" value="3">
								Í leyfi
						</label>
					</div>
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit">
				</form>
		</div>
	</div>

<?php include('includes/footer.php')  ?>
