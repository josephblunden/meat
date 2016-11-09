<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	if(isset($_GET['edit']) && $_GET['edit'] == 'true') {
		$attendID = $_GET['attendid'];
		$userid = $_SESSION['userid'];
		error_log($_SESSION['userid']);
		$attend = new Attend();
		$attendInfo = $attend->getAttendanceById($userid);
	};

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
				<form action="attendance.php?update=true" method="post">
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
					<input type="hidden" name="update_attendid" value="<?php echo $_GET['attendid']; ?>">
					<input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Attend">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
