<?php

$database = [
    'host'   => 'localhost',
    'dbname' => 'myproject',
    'user'   => 'root',
    'pass'   => ''
];

try {
    $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);
} catch (PDOException $e) {
    die("An error happened, Error: " . $e->getMessage());
}

?>