
<?php
	include('config.php');
	include('comments.php');

	include('header.php');
	?>
<body>
  <?php
    $events_id = $_POST['events_id'];
    $id = $_POST['id'];
    $users_id = $_POST['users_id'];
    $date_time = $_POST['date_time'];
    $comments = $_POST['comments'];

  echo "<form method='POST' action='../createevent.php'>
  		<input type='hidden' name='id' value='".$id."'>
  		<input type='hidden' name='users_id' value='".$users_id."'>
  		<input type='hidden' name='date_time' value='".$date_time."'>
  		<textarea name='comments'>".$comments."</textarea><br>
  		<button type='submit' name='commentSubmit'>Edit</button>
  	</form>";

  ?>
</body>

<?php include('footer.php')  ?>
