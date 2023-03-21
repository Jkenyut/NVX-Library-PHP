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
$data_buku = select("SELECT * FROM tb_buku ORDER BY id_buku ASC");

?>

<div class="container mt-5">
    <h1>Data Buku</h1>
    <a href="tambah-buku.php" class="btn btn-primary mb-1">Tambah</a>
    <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#modalInfo">Jumlah Buku</button>
    <form action="" method="get">
        <label for="cari">Cari Buku:</label>
        <input type="text" name="cari">
    </form>
    <br>
    <a href=""></a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <?php if ($_SESSION['level'] == 1) : ?>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                // searching buku
                if (isset($_GET['cari'])) {
                    $data_buku = select("SELECT * FROM tb_buku WHERE judul_buku LIKE '%" . $_GET['cari'] . "%'");
                }
                ?>

                <?php foreach ($data_buku as $buku) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $buku['kode_buku']; ?></td>
                        <td><?= $buku['judul_buku']; ?></td>
                        <td><?= $buku['penulis_buku']; ?></td>
                        <td><?= $buku['penerbit_buku']; ?></td>
                        <td><?= $buku['tahun_penerbit']; ?></td>
                        <td><?= $buku['stok']; ?></td>
                        <td width="15%" class="text-center">
                            <a href="update-buku.php?id_buku=<?= $buku['id_buku']; ?>" class="btn btn-info">Ubah</a>
                            <a href="delete-buku.php?id_buku=<?= $buku['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php else : ?>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_buku as $buku) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $buku['kode_buku']; ?></td>
                        <td><?= $buku['judul_buku']; ?></td>
                        <td><?= $buku['penulis_buku']; ?></td>
                        <td><?= $buku['penerbit_buku']; ?></td>
                        <td><?= $buku['tahun_penerbit']; ?></td>
                        <td><?= $buku['stok']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
</div>

<div class="modal" id="modalInfo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <?php
                        $jml_buku = select("SELECT SUM(stok) AS jml_buku FROM tb_buku") ?>
                <?php foreach ($jml_buku as $jumlahbuku) {
                    $array = implode(',', $jumlahbuku);
                    echo $array;
                }
                ?> -->
                <?php
                include "config/koneksi.php";
                $query = mysqli_query($db_connect, "SELECT SUM(stok) AS jml_buku FROM tb_buku") or die(mysqli_error($db_connect));
                $array = mysqli_fetch_array($query);
                echo $array['jml_buku'];
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>