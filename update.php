<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/create.css">
    <title>Update Data</title>
</head>

<body>
    <div class="form-container">
        <h2>Perbarui Data Permintaan Layanan</h2>
        <?php
        $conn = new mysqli("localhost", "root", "", "crud_db");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM website_requests WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $email = $row['email'];
                $service = $row['service'];
            } else {
                die("Data tidak ditemukan.");
            }
        } else {
            die("ID tidak diberikan.");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $service = $_POST['service'];

            $update_sql = "UPDATE website_requests SET name = ?, email = ?, service = ? WHERE id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("sssi", $name, $email, $service, $id);

            if ($stmt->execute()) {
                header("Location: index.php");
                exit();
            } else {
                echo "<p class='error'>Gagal mengupdate data: " . $conn->error . "</p>";
            }

            $stmt->close();
        }

        $conn->close();
        ?>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="name">Nama:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="service">Layanan:</label>
            <input type="text" name="service" value="<?php echo htmlspecialchars($service); ?>" required>

            <input type="submit" class="btn" value="Perbarui Data">
        </form>
    </div>
</body>
</html>
