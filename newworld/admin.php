<?php
include_once 'config.php';
session_start();



try { 
    $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']); 
} catch (PDOException $e) { 
    die("An error happened, Error: " . $e->getMessage()); 
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$usertype = isset($_SESSION['usertype']) ? $_SESSION['usertype'] : null;


if ($username !== null && $usertype == 1) {
    echo "Welcome, $username (Admin)! This is the Admin Panel.";
    echo "<a href='logout.php'>Logout</a>";
} else {
   
    echo "Access denied!";
    echo "<a href='index.php'>Back to Home</a>";
}

function getContactMessages() {
    global $db;
    $sql = "SELECT * FROM contact_messages";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getUsers() {
    global $db;
    $sql = "SELECT * FROM users";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




$contactMessages = getContactMessages();


$users = getUsers();
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #1d5a8b;
        }

        footer {
            text-align: center;
            padding: 1em 0;
            background-color: #333;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
    <title>صفحه مدیریت</title>
</head>
<body>

    <header>
        <h1>صفحه مدیریت</h1>
    </header>

    <main>
        <section>
            <h2>پیام‌های ارسالی کاربران</h2>
            <ul>
                <?php foreach ($contactMessages as $message) : ?>
                    <li>
                        نام: <?= $message['name'] ?> - ایمیل: <?= $message['email'] ?> - پیام: <?= $message['message'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section>
            <h2>لیست کاربران ثبت‌نامی</h2>
            <ul>
                <?php foreach ($users as $user) : ?>
                    <?php if ($user['username'] !== 'admin') : ?>
                        <li>
                            نام کاربری: <?= $user['username'] ?> - ایمیل: <?= $user['email'] ?>
                            | <a href="delete_user.php?id=<?= $user['id'] ?>">حذف کاربر</a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </section>
        <a href="index.php">بازگشت به صفحه اصلی</a>
    </main>



</body>
</html>

