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
$data_anggota = select("SELECT * FROM tb_anggota ORDER BY id_anggota ASC")

?>

<div class="container mt-5">
    <h1>Data Anggota</h1>
    <a href="tambah-anggota.php" class="btn btn-primary mb-1">Tambah</a>
    <form action="" method="get">
        <label for="cari">Cari anggota:</label>
        <input type="text" name="cari">
    </form>
    <br>
    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            //  searching anggota
            if (isset($_GET['cari'])) {
                $data_anggota = select("SELECT * FROM tb_anggota WHERE nama_anggota LIKE '%" . $_GET['cari'] . "%'");
            }
            ?>
            <?php foreach ($data_anggota as $anggota) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $anggota['kode_anggota']; ?></td>
                    <td><?= $anggota['nama_anggota']; ?></td>
                    <td><?= $anggota['jk_anggota']; ?></td>
                    <td><?= $anggota['jurusan_anggota']; ?></td>
                    <td><?= $anggota['no_hp_anggota']; ?></td>
                    <td><?= $anggota['alamat_anggota']; ?></td>
                    <td width="15%" class="text-center">
                        <a href="update-anggota.php?id_anggota=<?= $anggota['id_anggota']; ?>" class="btn btn-info">Ubah</a>
                        <a href="delete-anggota.php?id_anggota=<?= $anggota['id_anggota']; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include 'layout/footer.php';
?>