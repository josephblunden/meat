<?php
	include('includes/config.php');
	loginCheck();
	include('includes/header.php');
?>
<div class="">
	  <?php echo 'Welcom '. $_SESSION['firstname'] .' to this gorgeous website'; ?>
  <ul>
    <li><a href="createusers.php">Create User</a></li>
		<li><a href="users.php">Edit Users</a></li>
    <li><a href="createevent.php">Create Event</a></li>
  </ul>

	</div>
<?php include('includes/footer.php')  ?>
