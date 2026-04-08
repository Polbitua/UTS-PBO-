<?php
require_once "User.php";

class Dosen extends User {
    private $nidn;

    public function __construct($id, $nama, $nidn) {
        parent::__construct($id, $nama);
        $this->nidn = $nidn;
    }

    public function getRole() {
        return "Dosen";
    }
}
?>
