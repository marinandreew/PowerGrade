<?php
include "db.php";
$title = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
$user_id = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$query = $db->query("SELECT * FROM users WHERE username = '$user_id'");
$query = $query->fetch_assoc();
$query = $query['id'];
$sender = $userinfo['username'];
$db->query("INSERT INTO `messages` (`title`, `description`, `user_id`, `sender`) VALUES ('$title', '$description','$query', '$sender')");
header("Location: ../pages/myProfile.php");
?>