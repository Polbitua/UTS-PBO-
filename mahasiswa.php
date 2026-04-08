<?php
require_once "classes/Mahasiswa.php";
session_start();

if(!isset($_SESSION['mahasiswa'])) $_SESSION['mahasiswa'] = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $id = count($_SESSION['mahasiswa']) + 1;
    $mhs = new Mahasiswa($id, $nama, $nim);
    $_SESSION['mahasiswa'][$nim] = $mhs;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="card">
    <h2>Tambah Mahasiswa</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="nim" placeholder="NIM" required>
        <button type="submit">Simpan</button>
    </form>
</div>

<h3>Daftar Mahasiswa</h3>
<table class="table">
    <tr><th>NIM</th><th>Nama</th></tr>
    <?php foreach($_SESSION['mahasiswa'] as $mhs): ?>
        <tr>
            <td><?= $mhs->getNim() ?></td>
            <td><?= $mhs->getNama() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php" class="btn-back">← Kembali</a>
</body>
</html>
