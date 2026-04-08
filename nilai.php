<?php
require_once "classes/Mahasiswa.php";
require_once "classes/MataKuliah.php";
session_start();

$error = ""; 
$success = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim   = $_POST['nim'];
    $kode  = $_POST['kode'];
    $huruf = $_POST['nilai']; // nilai huruf mutu

    if(!isset($_SESSION['mahasiswa'][$nim])) {
        $error = "Mahasiswa dengan NIM $nim tidak ditemukan!";
    } elseif(!isset($_SESSION['matakuliah'][$kode])) {
        $error = "Mata kuliah dengan kode $kode tidak ditemukan!";
    } else {
        $namaMK = $_SESSION['matakuliah'][$kode]->getNama();
        $_SESSION['mahasiswa'][$nim]->inputNilai($namaMK, $huruf);
        $success = "Nilai berhasil disimpan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Nilai</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<h2>Input Nilai Mahasiswa</h2>

<?php if($error): ?><div class="alert error"><?= $error ?></div><?php endif; ?>
<?php if($success): ?><div class="alert success"><?= $success ?></div><?php endif; ?>

<form method="POST" class="card">
    <label>Pilih Mahasiswa:</label>
    <select name="nim" required>
        <option value="">-- Pilih Mahasiswa --</option>
        <?php foreach($_SESSION['mahasiswa'] as $mhs): ?>
            <option value="<?= $mhs->getNim() ?>">
                <?= $mhs->getNama() ?> (<?= $mhs->getNim() ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label>Pilih Mata Kuliah:</label>
    <select name="kode" required>
        <option value="">-- Pilih Mata Kuliah --</option>
        <?php foreach($_SESSION['matakuliah'] as $mk): ?>
            <option value="<?= $mk->getKode() ?>">
                <?= $mk->getNama() ?> (<?= $mk->getKode() ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label>Nilai:</label>
    <select name="nilai" required>
        <option value="A">A</option>
        <option value="AB">AB</option>
        <option value="B">B</option>
        <option value="BC">BC</option>
        <option value="C">C</option>
        <option value="CD">CD</option>
        <option value="D">D</option>
        <option value="E">E</option>
    </select>

    <button type="submit">Simpan Nilai</button>
</form>

<a href="index.php" class="btn-back">← Kembali</a>
</body>
</html>
