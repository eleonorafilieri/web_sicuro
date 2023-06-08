<?php
	require 'common/elements/header.php';
	//ciao
?>
	<div class="row">
		<div class="col-sm-12">
<?php
	if (!$logged) {
?>
		<h2>Login</h2>
		<form id="loginForm" method="post" action="common/dialog_manager.php?action=login">
			<p>
				<label for="username">Username </label>
				<br/>
				<input id="username" name="username" type="text" maxlength="255" size="30" value=""/>				
			</p>
			<p>
				<label for="pwd">Password </label>
				<br />
				<input id="pwd" name="pwd" type="password" maxlength="255" size="30" value=""/>
			</p>
			<p>
				<input class="btn btn-primary" type="submit" name="submit" value="Login" />
			</p>
		</form>
<?php
	}
	else {
?> 
	<h2>Ordina una delle nostre specialità</h2>
<?php
	echo showOrder($user_id);
	echo printGrid();
	}
?>
		</div>
	</div>
<?php
	require 'common/elements/footer.php';
?>	