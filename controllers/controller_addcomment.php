<?php
require_once '../config/database.php';
require_once '../helpers/function.php';
require_once '../helpers/session.php';

$conn = conn_db();
$comment = (isset($_POST['comment'])) ? trim($_POST['comment']) : '';
$user = (isset($_SESSION['id'])) ? $_SESSION['id'] : NULL;

$query = "INSERT INTO comments (`user_id`, `comment`) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $user, $comment);
$stmt->execute();
redirect('../index.php?page=components/home.php');
return;