<?php
function setDBConnection() {
	$db = mysqli_connect($GLOBALS['dbhost'], $GLOBALS['dbuser'], $GLOBALS['dbpwd'], $GLOBALS['dbname']);
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else {
		return $db;
	}
}

function checkLogin($username, $pwd) {
	$id = 0;
	$db = setDBConnection();
	$stmt = mysqli_stmt_init($db);
	if (mysqli_stmt_prepare($stmt, "SELECT id FROM utenti WHERE BINARY utente=? AND BINARY password=?;")) {
		mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$id);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	}
	mysqli_close($db);
	return $id;
}

function printGrid() {
	$return = <<<_HTML
			<div class="row">
_HTML;
	$db = setDBConnection();
	$stmt = mysqli_stmt_init($db);
	$count = 0;
	if (mysqli_stmt_prepare($stmt, "SELECT id, nome, prezzo, immagine FROM piatti;")) {
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$id,$nome,$prezzo,$immagine);
		while(mysqli_stmt_fetch($stmt)) {
			$count += 1;
			$return.= <<<_HTML
			<div class="col-sm-4">
				<form action="common/dialog_manager.php?action=order" method="post">
					<p><img src="img/$immagine" title="$nome"/></p>
					<p>$nome - $prezzo €</p>
					<p><input type="hidden" name="dish_id" value="$id" /></p>
					<p><input type="hidden" name="dish_name" value="$nome" /></p>
					<p><input type="hidden" name="dish_price" value="$prezzo" /></p>
					<label for="dish_quantity">Quantità (max:5):</label>
					<input type="number" id="dish_quantity" name="dish_quantity" min="1" max="5" value="1">
					<p>
						<input type="submit" value="ordina" class="btn btn-primary"/>
					</p>
				</form>
			</div>
_HTML;
			if ($count % 3 == 0) {
					$return.= <<<_HTML
		</div>
		<div class="row">
_HTML;
			}
		}
		mysqli_stmt_close($stmt);
	}
	mysqli_close($db);
	$return .= <<<_HTML
			</div>
_HTML;
	return $return;
}

function addDish($user_id, $dish, $name, $quantity, $price) {
	$return = 0;
	$db = setDBConnection();
	$stmt = mysqli_stmt_init($db);
	if (mysqli_stmt_prepare($stmt, "INSERT INTO ordine_prezzo (id_utente, id_piatto, nome_piatto, quantita, prezzo) VALUES (?,?,?,?,?)")) {
		mysqli_stmt_bind_param($stmt, "iisis", $user_id, $dish, $name, $quantity, $price);
		mysqli_stmt_execute($stmt);
		$return = mysqli_stmt_affected_rows($stmt);
		mysqli_stmt_close($stmt);
	}
	mysqli_close($db);
	return $return;
}

function showOrder($user_id) {
	$return = '';
	$numero_articoli = 0;
	$db = setDBConnection();
	$stmt = mysqli_stmt_init($db);
	if (mysqli_stmt_prepare($stmt, "SELECT o.nome_piatto, o.quantita, (o.quantita * o.prezzo) FROM ordine_prezzo AS o WHERE o.id_utente = ?;")) {
		mysqli_stmt_bind_param($stmt, "i", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		if (mysqli_stmt_num_rows($stmt) > 0) {
			$numero_articoli = mysqli_stmt_num_rows($stmt);
			mysqli_stmt_bind_result($stmt,$nome,$quantita,$prezzo);
			$totale = 0;
			$return .= <<<_HTML
				<div><button data-toggle="collapse" data-target="#shopping_cart"><span>$numero_articoli</span><img src="img/shopping_cart.png" alt="Il tuo carrello" /></button></div>
				<div id="shopping_cart" class="collapse">
					<p>Il tuo ordine comprende:</p>
					<ul>
_HTML;
			while(mysqli_stmt_fetch($stmt)) {
				$return.= "<li>" . $nome . " (". $quantita ."): " . $prezzo . "€</li>";
				$totale += $prezzo;
			}
			$return .= <<<_HTML
					</ul>
					<p><strong>Totale: </strong>$totale €</p>
				</div>
_HTML;
		}
		else {
			$return .= <<<_HTML
				<div><button data-toggle="collapse" data-target="#shopping_cart"><span>$numero_articoli</span><img src="img/shopping_cart.png" alt="Il tuo carrello" /></button></div>
				<div id="shopping_cart" class="collapse">
					<p>Non ci sono articoli nel tuo carrello</p>
				</div>
_HTML;
		}
		mysqli_stmt_close($stmt);
	}
	mysqli_close($db);
	return $return;
}
function deleteOrder($user_id) {
	$db = setDBConnection();
	$stmt = mysqli_stmt_init($db);
	if (mysqli_stmt_prepare($stmt, "DELETE FROM ordine_prezzo WHERE id_utente = ?")) {
		mysqli_stmt_bind_param($stmt, "i", $user_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	mysqli_close($db);
}
?>