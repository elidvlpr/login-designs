<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Production
$database = 'css_gsdb';
$username  = 'root';
$password = '';
$host = 'localhost';

$db = new PDO("mysql:host=$host", $username, $password);
$query = "CREATE DATABASE IF NOT EXISTS $database";
try {

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec($query);
   
    $db->beginTransaction();
    $db->commit();

} catch (PDOException $e) {
    die("Error creating database: " . $e->getMessage());
    $db = null;
}
