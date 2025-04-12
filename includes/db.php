<?php

$dbConfig = require __DIR__ . '/../config/database.php';

$dsn = "mysql:host={$dbConfig['host']}; dbname={$dbConfig['dbname']}";
$dbUsername = "root";
$dbPassword = "";

try {
    $pdo =new PDO($dsn, $dbUsername, $dbPassword);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected!";
} catch (PDOException $err) {
    echo " Connection failed:  " . $err -> getMessage();
}
