<?php
declare(strict_types=1);
header('Content-Type: text/html; charset=utf-8');

class Mahasiswa {
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1
    ) {}

    public function profil(): string {
        return "$this->nim - $this->nama (Semester $this->semester)";
    }
}

// Object 1: semua argumen diisi
$mhs = new Mahasiswa('231001', 'Muhti’i', 3);
echo $mhs->profil() . "<br>";

// Object 2: semua argumen diisi
$mhs1 = new Mahasiswa('231002', 'Alya', 4);
echo $mhs1->profil() . "<br>";

// Object 3: argumen semester tidak diisi -> memakai nilai default 1
$mhs2 = new Mahasiswa('231003', 'Budi');
echo $mhs2->profil() . "<br>";

// Uji kesalahan 1: tipe argumen salah (strict_types=1) -> TypeError
try {
    $salah = new Mahasiswa('231004', 'Citra', 'tiga');
} catch (TypeError $e) {
    echo "TypeError: " . $e->getMessage() . "<br>";
}

// Uji kesalahan 2: jumlah argumen kurang -> ArgumentCountError
try {
    $kurang = new Mahasiswa('231005');
} catch (ArgumentCountError $e) {
    echo "ArgumentCountError: " . $e->getMessage() . "<br>";
}
