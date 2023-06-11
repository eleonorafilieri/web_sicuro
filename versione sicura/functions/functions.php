<?php

function loginUser($username, $password)
{
    $connection = getConnection();
    $username = htmlspecialchars($username); // Protezione da attacchi XSS

    // Versione senza protezione da SQL injection (NON consigliata)
    //$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // Versione con protezione da SQL injection (consigliata)
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $connection->prepare($query);
    $statement->execute([
        'username' => $username,
        'password' => $password
    ]);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function loginUserSecure($username, $password)
{
    $connection = getConnection();
    $username = htmlspecialchars($username); // Protezione da attacchi XSS

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $connection->prepare($query);
    $statement->execute([
        'username' => $username,
        'password' => $password
    ]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return $user;
    } else {
        return false;
    }
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
