<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$attendid = $_GET['attendid'];
		$attend = new Attend();
		$attendInfo = $attend->getAttendanceById($attendid);
	};

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<form action="attendance.php?update=true" method="post">
					<div class="form-group">
						<label for="update_status_time">Time</label>
						<input type="text" class="form-control" name="update_status_time" value="<?php echo $attendInfo['status_time']; ?>">
					</div>
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="update_status"
								<?php if($attendInfo['status'] == 1){

								?>checked="checked"<?php } ?>
									value="1">
				        Mætt/ur
				      </label>
				    </div>
				    <div class="form-check">
				    <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="update_status"
								<?php if($attendInfo['status'] == 2){

								?>checked="checked"<?php } ?>
										 value="2">
				        Veik/ur
				      </label>
				    </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="update_status"
                <?php if($attendInfo['status'] == 3){

                ?>checked="checked"<?php } ?>
                     value="3">
                Í Leyfi
              </label>
            </div>
					<input type="hidden" name="update_attendid" value="<?php echo $attendid ?>">
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Attend">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
