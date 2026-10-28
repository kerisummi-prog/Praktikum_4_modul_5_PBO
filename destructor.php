<?php
header('Content-Type: text/html; charset=utf-8');

class DemoSiklus {
    public function __construct() { echo "Object dibuat<br>"; }
    public function tampil(): void { echo "Method dipanggil<br>"; }
    public function __destruct() { echo "Destructor berjalan<br>"; }
}

echo "<b>B1. Dengan unset()</b><br>";
$obj = new DemoSiklus();
$obj->tampil();
unset($obj);
echo "Program dilanjutkan<br><br>";

echo "<b>B2. Dengan alias (dua referensi ke satu object)</b><br>";
$obj2 = new DemoSiklus();
$alias = $obj2;
unset($obj2);
echo "unset(\$obj2) selesai, object masih dipegang \$alias<br>";
unset($alias);
echo "unset(\$alias) selesai<br><br>";

echo "<b>B3. Tanpa unset()</b><br>";
$obj3 = new DemoSiklus();
$obj3->tampil();
echo "Akhir skrip tercapai<br>";
// destructor $obj3 dijalankan otomatis setelah baris ini
