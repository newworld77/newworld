<?php
include_once 'config.php';

    session_start();
     


try { 
    $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']); 
} catch (PDOException $e) { 
    die("An error happened, Error: " . $e->getMessage()); 
}


$adminUsername = 'admin';
$adminPassword = password_hash('admin', PASSWORD_BCRYPT);


$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmt = $db->prepare($sql);
$stmt->execute([':username' => $adminUsername, ':password' => $adminPassword]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

  

   
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute([':username' => $enteredUsername]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

  
    if ($admin && password_verify($enteredPassword, $admin['password'])) {
        $_SESSION['admin'] = true; 
        header("Location: admin.php"); 
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>
