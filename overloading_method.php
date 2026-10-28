<?php
header('Content-Type: text/html; charset=utf-8');

class LaporanMahasiswa {
    public function __construct(private string $nama) {}

    public function __call(string $method, array $args): mixed {
        echo "[__call dipanggil: $method, jumlah argumen: " . count($args) . "]<br>";
        if ($method === 'cetakRingkas' && count($args) === 0) {
            return 'Mahasiswa: ' . $this->nama;
        }
        throw new BadMethodCallException('Method tidak tersedia: ' . $method);
    }
}

$laporan = new LaporanMahasiswa('Alya');

// Method cetakRingkas() tidak dideklarasikan -> ditangani __call()
echo $laporan->cetakRingkas() . "<br>";

// Uji kesalahan 1: nama method yang tidak diizinkan
try {
    $laporan->hapusSemua();
} catch (BadMethodCallException $e) {
    echo "BadMethodCallException: " . $e->getMessage() . "<br>";
}

// Uji kesalahan 2: method diizinkan tetapi jumlah argumen salah
try {
    $laporan->cetakRingkas('x');
} catch (BadMethodCallException $e) {
    echo "BadMethodCallException: " . $e->getMessage() . "<br>";
}
