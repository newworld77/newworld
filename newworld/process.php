<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password'])) {
        if (!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            function insertUserData($username, $email, $password, $usertype = 0)
            {
                global $db;
                $sql = "INSERT INTO users (username, email, password, usertype) VALUES (:username, :email, :password, :usertype)";
                $stmt = $db->prepare($sql);
                $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password, ':usertype' => $usertype]);
                return $stmt->rowCount();
            }

            $result = insertUserData($username, $email, $password);

            if ($result > 0) {
                
                $_SESSION['username'] = $username;
                $_SESSION['usertype'] = 0; 
                header("Location: ok.php");
                exit;
            } else {
                echo "Failed to insert user data.";
            }
        } else {
            echo "All fields are required.";
        }
    }
}

function checkLogin($username, $password)
{
    global $db;
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->execute([':username' => $username, ':password' => $password]);

  
    return $stmt->rowCount() > 0;
}

function getUserType($username)
{
    global $db;
    $sql = "SELECT usertype FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute([':username' => $username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['usertype'] : null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) and isset($_POST['password'])) {
        if (!empty($_POST['username']) and !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            
            if (checkLogin($username, $password)) {
                
                $usertype = getUserType($username);
                if ($usertype == 1) { 
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = 1; 
                    header("Location: admin.php");
                    exit;
                }
                 else {
                    
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = 0; 
                    header("Location: tabrik.php");
                    exit;
                }
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "All fields are required.";
        }
    }
}
?>
