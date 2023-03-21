<?php
session_start();

//Membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Login Terlebih Dahulu');
    document.location.href = 'login.php';
    </script>";
    exit;
}
include 'config/app.php';

$id_pengembalian = (int)$_GET['id_pengembalian'];
if (delete_pengembalian($id_pengembalian) > 0) {
    echo "<script>
            alert('Data Pengembalian Berhasil Dihapus');
            document.location.href = 'pengembalian.php';
        </script>";
} else {
    echo "<script>
            alert('Data Pengembalian Tidak Berhasil Dihapus');
            document.location.href = 'pengembalian.php';
        </script>";
}
