<?php
require_once '../config/database.php';
require_once '../helpers/session.php';
require_once '../helpers/function.php';

$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? trim($_POST['password']) : '';

$conn = conn_db();
$query = "INSERT INTO users (`username`, `password`) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
redirect('../index.php?page=components/home.php');
return;