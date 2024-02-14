<?php
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=bddd;", "root", "");

$emailverify = $_POST['emailverify'];

$password = $_POST['password'];

$sql = "SELECT * FROM regUsers WHERE emailverify=:emailverify";

$statement = $pdo->prepare($sql);

$statement->execute(['emailverify'=>$emailverify]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
    $_SESSION['error'] = "Зарегестрируйтесь";
    header("Location: /page_login.php");
    exit;
}

if (isset($_SESSION['error'])) {
    session_unset();
}

$stmt = $pdo->prepare("SELECT * FROM regUsers WHERE password = password");

$stmt->execute();

$userCheck = $stmt->fetch();

$_SESSION ['name'] = $emailverify;

if ($userCheck && password_verify($_POST['password'], $user['password'])) {
    header("Location:/users.php");
} else {
    header("Location: /page_login.php");
    $_SESSION['error'] = "Зарегестрируйтесь";
    exit;
}


if($emailverify == "Admin@gmail.com") {
    $_SESSION['adm'] = $emailverify;
    header("Location:/users.php");
}

var_dump($emailverify);
var_dump($password);
echo session_id();