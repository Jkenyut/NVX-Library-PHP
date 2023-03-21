<?php


function select($query)
{
    //Panggil koneksi database
    global $db_connect;

    $result = mysqli_query($db_connect, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi menambahkan data buku
function create_buku($post)
{
    global  $db_connect;

    $kode = $post['kode'];
    $judul = $post['judul'];
    $penulis = $post['penulis'];
    $penerbit = $post['penerbit'];
    $tahun = $post['tahun'];
    $stok = $post['stok'];

    //query
    $query = "INSERT INTO tb_buku VALUES(null,'$kode', '$judul', '$penulis','$penerbit','$tahun','$stok')";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}
// fungsi update data buku
function update_buku($post)
{
    global $db_connect;

    $id_buku = $post['id_buku'];
    $kode = $post['kode'];
    $judul = $post['judul'];
    $penulis = $post['penulis'];
    $penerbit = $post['penerbit'];
    $tahun = $post['tahun'];
    $stok = $post['stok'];

    $query = "UPDATE tb_buku SET kode_buku = '$kode', judul_buku = '$judul', penulis_buku = '$penulis', penerbit_buku = '$penerbit', tahun_penerbit = '$tahun', stok = '$stok' WHERE id_buku = $id_buku";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}
//fungsi delete data buku
function delete_buku($id_buku)
{
    global $db_connect;

    //query hapus data buku
    $query = "DELETE FROM tb_buku WHERE id_buku = $id_buku";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

// fungsi menambahkan data anggota
function create_anggota($post)
{
    global  $db_connect;

    $kode = $post['kode'];
    $nama = $post['nama'];
    $jk = $post['kelamin'];
    $jurusan = $post['jurusan'];
    $noHp = $post['noHp'];
    $alamat = $post['alamat'];

    //query
    $query = "INSERT INTO tb_anggota VALUES(null,'$kode', '$nama', '$jk','$jurusan','$noHp','$alamat')";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

// fungsi update data anggota
function update_anggota($post)
{
    global $db_connect;

    $id_anggota = $post['id_anggota'];
    $kode = $post['kode'];
    $nama = $post['nama'];
    $jk = $post['kelamin'];
    $jurusan = $post['jurusan'];
    $noHp = $post['noHp'];
    $alamat = $post['alamat'];

    $query = "UPDATE tb_anggota SET kode_anggota = '$kode', nama_anggota = '$nama', jk_anggota = '$jk', jurusan_anggota = '$jurusan', no_hp_anggota = '$noHp', alamat_anggota = '$alamat' WHERE id_anggota = $id_anggota";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}
//fungsi delete data anggota
function delete_anggota($id_anggota)
{
    global $db_connect;

    //query hapus data buku
    $query = "DELETE FROM tb_anggota WHERE id_anggota = $id_anggota";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

// fungsi menambahkan data karyawan
function create_karyawan($post)
{
    global  $db_connect;

    $kode = $post['kode'];
    $nama = $post['nama'];
    $jabatan = $post['jabatan'];
    $noHp = $post['noHp'];
    $alamat = $post['alamat'];

    //query
    $query = "INSERT INTO tb_karyawan VALUES(null,'$kode', '$nama', '$jabatan','$noHp','$alamat')";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

// fungsi update data anggota
function update_karyawan($post)
{
    global $db_connect;

    $id_karyawan = $post['id_petugas'];
    $kode = $post['kode'];
    $nama = $post['nama'];
    $jabatan = $post['jabatan'];
    $noHp = $post['noHp'];
    $alamat = $post['alamat'];

    $query = "UPDATE tb_karyawan SET kode_petugas = '$kode', nama_petugas = '$nama', jabatan_petugas = '$jabatan', no_hp_petugas = '$noHp', alamat_petugas = '$alamat' WHERE id_petugas= $id_karyawan";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}
//fungsi delete data anggota
function delete_karyawan($id_karyawan)
{
    global $db_connect;

    //query hapus data anggota
    $query = "DELETE FROM tb_karyawan WHERE id_petugas = $id_karyawan";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

//fungsi delete data peminjaman
function delete_peminjaman($id_peminjaman)
{
    global $db_connect;

    //query hapus data peminjaman
    $query = "DELETE FROM tb_peminjaman WHERE id_peminjaman = $id_peminjaman";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}


//fungsi create akun
function create_akun($post)
{
    global $db_connect;
    $nama = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    //encrypt pw
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_akun VALUES (null,'$nama', '$username', '$password',  '$level')";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

// fungsi update data akun
function update_akun($post)
{
    global $db_connect;

    $id_akun = $post['id_akun'];
    $nama = $post['nama'];
    $username = $post['username'];
    $password = $post['password'];
    $level = $post['level'];

    //encrypt pw
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE tb_akun SET nama = '$nama', username = '$username', password = '$password', level = '$level' WHERE id_akun= $id_akun";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

//fungsi delete data akun
function delete_akun($id_akun)
{
    global $db_connect;
    mysqli_autocommit($db_connect, FALSE);
    //query hapus data akun
    $query = "DELETE FROM tb_akun WHERE id_akun = $id_akun";
    mysqli_commit($db_connect); //commit

    mysqli_query($db_connect, $query);

    mysqli_rollback($db_connect); //rollback

    return mysqli_affected_rows($db_connect);
}

//fungsi delete data pengembalian
function delete_pengembalian($id_pengembalian)
{
    global $db_connect;

    //query hapus data pengembalian
    $query = "DELETE FROM tb_pengembalian WHERE id_pengembalian = $id_pengembalian";

    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}
