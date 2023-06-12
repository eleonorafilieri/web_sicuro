<?php require_once 'config/config.php';

function getConnection()
{
    try {
        $connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASSWORD
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}
?>
