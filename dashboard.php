<?php
	include('includes/config.php');
	loginCheck();
	include('includes/header.php');

	$today = date("D, F, Y");
?>


	<div class="timaskraning-container">
		<div class="timaskraning">
			<h3><?php echo $today ?></h3>
			<?php if ($GLOBALS['status'] == 0) { ?>
				<form class="timaskraning-form" action="" method="POST">
					<div class="form-check form-check-maeting">
						<label class="form-check-label">
								<button type="radio" class="form-check-input" name="create_status" value="1">
								Mætt/ur
								</button>
						</label>
						</div>
						<div class="form-check form-check-veikindi">
						<label class="form-check-label">
								<button type="radio" class="form-check-input" name="create_status" value="2">
								Veik/ur
								</button>
						</label>
						</div>
						<div class="form-check form-check-leyfi">
						<label class="form-check-label">
								<button type="radio" class="form-check-input" name="create_status" value="3">
								Í leyfi
								</button>

						</label>
					</div>
				</form>
				<?php
				    }
				    else {
				        echo "<div class='form-check-svar'>Mæting skráð</div>";
				 } ?>
				 <div id="contactResponse"></div>


		</div>
	</div>
	<div class="vidburdir-yfirlit-container">
		<div class="vidburdir-yfirlit">
			<div class="vidburdir-card-container">
				<?php getEvents(); ?>
			</div>
		</div>
	</div>
		<div class="timaskraning-container">
			<div class="timaskraning">
				<div class="row">
					<div class="">
						<div class="timaskraning-nemandi-container">
							<?php getAttendDashboard(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>



	  <!-- Modal HTML embedded directly into document -->
<!--   <div id="ex1" style="display:none;">
    <p>Thanks for clicking.  That felt good.  <a href="#" rel="modal:close">Close</a> or press ESC</p>
  </div> -->

  <!-- Link to open the modal -->
<!--   <p><a href="#ex1" rel="modal:open">Open Modal</a></p>
 -->


<?php include('includes/footer.php')  ?>
