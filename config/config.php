<?php
try {
    $host = "localhost";
    $dbname = "weblog";
    $pass = "";
    $user = "root";
    $conn = new PDO("mysql:host=$host;dbname=$dbname",
        $user, $pass);
    echo "Connected to $dbname at $host successfully.";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}



