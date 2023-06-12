<?php
function loginUserSecure($username, $password)
{
    $connection = getConnection();
    $username = htmlspecialchars($username);

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $connection->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['admin'] = $user['admin'];
        return $user;
    } else {
        return false;
    }
}
function deletePlant($plantId)
{
    $connection = getConnection();
    $query = "DELETE FROM piante WHERE id_pianta = :plantId";
    $statement = $connection->prepare($query);
    $statement->execute(['plantId' => $plantId]);
}


function getPlantFamilies()
{
    $connection = getConnection();
    $query = "SELECT * FROM famiglia";
    $result = $connection->query($query);
    $families = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $families[] = $row;
    }

    return $families;
}

function getAllPlants()
{
    $connection = getConnection();
    $query = "SELECT * FROM piante";
    $result = $connection->query($query);
    $plants = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $plants[] = $row;
    }

    return $plants;
}

function getPlantsByFamily($familyId)
{
    $connection = getConnection();
    $query = "SELECT * FROM piante WHERE id_famiglia = '$familyId'";
    $result = $connection->query($query);
    $plants = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $plants[] = $row;
    }

    return $plants;
}
