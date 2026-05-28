<?php

$envPath = __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    die('Error: .env file not found.');
}

$env = parse_ini_file($envPath);

if ($env === false) {
    die('Error: Could not read .env file.');
}

return [
    'host' => $env['DB_HOST'] ?? '',
    'dbname' => $env['DB_NAME'] ?? '',
    'username' => $env['DB_USER'] ?? '',
    'password' => $env['DB_PASS'] ?? '',
];