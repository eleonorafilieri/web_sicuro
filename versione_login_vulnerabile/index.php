<?php
session_start();
include 'functions/db.php';
include 'functions/functions.php';
if (isset($_POST['deletePlant'])) {
    $plantId = $_POST['deletePlantId'];
    deletePlant($plantId);
}

$families = getPlantFamilies();

$selectedFamilyId = isset($_GET['famiglia']) ? $_GET['famiglia'] : null;
$plants = ($selectedFamilyId !== null) ? getPlantsByFamily($selectedFamilyId) : getAllPlants();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bloom - Versione vulnerabile</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <header>
     
    <nav class="navbar navbar-expand-lg navbar-dark ">
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
                <?php if ($user) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php } ?>
            </ul>
        </div>
    </nav>
    </header>

<main>
    <div class="container">
        <h1>Bloom - Il tuo negozio di fiori</h1>

        <div class="row">
            <div class="col-md-12">
                <h3>Filtra per famiglia</h3>
                <ul class="list-group d-flex flex-row">
                    <li class="list-group-item <?php if ($selectedFamilyId === null) echo 'selected'; ?>">
                        <a href="?">Tutte</a>
                    </li>
                    <?php
                    foreach ($families as $family) {
                        $class = ($selectedFamilyId == $family['id_famiglia']) ? 'selected' : '';
                        echo '<li class="list-group-item ' . $class . '"><a href="?famiglia=' . $family['id_famiglia'] . '">' . $family['nome'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="row">
            <?php
            foreach ($plants as $plant) {
                echo '<div class="col-md-4">';
                echo '    <div class="card">';
                echo '        <img src="' . $plant['path_img'] . '" class="card-img-top" alt="' . $plant['titolo'] . '">';
                echo '        <div class="card-body">';
                echo '            <h5 class="card-title">' . $plant['titolo'] . '</h5>';
                echo '            <p class="card-text">' . $plant['descrizione'] . '</p>';
                echo '        </div>';
                echo '    </div>';
                
                if ($user && $_SESSION['admin'] == 1) { ?>
                    <form method="POST">
                        <input type="hidden" name="deletePlantId" value="<?php echo $plant['id_pianta']; ?>">
                        <button type="submit" class="btn btn-danger" name="deletePlant">Elimina</button>
                    </form>
                <?php }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</main>

<footer>
        <p>&copy; 2023 Negozio di Piante</p>
    </footer>
</body>
</html>


