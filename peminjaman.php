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
$data_peminjaman = select("SELECT * FROM tb_peminjaman ORDER BY id_peminjaman ASC")
?>

<div class="container mt-5">
    <h1>Data Peminjaman</h1>
    <a href="tambah-peminjaman.php" class="btn btn-primary mb-1">Tambah</a>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Quantity</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Id Buku</th>
                <th>Id Anggota</th>
                <th>Id Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_peminjaman as $peminjaman) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $peminjaman['qty']; ?></td>
                    <td><?= date('d/m/Y', strtotime($peminjaman['tanggal_pinjam'])); ?></td>
                    <td><?= $peminjaman['tanggal_kembali']; ?></td>
                    <td><?= $peminjaman['id_buku']; ?></td>
                    <td><?= $peminjaman['id_anggota']; ?></td>
                    <td><?= $peminjaman['id_petugas']; ?></td>
                    <td width="15%" class="text-center">
                        <a href="update-peminjaman.php?id_peminjaman=<?= $peminjaman['id_peminjaman']; ?>" class="btn btn-info">Ubah</a>
                        <a href="delete-peminjaman.php?id_peminjaman=<?= $peminjaman['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include 'layout/footer.php';
?>