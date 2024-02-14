<?php
session_start();

error_reporting(E_ALL);
//post
$emailverify = $_POST['emailverify'];

$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=bddd;", "root", "");

//users register
$sql = "SELECT * FROM regUsers WHERE emailverify=:emailverify";

$statement = $pdo->prepare($sql);

$statement->execute(['emailverify'=>$emailverify]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($user)) {
    $_SESSION['error'] = "Пользователь с таким email уже существует";
    header("Location: /page_register.php");
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO regUsers (emailverify,password) VALUES (:emailverify, :password)";

$statement = $pdo->prepare($sql);

$statement-> execute(['emailverify' => $emailverify, 'password' => $hashed_password]);

//add to users page

$name = $_POST['name'];

$workplace = $_POST['workplace'];

$telephone = $_POST['telephone'];

$adress = $_POST['adress'];

$email = $_POST['email'];

$password = $_POST['password'];

$status = $_POST['status'];

$img = $_POST['file'];

$vk = $_POST['vk'];

$insta = $_POST['insta'];

$telegram = $_POST['telegram'];

$sql = "INSERT INTO Adduser (name, workplace, telephone, adress, email, password, status, img, vk, insta, telegram)
 VALUES (:name, :workplace, :telephone, :adress, :email, :password, :status, :img, :vk, :insta, :telegram)";

$statement = $pdo->prepare($sql);

$statement->execute(['name' => $name, 'workplace' => $workplace, 'telephone' => $telephone, 'adress' => $adress, 'email' => $emailverify,
 'password' => $hashed_password, 'status' => $status, 'img' => $img,'vk' => $vk, 'insta' => $insta, 'telegram' => $telegram]);


header("Location: /page_login.php");