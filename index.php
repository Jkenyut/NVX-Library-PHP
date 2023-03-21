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

include 'layout/header.php';
?>

<div class="container mt-5">
    <h1>Data Perpustakaan</h1>
</div>
<?php
include 'layout/footer.php';
?>