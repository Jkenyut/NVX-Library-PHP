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
$data_pengembalian = select("SELECT * FROM tb_pengembalian ORDER BY id_pengembalian ASC")
?>

<div class="container mt-5">
    <h1>Data Pengembalian</h1>
    <a href="tambah-pengembalian.php" class="btn btn-primary mb-1">Tambah</a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Quantity</th>
                <th>Tanggal Kembali</th>
                <th>Id Buku</th>
                <th>Id Anggota</th>
                <th>Id Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_pengembalian as $pengembalian) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pengembalian['qty']; ?></td>
                    <td><?= $pengembalian['tanggal_pengembalian']; ?></td>
                    <td><?= $pengembalian['id_buku']; ?></td>
                    <td><?= $pengembalian['id_anggota']; ?></td>
                    <td><?= $pengembalian['id_petugas']; ?></td>
                    <td width="15%" class="text-center">
                        <a href="update-pengembalian.php?id_pengembalian=<?= $pengembalian['id_pengembalian']; ?>" class="btn btn-info">Ubah</a>
                        <a href="delete-pengembalian.php?id_pengembalian=<?= $pengembalian['id_pengembalian']; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include 'layout/footer.php';
?>