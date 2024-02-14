<?php
include __DIR__.'/userDB.php';
session_start();
error_reporting(E_ALL);
//posts

$name = $_POST['name'];

$workplace = $_POST['workplace'];

$telephone = $_POST['telephone'];

$adress = $_POST['adress'];

$email = $_POST['email'];

$password = $_POST['password'];

$status = $_POST['status'];

$img = $_FILES['file'];

$imgName = $img['name'];

$pathFile = __DIR__.'./img/'.$imgName;

$vk = $_POST['vk'];

$instagram = $_POST['insta'];

$telegram = $_POST['telegram'];

$pdo = new PDO("mysql:host=localhost; dbname=bddd;", "root", "");


//check name
$sql = "SELECT * FROM Adduser WHERE name = :name";

$statement = $pdo->prepare($sql);

$statement->execute(['name' => $name]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($user)) {
    exit;
}
//test

$sql = "SELECT * FROM regUsers WHERE emailverify = :emailverify";

$stmt = $pdo->prepare($sql);

$stmt -> execute(['emailverify' => $email]);

$checkMail = $stmt->fetch(PDO::FETCH_ASSOC);


if (!empty($checkMail)) {
    exit;
}

//check email
$sql = "SELECT * FROM Adduser WHERE email = :email";

$statement = $pdo->prepare($sql);

$statement->execute(['email' => $email]);

$useremail = $statement->fetchAll(PDO::FETCH_ASSOC);


if (!empty($useremail)) {
    exit;
}

if ($checkMail == $email) {
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Adduser (name, workplace, telephone, adress, email, password, status, img, vk, insta, telegram)
 VALUES (:name, :workplace, :telephone, :adress, :email, :password, :status, :img, :vk, :insta, :telegram)";

$statement = $pdo->prepare($sql);

$statement->execute(['name' => $name, 'workplace' => $workplace, 'telephone' => $telephone, 'adress' => $adress, 'email' => $email,
 'password' => $hashed_password, 'status' => $status, 'img' => $imgName,'vk' => $vk, 'insta' => $instagram, 'telegram' => $telegram,]);

 if(!empty($_FILES['file'])) {
    $file = $_FILES['file'];
    $name = $file['name'];
    $pathFile = __DIR__.'./img/'.$name;

    if(!move_uploaded_file($file['tmp_name'], $pathFile)) {
        echo 'Ошибка загрузки файла';
    }

}

//register add

 $sql = "INSERT INTO regUsers (emailverify,password) VALUES (:emailverify, :password)";

 $statement = $pdo->prepare($sql);

 $statement-> execute(['emailverify' => $email, 'password' => $hashed_password]);

header("Location:/users.php");
?>