<?php 
    include 'koneksi.php';

    $username = $_POST['username'];
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];

    $query_select = mysqli_query($conn, "SELECT jumlah FROM buku WHERE kode_buku='$kode_buku'");
    $data_buku = mysqli_fetch_assoc($query_select);
    $jumlah_buku_sekarang = $data_buku['jumlah'];

    $jumlah_buku_baru = $jumlah_buku_sekarang - $jumlah;

    $query_update = mysqli_query($conn, "UPDATE buku SET jumlah='$jumlah_buku_baru' WHERE kode_buku='$kode_buku'");

    if($query_update){
    
        $query_insert = mysqli_query($conn, "INSERT INTO peminjaman (username, kode_buku, judul_buku, pengarang, jumlah, tanggal_pinjam, tanggal_jatuh_tempo) VALUES ('$username', '$kode_buku', '$judul_buku', '$pengarang', '$jumlah', '$tanggal_pinjam', '$tanggal_jatuh_tempo')");

        if($query_insert){
            echo "<script> 
                    alert('Buku berhasil dipinjam');
                    window.location = 'peminjamanUser.php';
                </script>";
        } else {
            echo "<script>
                    alert('Buku gagal dipinjam');
                    window.location = 'peminjamanUser.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Gagal memperbarui jumlah buku')
                window.location = 'peminjamanUser.php';
            </script>";
    }
?>