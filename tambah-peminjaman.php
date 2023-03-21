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
    <h1>Tambah Peminjaman</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" class="form-control" placeholder="Jumlah Buku Yang Dipinjam" id="qty" name="qty" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Tanggal Peminjaman" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="datetime-local" class="form-control" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Kembali" required>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">Kode Buku</label>
            <select name="id_buku">
                <option>---</option>
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
                <option>---</option>
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
                <option>---</option>
                <?php
                include "config/koneksi.php";
                $query = mysqli_query($db_connect, "SELECT * FROM tb_karyawan") or die(mysqli_error($db_connect));
                while ($data = mysqli_fetch_array($query)) {
                    echo "<option value=$data[id_petugas]> $data[kode_petugas]</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="tambah" class="btn btn-success" style="float: right;">Submit</button>
    </form>
</div>
<?php
if (isset($_POST['tambah'])) {
    mysqli_query($db_connect, "INSERT INTO tb_peminjaman SET 
    qty = '$_POST[qty]',
    tanggal_pinjam = '$_POST[tanggal_pinjam]',
    tanggal_kembali = '$_POST[tanggal_kembali]',
    id_buku = '$_POST[id_buku]',
    id_anggota = '$_POST[id_anggota]',
    id_petugas = '$_POST[id_petugas]'") or die(mysqli_error($db_connect));

    echo "<script>alert('Data Telah Tersimpan');
    document.location.href = 'peminjaman.php';</script>'";
}
include 'layout/footer.php';
?>