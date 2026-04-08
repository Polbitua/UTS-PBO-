<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
    <h1>Sistem Akademik Sederhana</h1>
</header>

<main>
    <div class="card">
        <h2>Menu Navigasi</h2>
        <ul class="menu">
            <li><a href="mahasiswa.php">➤ Data Mahasiswa</a></li>
            <li><a href="matakuliah.php">➤ Data Mata Kuliah</a></li>
            <li><a href="nilai.php">➤ Input Nilai</a></li>
            <li><a href="khs.php">➤ Cetak KHS</a></li>
        </ul>
    </div>
</main>
</body>
</html>
