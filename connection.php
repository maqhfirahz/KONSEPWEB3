<?php
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'crud_db';

$conn = new mysqli($host, $db_user, $db_pass);

if ($conn->connect_error) {
    die("Koneksi ke server gagal: " . $conn->connect_error);
}

if (!$conn->select_db($db_name)) {
    $create_db_sql = "CREATE DATABASE $db_name";
    if ($conn->query($create_db_sql) === TRUE) {
        echo "Database berhasil dibuat: $db_name\n";
    } else {
        die("Gagal membuat database: " . $conn->error);
    }
}

$conn->select_db($db_name);

$create_users_table = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
";

if (!$conn->query($create_users_table)) {
    die("Gagal membuat tabel users: " . $conn->error);
}

$create_website_requests_table = "
CREATE TABLE IF NOT EXISTS website_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    service VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

if (!$conn->query($create_website_requests_table)) {
    die("Gagal membuat tabel website_requests: " . $conn->error);
}

return $conn;
?>
