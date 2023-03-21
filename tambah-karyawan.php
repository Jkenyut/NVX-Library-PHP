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
    if (create_karyawan($_POST) >  0) {
        echo "<script>
                alert('Data Anggota Berhasil Ditambahkan');
                document.location.href = 'karyawan.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Anggota Gagal Ditambahkan');
                document.location.href = 'karyawan.php';
                </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Tambah Karyawan</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Karyawan</label>
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Karyawan" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Karyawan" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan Karyawan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Karyawan" required>
        </div>

        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" placeholder="Nomor HP" id="noHp" name="noHp" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat Karyawan" id="alamat" name="alamat" required>
        </div>

        <button type="submit" name="tambah" class="btn btn-success" style="float: right;">Submit</button>
    </form>
</div>
<?php
include 'layout/footer.php';
?>