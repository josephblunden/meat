<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo 'Mætarinn'; ?></title>
  <meta name="description" content="Mætarinn">
  <meta name="author" content="Brynjar, Eyþór, Valdís">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <?php date_default_timezone_set('UTC'); ?>
  <link rel="stylesheet" href="styles/main.css">

  <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">


  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>

<div class="header">
    <div class="skitamix"></div>
    <h2><?php echo $_SESSION['firstname']; ?></h2>
    <a href="#" class="toggle-overlay open-menu">MENU</a>
  </div>
