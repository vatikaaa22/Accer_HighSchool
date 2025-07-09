<?php
echo "<h1>Database Connection Test</h1>";

// Test environment variable
echo "<h2>Environment Variables:</h2>";
echo "DB_HOST: " . (getenv('DB_HOST') ?: 'not set') . "<br>";
echo "DB_NAME: " . (getenv('DB_NAME') ?: 'not set') . "<br>";
echo "DB_USER: " . (getenv('DB_USER') ?: 'not set') . "<br>";
echo "DB_PASSWORD: " . (getenv('DB_PASSWORD') ?: 'not set') . "<br>";

echo "<h2>Connection Test:</h2>";

$host = getenv('DB_HOST') ?: 'db';
$database = getenv('DB_NAME') ?: 'laravel_myschools';
$username = getenv('DB_USER') ?: 'school_user';
$password = getenv('DB_PASSWORD') ?: 'school123';

echo "Trying to connect to: $host with user: $username<br>";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✓ PDO Connection successful!</p>";
    
    // Test query
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "<p style='color: green;'>✓ Tables found: " . implode(', ', $tables) . "</p>";
    
    // Test users table
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p style='color: green;'>✓ Users count: " . $result['count'] . "</p>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Connection failed: " . $e->getMessage() . "</p>";
}

// Test mysqli
try {
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        throw new Exception("MySQLi Connection failed: " . $conn->connect_error);
    }
    
    echo "<p style='color: green;'>✓ MySQLi Connection successful!</p>";
    $conn->close();
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ MySQLi failed: " . $e->getMessage() . "</p>";
}
?>