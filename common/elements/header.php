<?php
	require('config/config.php');
	require('libs/functions.php');

	// Inialize session
	session_start();
	$loggedin = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
	if((!$loggedin) && (strpos($_SERVER['REQUEST_URI'], 'index.php') === false)) {
		header('Location: index.php');
	}
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
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
				<div class="col-sm-12">
					<h1><a href="index.php" title="Esempio progetto">Esempio progetto</a></h1>
<?php
					if($loggedin) {
						echo "<p class='logout'><a href='common/dialog_manager.php?action=logout' title='logout'>Logout</a></p>";
					}
?>
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
		
		
		
		