<?php
  //Database
	include('database.class.php');

	$GLOBALS['gdb'] = Database::getInstance();
	
	include('user.class.php');
  include('event.class.php');
	include('attending.class.php');
	include('comments.class.php');
?>
