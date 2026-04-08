<?php
require_once "classes/MataKuliah.php";
session_start();

if(!isset($_SESSION['matakuliah'])) $_SESSION['matakuliah'] = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks  = $_POST['sks'];
    $mk = new MataKuliah($kode, $nama, $sks);
    $_SESSION['matakuliah'][$kode] = $mk;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mata Kuliah</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="card">
    <h2>Tambah Mata Kuliah</h2>
    <form method="POST">
        <input type="text" name="kode" placeholder="Kode" required>
        <input type="text" name="nama" placeholder="Nama Mata Kuliah" required>
        <input type="number" name="sks" placeholder="SKS" required>
        <button type="submit">Simpan</button>
    </form>
</div>

<h3>Daftar Mata Kuliah</h3>
<table class="table">
    <tr><th>Kode</th><th>Nama</th><th>SKS</th></tr>
    <?php foreach($_SESSION['matakuliah'] as $mk): ?>
        <tr>
            <td><?= $mk->getKode() ?></td>
            <td><?= $mk->getNama() ?></td>
            <td><?= $mk->getSks() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php" class="btn-back">← Kembali</a>
</body>
</html>
