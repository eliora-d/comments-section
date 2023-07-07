<?php
require_once '../config/database.php';
require_once '../helpers/session.php';
require_once '../helpers/function.php';

$email = (isset($_REQUEST['username'])) ? trim($_REQUEST['username']) : '';
$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';

$db = conn_db();

$query = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ? LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->num_rows;
$result = $result->fetch_object();
if($row != 1) {
  redirect('../index.php?page=components/home.php');
	return;
} else {
	session_regenerate_id();
  	$_SESSION['username'] = $result->username;
	$_SESSION['id'] = $result->id;
	
	redirect('../index.php?page=components/home.php');
}