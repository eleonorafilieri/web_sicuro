<?php


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
