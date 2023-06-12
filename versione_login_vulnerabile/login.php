<?php
session_start();
include 'functions/db.php';
include 'functions/functions.php';
 
// Gestione del login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se l'utente ha inserito entrambi i campi
    if (!empty($username) && !empty($password)) {
        // Versione senza protezione da SQL injection
        //$user = loginUser($username, $password);
        // Versione con protezione da SQL injection
        $user = loginUser($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            if ($user['admin'] == 1) {
                $_SESSION['admin'] = $user['admin'];
            }
            header('Location: index.php');
            exit();
        }
         else {
            $loginError = 'Credenziali non valide. Riprova.';
        }
    } else {
        $loginError = 'Devi riempire entrambi i campi.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Bloom - Login - Versione vulnerabile</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Logo" class="logo d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav mr-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Login</h1>

            <?php
            if (isset($loginError)) {
                echo '<div class="alert alert-danger" role="alert">' . $loginError . '</div>';
            }
            ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Accedi</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Negozio di Piante</p>
    </footer>
</body>
</html>
