<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo 'Mætarinn'; ?></title>
  <meta name="description" content="Mætarinn">
  <meta name="author" content="Brynjar, Eyþór, Valdís">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.print.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.css">
  <?php date_default_timezone_set('Iceland'); ?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/moment.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/gcal.js"></script>
  <link rel="stylesheet" href="styles/main.css">
</head>

<body>


<?php
  if (!stripos($_SERVER['REQUEST_URI'], 'login.php')) {
    echo '<div class="header">
    <div class="skitamix"></div>
    <h2>'.$_SESSION['firstname'].'</h2>
    <a href="#" class="toggle-overlay open-menu">MENU</a>
  </div>';
  }
?>
