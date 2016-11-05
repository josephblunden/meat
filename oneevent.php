<?php
	include('includes/config.php');
	loginCheck();

	include('includes/header.php');

	if(isset($_GET['one']) && $_GET['one'] == 'true') {
		$eventid = $_GET['eventid'];
		$event = new Event();
		$eventInfo = $event->getEventsById($eventid);
	};

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 p-a-3">
			<div class="row">
        <h2><?php echo $eventInfo['title']; ?></h2>
        <h3><?php echo $eventInfo['eventDate']; ?></h3>
        <p>
            <?php echo $eventInfo['description']; ?>
        </p>
        <h3><?php echo $eventInfo['author']; ?></h3>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer.php')  ?>
