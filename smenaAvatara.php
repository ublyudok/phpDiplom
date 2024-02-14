<?php
include __DIR__.'/userDB.php';
error_reporting(E_ERROR | E_PARSE);
$id = $_POST['id'];

$file = $_FILES['file'];

$name = $file['name'];

$pathFile = __DIR__.'./img/'.$name;

if(isset($_POST['id'])) {


    $stmt = $db->prepare("SELECT * FROM addUser WHERE img = ?");
    $stmt->execute([$_POST['file']]);
    $nm = $stmt->fetch();

    $stmt = $db->prepare("UPDATE addUser SET img = :img WHERE id = :id");
    $stmt->execute(['id' => $id, 'img' => $name]);

    if(!empty($_FILES['file'])) {
        $file = $_FILES['file'];
        $name = $file['name'];
        $pathFile = __DIR__.'./img/'.$name;
    
        if(!move_uploaded_file($file['tmp_name'], $pathFile)) {
            echo 'Ошибка загрузки файла';
        }

    }

    header("Location:/users.php");
}

header("Location:/users.php");