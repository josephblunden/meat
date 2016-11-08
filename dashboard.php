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
					<!-- <input type="submit" class="btn btn-primary btn-lg btn-block" name="Submit" value="Submit"> -->
				</form>
				<?php
				    }
				    else {
				        echo "<div class='form-check-svar'>Mæting skráð</div>";
				 } ?>


				 <div id="contactResponse"></div>


		</div>
	</div>

	<div class="timaskraning-yfirlit-container">
		<div class="timaskraning">
			<ul class="margin-margin">
				<li class="timaskraning-yfirlit-faersla">
					<p class="timaskraning-yfirlit-vinstri">Miðvikudagur 21. apríl</p>
					<p class="timaskraning-yfirlit-haegri timaskraning-maett">Mætt</p>
				</li>
				<li class="timaskraning-yfirlit-faersla">
					<p class="timaskraning-yfirlit-vinstri">Miðvikudagur 21. apríl</p>
					<p class="timaskraning-yfirlit-haegri timaskraning-leyfi">Í leyfi</p>
				</li>
			</ul>
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
