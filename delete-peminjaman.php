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

$id_peminjaman = (int)$_GET['id_peminjaman'];
if (delete_peminjaman($id_peminjaman) > 0) {
    echo "<script>
            alert('Data Peminjaman Berhasil Dihapus');
            document.location.href = 'peminjaman.php';
        </script>";
} else {
    echo "<script>
            alert('Data Peminjaman Tidak Berhasil Dihapus');
            document.location.href = 'peminjaman.php';
        </script>";
}
