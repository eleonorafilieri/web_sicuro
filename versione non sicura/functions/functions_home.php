<?php

function getPlantFamilies($servername,$username, $password, $database)
{
    $connection = mysqli_connect($servername , $username, $password, $database);

    if (!$connection) {
        die("Errore nella connessione al database: " . mysqli_connect_error());
    }
    
    $query = "SELECT * FROM famiglia";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Errore nella query: " . mysqli_error($connection));
    }

    $families = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $families[] = $row;
    }

    mysqli_free_result($result);
    mysqli_close($connection);

    return $families;
}

/*function getPlantFamilies()
{
    $db = mysqli_connect ($servername , $username, $password, $database);
    $query = "SELECT * FROM famiglia";
    $result = $connection->query($query);
    $families = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $families[] = $row;
    }

    return $families;
}*/
function getAllPlants($servername , $username, $password, $database)
{
    $connection = mysqli_connect($servername , $username, $password, $database);

    if (!$connection) {
        die("Errore nella connessione al database: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM piante";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Errore nella query: " . mysqli_error($connection));
    }

    $plants = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $plants[] = $row;
    }

    mysqli_free_result($result);
    mysqli_close($connection);

    return $plants;
}

/*
function getAllPlants()
{
    $db = mysqli_connect ($servername , $username, $password, $database);
    if (!$db){ die('Connection failed : ' . mysqli_connect_error());}
    $sql = "SELECT * FROM piante";
    $result = mysqli_query ($db ,$sql);
    if(mysqli_num_rows ($result) > 0){
        while ($row = mysqli_fetch_assoc($result )){
            print "<p>". $row ["name"] . "," . $row ["price"] ."</p>";
        }
    }
    else{
        print "No results";       
    }
    mysqli_close($db);
}
*/
function getPlantsByFamily($familyId,$servername , $username, $password, $database)
{
    $connection = mysqli_connect($servername , $username, $password, $database);

    if (!$connection) {
        die("Errore nella connessione al database: " . mysqli_connect_error());
    }

    $familyId = mysqli_real_escape_string($connection, $familyId); // Escaping del valore per evitare problemi di SQL injection
    $query = "SELECT * FROM piante WHERE id_famiglia = '$familyId'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Errore nella query: " . mysqli_error($connection));
    }

    $plants = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $plants[] = $row;
    }

    mysqli_free_result($result);
    mysqli_close($connection);

    return $plants;
}

/*
function getPlantsByFamily($familyId)
{
    $db = mysqli_connect ($servername , $username, $password, $database);
    $familyId = $connection->quote($familyId); // Quote il valore per evitare problemi di escaping manuale
    $query = "SELECT * FROM piante WHERE id_famiglia = $familyId";
    $result = $connection->query($query);
    $plants = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $plants[] = $row;
    }

    return $plants;
}

*/