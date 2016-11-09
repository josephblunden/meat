<?php
	include('includes/config.php');


	include('includes/header.php');

?>
<div class="event-container">
	<div class="event">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<form action="" method="post">
					<div class="form-group">
						<label for="create_event_name">Nafn Viðburðar</label>
						<input type="text" class="form-control" name="create_event_name" value="" placeholder="Nafn Viðburðar">
					</div>
					<div class="form-group">
						<label for="create_event_date">Dagsetning</label>
						<input type="text" class="form-control" name="create_event_date" value="" placeholder="Dagsetning">
					</div>
					<div class="form-group">
						<label for="create_event_desc">Lýsing á Viðburði</label>
						<textarea cols="40" rows="5" type="text" class="form-control" id="event_desc" name="create_event_desc" value="" placeholder="Lýsing á Viðburði"></textarea>
					</div>
					<div class="form-group">
						<label for="create_event_img">Mynd</label>
						<input type="text" class="form-control" name="create_event_img" value="" placeholder="Slóð á Mynd">
					</div>

					<input type="submit" class="event-button" value="Create Event">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
