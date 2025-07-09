<?php
// Database configuration for Docker
$host = getenv('DB_HOST') ?: 'db';
$database = getenv('DB_NAME') ?: 'laravel_myschools';
$username = getenv('DB_USER') ?: 'school_user';
$password = getenv('DB_PASSWORD') ?: 'school123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Fallback for localhost
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=laravel_myschools;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e2) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Legacy mysqli connection for backward compatibility
$servername = $host;
$username_db = $username;
$password_db = $password;
$dbname = $database;

$connection = new mysqli($servername, $username_db, $password_db, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
