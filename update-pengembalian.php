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
// mengambil id pengembalian dari url
$id_pengembalian = (int)$_GET['id_pengembalian'];

$pengembalian = select("SELECT * FROM tb_pengembalian WHERE id_pengembalian = $id_pengembalian")[0];
?>
<div class="container mt-5">
    <h1>Tambah Pengembalian</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_pengembalian" value="<?= $pengembalian['id_pengembalian']; ?>">
        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" value="<?= $pengembalian['qty'] ?>" placeholder="Quantity" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="datetime-local" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?= $pengembalian['tanggal_pengembalian']; ?>" placeholder=" Tanggal Pengembalian" required>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">Kode Buku</label>
            <select name="id_buku">
                <option value="<?= $pengembalian['id_buku']; ?>"></option>
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
                <option value="<?= $pengembalian['id_anggota']; ?>"></option>
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
                <option value="<?= $pengembalian['id_petugas']; ?>"></option>
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
    $sql = "UPDATE tb_pengembalian ";
    $sql .= " SET qty = '" . $_POST['qty'] . "',";
    $sql .= " tanggal_pengembalian = '" . $_POST['tanggal_pengembalian'] . "',";
    $sql .= " id_buku = '" . $_POST['id_buku'] . "',";
    $sql .= " id_anggota = '" . $_POST['id_anggota'] . "',";
    $sql .= " id_petugas = '" . $_POST['id_petugas'] . "'";
    $sql .= " WHERE id_pengembalian = '" . $_POST['id_pengembalian'] .  "'";
    // echo $sql;
    mysqli_query($db_connect, $sql) or die(mysqli_error($db_connect));

    echo "<script>alert('Data Telah Tersimpan');
    document.location.href = 'pengembalian.php';</script>'";
}

include 'layout/footer.php';
?>