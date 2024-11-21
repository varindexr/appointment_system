<?php
// config/db.php - MySQL database connection setup

$host = 'localhost';           // MySQL server
$db   = 'custom';  // Your database name
$user = 'root';                // MySQL username
$pass = '';                    // MySQL password (default for XAMPP is empty)
$charset = 'utf8mb4';

// Data Source Name (DSN) to establish a connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Enable exception handling
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // Default fetch mode: associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                    // Disable emulated prepares
];

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo 'Connected successfully'; // Optional, for testing purposes
} catch (\PDOException $e) {
    // Handle the error
    echo "Connection failed: " . $e->getMessage();
}
?>
