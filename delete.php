<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $conn = new mysqli("localhost", "root", "", "crud_db");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "DELETE FROM website_requests WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    }
?>
