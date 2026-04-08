<?php
require_once "classes/Mahasiswa.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak KHS</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
    <h1>Kartu Hasil Studi (KHS)</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="matakuliah.php">Mata Kuliah</a>
        <a href="nilai.php">Input Nilai</a>
    </nav>
</header>

<main>
    <h2>Daftar KHS Mahasiswa</h2>

    <?php if(empty($_SESSION['mahasiswa'])): ?>
        <div class="alert error">Belum ada data mahasiswa.</div>
    <?php else: ?>
        <?php foreach($_SESSION['mahasiswa'] as $mhs): ?>
            <div class="card">
                <h3><?= $mhs->getNama() ?> (<?= $mhs->getNim() ?>)</h3>
                <?php $mhs->cetak(); ?>
                <button onclick="window.print()" class="btn-print">Cetak / Simpan PDF</button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Tombol kembali -->
    <a href="index.php" class="btn-back">← Kembali</a>
</main>
</body>
</html>
