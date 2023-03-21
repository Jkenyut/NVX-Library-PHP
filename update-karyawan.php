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

// mengambil id Karyawan dari url
$id_karyawan = (int)$_GET['id_petugas'];

$karyawan = select("SELECT * FROM tb_karyawan WHERE id_petugas = $id_karyawan")[0];

//notif
if (isset($_POST['ubah'])) {
    if (update_karyawan($_POST) >  0) {
        echo "<script>
                alert('Data Karyawan Berhasil Diubah');
                document.location.href = 'karyawan.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Karyawan Gagal Diubah');
                document.location.href = 'karyawan.php';
                </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Update Karyawan</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_petugas" value="<?= $karyawan['id_petugas']; ?>">

        <div class="mb-3">
            <label for="kode" class="form-label">Kode Karyawan</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $karyawan['kode_petugas'] ?>" placeholder="Kode Karyawan" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $karyawan['nama_petugas'] ?>" placeholder="Nama Petugas" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan Karyawan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $karyawan['jabatan_petugas'] ?>" placeholder="Jabatan Karyawan" required>
        </div>

        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" placeholder="Nomor Hp Karyawan" id="noHp" name="noHp" value="<?= $karyawan['no_hp_petugas'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat Karyawan" id="alamat" name="alamat" value="<?= $karyawan['alamat_petugas'] ?>" required>
        </div>

        <button type="submit" name="ubah" class="btn btn-success" style="float: right;">Ubah</button>
    </form>
</div>
<?php
include 'layout/footer.php';
?>