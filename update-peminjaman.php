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
// mengambil id peminjaman dari url
$id_peminjaman = (int)$_GET['id_peminjaman'];

$peminjaman = select("SELECT * FROM tb_peminjaman WHERE id_peminjaman = $id_peminjaman")[0];

?>
<div class="container mt-5">
    <h1>Tambah Peminjaman</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">
        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" value="<?= $peminjaman['qty'] ?>" placeholder="Quantity" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam']; ?>" placeholder=" Tanggal Peminjaman" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali']; ?>" placeholder=" Tanggal Kembali" required>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">Kode Buku</label>
            <select name="id_buku">
                <option value="<?= $peminjaman['id_buku']; ?>"></option>
                <?php
                include "config/koneksi.php";
                $query = mysqli_query($db_connect, "SELECT * FROM tb_buku") or die(mysqli_error($db_connect));
                while ($data = mysqli_fetch_array($query)) {
                    echo "<option value=$data[id_buku]> $data[kode_buku]</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_anggota" class="form-label">Kode Anggota</label>
            <select name="id_anggota">
                <option value="<?= $peminjaman['id_anggota']; ?>"></option>
                <?php
                include "config/koneksi.php";
                $query = mysqli_query($db_connect, "SELECT * FROM tb_anggota") or die(mysqli_error($db_connect));
                while ($data = mysqli_fetch_array($query)) {
                    echo "<option value=$data[id_anggota]> $data[kode_anggota]</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_petugas" class="form-label">Kode Karyawan</label>
            <select name="id_petugas">
                <option value="<?= $peminjaman['id_petugas']; ?>"></option>
                <?php
                include "config/koneksi.php";
                $query = mysqli_query($db_connect, "SELECT * FROM tb_karyawan") or die(mysqli_error($db_connect));
                while ($data = mysqli_fetch_array($query)) {
                    echo "<option value=$data[id_petugas]> $data[kode_petugas]</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="ubah" class="btn btn-success" style="float: right;">Ubah</button>
    </form>
</div>
<?php
if (isset($_POST['ubah'])) {
    $sql = "UPDATE tb_peminjaman ";
    $sql .= " SET qty = '" . $_POST['qty'] . "',";
    $sql .= " tanggal_pinjam = '" . $_POST['tanggal_pinjam'] . "',";
    $sql .= " tanggal_kembali = '" . $_POST['tanggal_kembali'] . "',";
    $sql .= " id_buku = '" . $_POST['id_buku'] . "',";
    $sql .= " id_anggota = '" . $_POST['id_anggota'] . "',";
    $sql .= " id_petugas = '" . $_POST['id_petugas'] . "'";
    $sql .= " WHERE id_peminjaman = '" . $_POST['id_peminjaman'] .  "'";
    // echo $sql;
    mysqli_query($db_connect, $sql) or die(mysqli_error($db_connect));

    echo "<script>alert('Data Telah Tersimpan');
    document.location.href = 'peminjaman.php';</script>'";
}
include 'layout/footer.php';
?>