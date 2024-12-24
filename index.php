<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <title>WebCreator</title>
</head>

<body>

  <header class="header">
    <div class="logo">
      <h1>Web.Png</h1>
    </div>

    <button class="nav-toggle-button" onclick="document.querySelector('.nav-container').classList.toggle('open')">
      <span class="burger-icon">&#9776;</span>
    </button>

    <div class="nav-container">
      <nav class="nav">
        <a href="home.php" class="nav-link">Beranda</a>
        <a href="register.php" class="nav-link">Daftar</a>
        <a href="login.html" class="nav-link">Login</a>
      </nav>
    </div>
  </header>

  <main class="main-content">
    <section class="hero">
      <h2>Mulai Perjalanan Bisnis Digital Anda dengan Website Profesional</h2>
      <p>Kami hadir untuk membantu bisnis Anda memiliki website profesional, modern, dan fungsional yang dapat meningkatkan daya tarik pelanggan dan penjualan Anda.</p>
      <button class="cta-button"><a href="register.php">Daftar</a></button>
    </section>
  </main>

  <footer class="footer">
    <p>&copy; 2024 Makpi, Hak Cipta Dilindungi Undang Undang.</p>
  </footer>

  <script>
    document.querySelector('.nav-toggle-button').addEventListener('click', function () {
      document.querySelector('.nav-container').classList.toggle('open');
    });
  </script>

</body>

</html>
