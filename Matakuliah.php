<?php
class MataKuliah {
    private $kode;
    private $nama;
    private $sks;

    public function __construct($kode, $nama, $sks) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->sks = $sks;
    }

    public function getNama() { return $this->nama; }
    public function getKode() { return $this->kode; }
    public function getSks() { return $this->sks; }
}
?>
