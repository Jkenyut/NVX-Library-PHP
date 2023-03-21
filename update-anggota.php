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

// mengambil id anggota dari url
$id_anggota = (int)$_GET['id_anggota'];

$anggota = select("SELECT * FROM tb_anggota WHERE id_anggota = $id_anggota")[0];

//notif
if (isset($_POST['ubah'])) {
    if (update_anggota($_POST) >  0) {
        echo "<script>
                alert('Data Anggota Berhasil Diubah');
                document.location.href = 'anggota.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Anggotad Gagal Diubah');
                document.location.href = 'anggota.php';
                </script>";
    }
}
?>
<div class="container mt-5">
    <h1>Update Anggota</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota']; ?>">

        <div class="mb-3">
            <label for="kode" class="form-label">Kode Anggota</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $anggota['kode_anggota'] ?>" placeholder="Kode Anggota" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota['nama_anggota'] ?>" placeholder="Nama Anggota" required>
        </div>

        <div class="mb-3">
            <p>Jenis Kelamin Anggota</p>
            <input type="radio" id="jk1" name="kelamin" value="Laki-laki">
            <label for="jk1" value="<?= $anggota['jk_anggota'] ?>">Laki - laki</label><br>
            <input type="radio" id="jk2" name="kelamin" value="Perempuan">
            <label for="jk2" value="<?= $anggota['jk_anggota'] ?>">Perempuan</label><br>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan Anggota</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $anggota['jurusan_anggota'] ?>" placeholder="Jurusan Anggota" required>
        </div>

        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" placeholder="Nomor Hp Anggota" id="noHp" name="noHp" value="<?= $anggota['no_hp_anggota'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat Anggota" id="alamat" name="alamat" value="<?= $anggota['alamat_anggota'] ?>" required>
        </div>

        <button type="submit" name="ubah" class="btn btn-success" style="float: right;">Ubah</button>
    </form>
</div>
<?php
include 'layout/footer.php';
?>