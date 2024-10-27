<?php 
    include 'koneksi.php';

    $id_pinjam = $_POST['id_pinjam'];
    $username = $_POST['username'];
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $denda = $_POST['denda'];

    $query_insert = mysqli_query($conn, "INSERT INTO riwayat (id_pinjam, username, kode_buku, judul_buku, pengarang, jumlah, tanggal_pinjam, tanggal_jatuh_tempo, tanggal_kembali, denda) VALUES ('$id_pinjam', '$username', '$kode_buku', '$judul_buku', '$pengarang', '$jumlah', '$tanggal_pinjam', '$tanggal_jatuh_tempo', '$tanggal_kembali', '$denda')");

    if($query_insert){

        $hasil = mysqli_query($conn, "DELETE FROM peminjaman WHERE id_pinjam='$id_pinjam'");

        if ($hasil) {
            header("location: peminjaman.php?berhasil=yes");
        } else {
            header("location: peminjaman.php?berhasil=no");
        }
    } else {
        header("location: peminjaman.php?berhasil=no");
    }
?>
