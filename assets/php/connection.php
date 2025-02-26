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
    $db->exec("USE $database");

    $db->exec("CREATE TABLE IF NOT EXISTS `students` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            student_id VARCHAR(10) NOT NULL UNIQUE,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            class VARCHAR(20),
            section VARCHAR(10),
            date_of_birth DATE,
            gender VARCHAR(10),
            email VARCHAR(100),
            contact_number VARCHAR(15)
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");

    $db->exec("CREATE TABLE IF NOT EXISTS `subjects` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            subject_code VARCHAR(10) NOT NULL UNIQUE,
            subject_name VARCHAR(100) NOT NULL,
            teacher_id INT,
            FOREIGN KEY (teacher_id) REFERENCES teachers(id)

            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");
    
    $db->exec("CREATE TABLE IF NOT EXISTS `teachers` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            teacher_id VARCHAR(10) NOT NULL UNIQUE,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            email VARCHAR(100) UNIQUE,
            contact_number VARCHAR(15)
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");

    $db->exec("CREATE TABLE IF NOT EXISTS `grades` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            student_id VARCHAR(10),
            subject_id INT,
            grade DECIMAL(5,2),
            term VARCHAR(20),
            year YEAR,
            FOREIGN KEY (student_id) REFERENCES students(student_id),
            FOREIGN KEY (subject_id) REFERENCES subjects(id)
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
    ");
    
    $db->exec("CREATE TABLE IF NOT EXISTS `users` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role ENUM('admin', 'teacher', 'student')
        );
    ");

    $db->beginTransaction();
    $db->commit();

} catch (PDOException $e) {
    die("Error creating database: " . $e->getMessage());
    $db = null;
}
