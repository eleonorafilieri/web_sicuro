<?php
	require('../config/config.php');
	require('../libs/functions.php');
	
	session_start();
	$loggedin = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
	$action = isset($_GET['action']) ? $_GET['action'] : '';
	
	if($action == '' || (!$loggedin && $action != 'login') || ($loggedin && $action == 'login')) {
		header('Location: ../index.php');
	}
	elseif($action=='login') {
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";
		$id = checkLogin($username, $pwd);
		if($id!=NULL && $id !=0) {
			$_SESSION['loggedin'] = true;
			$_SESSION['user_id'] = $id;
			header('Location: ../index.php');
		} else {
			header('Location: ../index.php?msg='.MSG_ERROR_LOGIN);
		}
	}
	elseif($action=='logout') {
		deleteOrder($user_id);
		session_destroy();
		header('Location: ../index.php?msg='.MSG_LOGOUT);
	}
	elseif($action=='order') {		
		$dish = isset($_POST['dish_id']) ? $_POST['dish_id'] : 0;
		$name = isset($_POST['dish_name']) ? $_POST['dish_name'] : 0;
		$quantity = isset($_POST['dish_quantity']) ? $_POST['dish_quantity'] : 0;
		$price = isset($_POST['dish_price']) ? $_POST['dish_price'] : 0;
		if (addDish($user_id, $dish, $name, $quantity, $price) > 0) {
			header('Location: ../index.php');
		}
		else {
			header('Location: ../index.php?msg='.MSG_ERROR_ORDER);
		}
	}
	else {
		header('Location: ../index.php');
	}
?>