<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $service = $_POST["service"];
    
    $conn = new mysqli("localhost", "root", "", "crud_db");
    
    if ($conn->connect_error) {
        $message = "Koneksi database gagal: " . $conn->connect_error;
    } else {
        $stmt = $conn->prepare("INSERT INTO website_requests (name, email, service) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $service);

        if ($stmt->execute()) {
            $message = "Permintaan berhasil dikirim!";
            header('Location: dashboard.php');
        } else {
            $message = "Gagal mengirim permintaan.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Layanan Website</title>
    <link rel="stylesheet" href="assets/create.css">
</head>
<body>
    <div class="form-container">
    <h2>Permintaan Layanan Pembuatan Website</h2>
    
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <form method="POST" action="">
        <label for="name">Nama Anda:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email Anda:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="service">Layanan yang Dibutuhkan:</label>
        <select id="service" name="service" required>
            <option value="">Pilih Layanan</option>
            <option value="Desain Website">Desain Website</option>
            <option value="Pengembangan Website">Pengembangan Website</option>
            <option value="SEO">Optimisasi SEO</option>
        </select>
        
        <input type="submit" value="Kirim Permintaan">
    </form>
    </div>
</body>
</html>
