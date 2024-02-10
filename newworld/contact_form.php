<?php
include_once 'config.php';


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$sql = "INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)";
$stmt = $db->prepare($sql);
$stmt->execute([':name' => $name, ':email' => $email, ':message' => $message]);


echo "پیام شما با موفقیت ثبت شد.";


$db = null;
?>
