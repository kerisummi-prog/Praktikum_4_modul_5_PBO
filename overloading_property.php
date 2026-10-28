<?php
declare(strict_types=1);
header('Content-Type: text/html; charset=utf-8');

class MahasiswaDinamis {
    private array $atributTambahan = [];

    public function __construct(public string $nim, public string $nama) {}

    public function __set(string $key, mixed $value): void {
        echo "[__set dipanggil: $key]<br>";
        $diizinkan = ['hobi', 'asalSekolah', 'agama'];
        if (!in_array($key, $diizinkan, true)) {
            throw new InvalidArgumentException('Atribut tidak diizinkan');
        }
        $this->atributTambahan[$key] = $value;
    }

    public function __get(string $key): mixed {
        echo "[__get dipanggil: $key]<br>";
        if (!array_key_exists($key, $this->atributTambahan)) {
            throw new OutOfBoundsException('Atribut tidak ditemukan');
        }
        return $this->atributTambahan[$key];
    }

    public function __isset(string $key): bool {
        echo "[__isset dipanggil: $key]<br>";
        return isset($this->atributTambahan[$key]);
    }

    public function __unset(string $key): void {
        echo "[__unset dipanggil: $key]<br>";
        unset($this->atributTambahan[$key]);
    }
}

$mhs = new MahasiswaDinamis('231001', 'Alya');

$mhs->hobi = 'Membaca';                                        // menulis -> __set
echo htmlspecialchars($mhs->hobi, ENT_QUOTES, 'UTF-8') . "<br>"; // membaca -> __get
echo isset($mhs->hobi) ? "hobi ada<br>" : "hobi tidak ada<br>";   // isset() -> __isset
unset($mhs->hobi);                                               // unset() -> __unset
echo isset($mhs->hobi) ? "hobi ada<br>" : "hobi tidak ada<br>";

// Uji kesalahan 1: menulis atribut yang tidak diizinkan
try {
    $mhs->alamat = 'Sukabumi';
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException: " . $e->getMessage() . "<br>";
}

// Uji kesalahan 2: membaca atribut yang belum pernah diisi
try {
    echo $mhs->agama;
} catch (OutOfBoundsException $e) {
    echo "OutOfBoundsException: " . $e->getMessage() . "<br>";
}
