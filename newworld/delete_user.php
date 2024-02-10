<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    try {
        $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);

       
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();

      
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        die("An error happened, Error: " . $e->getMessage());
    }
} else {
    echo "Invalid user id.";
}
