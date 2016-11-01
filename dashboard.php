<?php
	include('includes/config.php');
	loginCheck();
	include('includes/header.php');
?>


	<div class="timaskraning-container">
		<div class="timaskraning">
			<h3>Fimmtudagur 21. október</h3>
			<ul>
			<li><input type="radio" name="attending" value="attending" checked> Mætt</li>
			<li><input type="radio" name="attending" value="attending" checked> Veik</li>
			<li><input type="radio" name="attending" value="attending" checked> Í leyfi</li>
			</ul>
		</div>
	</div>

<?php include('includes/footer.php')  ?>
