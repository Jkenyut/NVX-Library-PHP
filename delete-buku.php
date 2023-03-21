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

$id_buku = (int)$_GET['id_buku'];
if (delete_buku($id_buku) > 0) {
    echo "<script>
            alert('Data Buku Berhasil Dihapus');
            document.location.href = 'buku.php';
        </script>";
} else {
    echo "<script>
            alert('Data Buku Berhasil Dihapus');
            document.location.href = 'buku.php';
        </script>";
}
