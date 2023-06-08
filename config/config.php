<?php
	define("MSG_ERROR_LOGIN", "login_error");
	define("MSG_LOGOUT", "logout_successful");
	define("MSG_ERROR_ORDER", "order_error");
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpwd = "";
	$dbname = "websicuro";
	
	$errori = array(
		'login_error' => '<div class="alert alert-danger"><p>Username o password errati</p></div>',
		'logout_successful' => '<div class="alert alert-success"><p>Logout effettuato con successo</p></div>',
		'order_error' => '<div class="alert alert-danger"><p>Ordine non registrato</p></div>',
	);
?>