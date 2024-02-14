<?php

include __DIR__.'/userDB.php';

session_start();

error_reporting(E_ALL);

$id = $_GET['id'];

$status = $_GET['status'];


if(isset($_GET['id'])) {

    $stmt = $db->prepare("SELECT * FROM Adduser WHERE status = ?");
    $stmt->execute([$_GET['status']]);
    $nm = $stmt->fetch();

    $stmt = $db->prepare("UPDATE Adduser SET status = :status WHERE id = :id");
    $stmt->execute(['id' => $id, 'status' => $status]);

    var_dump($_GET['id']);
    var_dump($_GET['status']);
    var_dump($nm);
}

header("Location:/users.php");
