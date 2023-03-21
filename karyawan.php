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


// sorting
$data_karyawan = select("SELECT * FROM tb_karyawan ORDER BY id_petugas ASC")

?>

<div class="container mt-5">
    <h1>Data Karyawan</h1>
    <a href="tambah-karyawan.php" class="btn btn-primary mb-1">Tambah</a>
    <form action="" method="get">
        <label for="cari">Cari karyawan:</label>
        <input type="text" name="cari">
    </form>
    <br>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            // searching karyawan
            if (isset($_GET['cari'])) {
                $data_karyawan = select("SELECT * FROM tb_karyawan WHERE nama_petugas LIKE '%" . $_GET['cari'] . "%'");
            }
            ?>
            <?php foreach ($data_karyawan as $karyawan) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $karyawan['kode_petugas']; ?></td>
                    <td><?= $karyawan['nama_petugas']; ?></td>
                    <td><?= $karyawan['jabatan_petugas']; ?></td>
                    <td><?= $karyawan['no_hp_petugas']; ?></td>
                    <td><?= $karyawan['alamat_petugas']; ?></td>
                    <td width="15%" class="text-center">
                        <a href="update-karyawan.php?id_petugas=<?= $karyawan['id_petugas']; ?>" class="btn btn-info">Ubah</a>
                        <a href="delete-karyawan.php?id_petugas=<?= $karyawan['id_petugas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data')">Hapus</a>
                    </td>
                </tr>
                <!-- <?php
                        echo var_dump($karyawan);
                        ?>  -->
            <?php endforeach; ?>
        </tbody>


    </table>
</div>
<?php
include 'layout/footer.php';
?>