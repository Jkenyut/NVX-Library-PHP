<?php

$db = mysqli_connect('localhost', 'root', '', 'db_perpustakaan', '3306');
$level = $_SESSION['level'] ?? 2;
if ($level == 1) {

    $db_connect =
        mysqli_connect('localhost', 'admin', '', 'db_perpustakaan', '3306');
} else {
    $db_connect =
        mysqli_connect('localhost', 'petugas', '', 'db_perpustakaan', '3306');
}
//cek koneksi dulu
// if (!$db) {
//     echo 'gagal';
// } else {
//     echo 'berhasil';
// }
