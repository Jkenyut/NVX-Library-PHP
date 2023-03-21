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

$id_karyawan = (int)$_GET['id_petugas'];
if (delete_karyawan($id_karyawan) > 0) {
    echo "<script>
            alert('Data Karyawan Berhasil Dihapus');
            document.location.href = 'karyawan.php';
        </script>";
} else {
    echo "<script>
            alert('Data Karyawan Tidak Berhasil Dihapus');
            document.location.href = 'karyawan.php';
        </script>";
}
