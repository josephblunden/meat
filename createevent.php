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
						<label for="create_event_name">Nafn Viðburðar</label>
						<input type="text" class="form-control" name="create_event_name" value="">
					</div>
					<div class="form-group">
						<label for="create_event_date">Dagsetnign</label>
						<input type="datetime-local" class="form-control" name="create_event_date" value="">
					</div>
					<div class="form-group">
						<label for="create_event_desc">Lýsing á Viðburði</label>
						<input type="text" class="form-control" name="create_event_desc" value="">
					</div>
					<div class="form-group">
						<label for="create_event_location">Staðsetning</label>
						<input type="text" class="form-control" name="create_event_location" value="">
					</div>
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Create Event">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
