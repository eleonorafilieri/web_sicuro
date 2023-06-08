<?php
	require('config/config.php');
	require('libs/functions.php');

	// Inialize session
	session_start();
	$logged = isset($_SESSION['logged']) ? $_SESSION['logged'] : false;
	if((!$logged) && (strpos($_SERVER['REQUEST_URI'], 'index.php') === false)) {
		header('Location: index.php');
	}
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css">
    <title>Esempio progetto</title>
  </head>
  <body>	
	<!-- HEADER -->
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 text-left">
					<img src="path_to_your_image.jpg" alt="Logo" class="logo">
				</div>
				<div class="col-sm-8">
					<nav>
						<ul class="menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="le_nostre_piante.php">Le nostre piante</a></li>
							<li><a href="carrello.php">Carrello</a></li>
							<li>
							<?php
								if($logged) {
									echo "<p class='logout'><a href='common/dialog_manager.php?action=logout' title='logout'>Logout</a></p>";
								}
							?>
							</li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</header>
	<!-- end HEADER -->
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
<?php
		
		if(isset($_GET['msg'])) {
			$msg = $_GET['msg'];
			$errore = $errori[$msg];
			print $errore;
		}
		
?>
