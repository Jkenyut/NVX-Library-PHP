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

// mengambil id buku dari url
$id_buku = (int)$_GET['id_buku'];

$buku = select("SELECT * FROM tb_buku WHERE id_buku = $id_buku")[0];

//notif
if (isset($_POST['ubah'])) {
    if (update_buku($_POST) >  0) {
        echo "<script>
                alert('Data Buku Berhasil Diubah');
                document.location.href = 'buku.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Buku Gagal Diubah');
                document.location.href = 'buku.php';
                </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Update Buku</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

        <div class="mb-3">
            <label for="kode" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $buku['kode_buku'] ?>" placeholder="Kode Buku" required>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul_buku'] ?>" placeholder="Judul Buku" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis Buku</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku['penulis_buku'] ?>" placeholder="Penulis Buku" required>
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit Buku</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit_buku'] ?>" placeholder="Penerbit Buku" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun Terbit</label>
            <input type="text" class="form-control" placeholder="Tahun Terbit" id="tahun" name="tahun" value="<?= $buku['tahun_penerbit'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" placeholder="Stok Buku" id="stok" name="stok" value="<?= $buku['stok'] ?>" required>
        </div>

        <button type="submit" name="ubah" class="btn btn-success" style="float: right;">Ubah</button>
    </form>
</div>
<?php
include 'layout/footer.php';
?>