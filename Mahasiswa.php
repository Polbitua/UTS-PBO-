<?php
require_once "User.php";
require_once "CetakLaporan.php";

class Mahasiswa extends User implements CetakLaporan {
    private $nim;
    private $nilai = [];

    public function __construct($id, $nama, $nim) {
        parent::__construct($id, $nama);
        $this->nim = $nim;
    }

    public function getRole() {
        return "Mahasiswa";
    }

    // Getter & Setter untuk NIM
    public function getNim() {
        return $this->nim;
    }
    public function setNim($nimBaru) {
        $this->nim = $nimBaru;
    }

    // Getter & Setter untuk Nama (warisan dari User)
    public function getNama() {
        return $this->nama;
    }
    public function setNama($namaBaru) {
        $this->nama = $namaBaru;
    }

    // Konversi huruf mutu ke bobot angka
    private function konversiNilai($huruf) {
        $map = [
            "A"  => 4.0,
            "AB" => 3.5,
            "B"  => 3.0,
            "BC" => 2.5,
            "C"  => 2.0,
            "CD" => 1.5,
            "D"  => 1.0,
            "E"  => 0.0
        ];
        return $map[$huruf] ?? 0;
    }

    // Input nilai huruf
    public function inputNilai($matkul, $huruf) {
        $this->nilai[$matkul] = $huruf;
    }

    // Hitung IPK dari rata-rata bobot
    public function hitungIPK() {
        if(empty($this->nilai)) return 0;
        $total = 0;
        foreach($this->nilai as $huruf) {
            $total += $this->konversiNilai($huruf);
        }
        return $total / count($this->nilai);
    }

    // Cetak KHS
    public function cetak() {
        echo "<table class='table'>
                <tr><th>Mata Kuliah</th><th>Nilai Huruf</th><th>Bobot</th></tr>";
        foreach($this->nilai as $matkul => $huruf){
            echo "<tr>
                    <td>$matkul</td>
                    <td>$huruf</td>
                    <td>".$this->konversiNilai($huruf)."</td>
                  </tr>";
        }
        echo "</table>";
        echo "<p><strong>IPK: " . number_format($this->hitungIPK(),2) . "</strong></p>";
    }

    public function getNilai() {
        return $this->nilai;
    }
}
?>
