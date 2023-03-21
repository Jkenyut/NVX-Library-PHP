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

$id_anggota = (int)$_GET['id_anggota'];
if (delete_anggota($id_anggota) > 0) {
    echo "<script>
            alert('Data Anggota Berhasil Dihapus');
            document.location.href = 'anggota.php';
        </script>";
} else {
    echo "<script>
            alert('Data Anggota Berhasil Dihapus');
            document.location.href = 'anggota.php';
        </script>";
}
