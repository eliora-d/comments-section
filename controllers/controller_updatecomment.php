<?php
require_once '../config/database.php';
require_once '../helpers/function.php';
require_once '../helpers/session.php';

$conn = conn_db();
$comment = (isset($_POST['comment'])) ? trim($_POST['comment']) : '';
$id  = (isset($_POST['id'])) ? trim($_POST['id']) : 0;

if($id != 0 && $comment != '') {
    $query = "UPDATE comments SET comment = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $comment, $id);
    $stmt->execute();
}

redirect('../index.php?page=components/home.php');
return;
