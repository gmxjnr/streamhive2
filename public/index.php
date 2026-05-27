<?php

require_once __DIR__ . '/../config/database.php';

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>StreamHive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f8;
            color: #111;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 32px;
            border-radius: 16px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .success {
            color: #15803d;
            font-size: 28px;
            font-weight: bold;
        }

        .small {
            margin-top: 12px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="success">Connected successfully</div>
    <p class="small">PDO database connection is working.</p>
</div>

</body>
</html>