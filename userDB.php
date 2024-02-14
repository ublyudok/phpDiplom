<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bddd');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


$db = new \PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
$data = $db->prepare("SELECT * FROM addUser");
$data->execute();


$result = $data->fetchAll();

foreach ($result as $row) {
    
}