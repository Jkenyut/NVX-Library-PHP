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
    if (create_anggota($_POST) >  0) {
        echo "<script>
                alert('Data Anggota Berhasil Ditambahkan');
                document.location.href = 'anggota.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Anggota Gagal Ditambahkan');
                document.location.href = 'anggota.php';
                </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Tambah Anggota</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Anggota</label>
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Anggota" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anggota" required>
        </div>

        <div class="mb-3">
            <p>Jenis Kelamin Anggota</p>
            <input type="radio" id="jk1" name="kelamin" value="Laki-laki">
            <label for="jk1">Laki - laki</label><br>
            <input type="radio" id="jk2" name="kelamin" value="Perempuan">
            <label for="jk2">Perempuan</label><br>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan Anggota</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan Anggota" required>
        </div>

        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" placeholder="Nomor HP" id="noHp" name="noHp" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat Anggota" id="alamat" name="alamat" required>
        </div>

        <button type="submit" name="tambah" class="btn btn-success" style="float: right;">Submit</button>
    </form>
</div>
<?php
include 'layout/footer.php';
?>