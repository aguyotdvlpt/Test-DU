<?php 
// Configuration de PDO pour la base de données
// On utilise la notation en absolue pour se repérer
require(__DIR__.'/../config/database.php');
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>Document Unique</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="sticky-footer-navbar.css" rel="stylesheet">

  <link  rel="stylesheet" href="css/style.css">
</head>

<body>

  <header>
 
  </header>

  <body>

     <!-- *************   LE MENU   ****************  -->
    <div class="">
      <nav class="navbar navbar-expand-lg navbar-dark top bg-dark">
          <div class="container">
            <img class="logo mr-5" src="./img/logo.png" />
            <a class="navbar-brand" href="#">Document Unique</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <?php
          $page = basename($_SERVER['REQUEST_URI'], '.php'); ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo ($page =='index') ? 'active' : '' ?>">
              <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($page =='saisie') ? 'active' : '' ?>">
              <a class="nav-link" href="saisie.php">Saisie</a>
            </li>
            <li class="nav-item <?php echo ($page == 'resultats') ? 'active' : '' ?>">
              <a class="nav-link" href="resultats.php">Etat de sortie</a>
            </li>            
          </ul>
        </div>
</div>
      </nav>
     <?php //var_dump(basename($_SERVER['REQUEST_URI'], '.php')); ?>