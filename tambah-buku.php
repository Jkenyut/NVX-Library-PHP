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

//notif
if (isset($_POST['tambah'])) {
    if (create_buku($_POST) >  0) {
        echo "<script>
                alert('Data Buku Berhasil Ditambahkan');
                document.location.href = 'buku.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Buku Gagal Ditambahkan');
                document.location.href = 'buku.php';
                </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Tambah Buku</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Buku" required>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis Buku</label>
            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis Buku" required>
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit Buku</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit Buku" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control" placeholder="Tahun Terbit" id="tahun" name="tahun" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" placeholder="Stok Buku" id="stok" name="stok" required>
        </div>

        <button type="submit" name="tambah" class="btn btn-success" style="float: right;">Submit</button>
    </form>
</div>
<?php
include 'layout/footer.php';
?>