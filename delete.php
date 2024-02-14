<?php
include __DIR__.'/userDB.php';

session_start();

error_reporting(E_ALL);



if(isset($_GET['id']))
{
    $stmt = $db->prepare("SELECT * FROM Adduser WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $work = $stmt->fetch();
    
}

if($work) {
    $stmt = $db->prepare("DELETE FROM Adduser WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location:/users.php");