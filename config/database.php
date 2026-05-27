<?php

$envPath = __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    die('Error: .env file not found.');
}

$env = parse_ini_file($envPath);

if ($env === false) {
    die('Error: Could not read .env file.');
}

$host = $env['DB_HOST'] ?? '';
$dbname = $env['DB_NAME'] ?? '';
$username = $env['DB_USER'] ?? '';
$password = $env['DB_PASS'] ?? '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}