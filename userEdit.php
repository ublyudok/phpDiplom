<?php
include __DIR__.'/userDB.php';
session_start();

error_reporting(E_ALL);

$id = $_GET['id'];

$name = $_GET['name'];

$workplace = $_GET['workplace'];

$telephone = $_GET['telephone'];

$adress = $_GET['adress'];

if(isset($_GET['id']))
{
    $stmt = $db->prepare("SELECT * FROM Adduser WHERE name = ?");
    $stmt->execute([$_GET['name']]);
    $nm = $stmt->fetch();

    if (!empty($nm)) {
        header("Location:/users.php");
        exit;
    }

    $stmt = $db->prepare("SELECT * FROM Adduser WHERE workplace = ?");
    $stmt->execute([$_GET['workplace']]);
    $work = $stmt->fetch();

    $stmt = $db->prepare("SELECT * FROM Adduser WHERE telephone = ?");
    $stmt->execute([$_GET['telephone']]);
    $tel = $stmt->fetch();

    $stmt = $db->prepare("SELECT * FROM Adduser WHERE adress = ?");
    $stmt->execute([$_GET['adress']]);
    $adr = $stmt->fetch();
    
    $stmt = $db->prepare("UPDATE Adduser SET name = :name, workplace = :workplace, telephone = :telephone, adress = :adress WHERE id = :id");
    $stmt->execute(['id'=>$id, 'name' => $name, 'workplace' => $workplace, 'telephone' => $telephone, 'adress' => $adress]);
}

header("Location:/users.php");
