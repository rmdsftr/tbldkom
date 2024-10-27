<?php
include 'koneksi.php';

if(isset($_POST['submit'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $isbn = $_POST['isbn'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];

    $allowExt = array('png', 'jpg', 'jpeg');
    $fileName = $_FILES['gambar']['name'];
    $fileExt = strtolower(end(explode('.', $fileName))) ?? '';
    $fileSize = $_FILES['gambar']['size'];
    $fileTemp = $_FILES['gambar']['tmp_name'];
    $gambar = $_FILES['gambar']['name']; 

    if($_FILES['gambar']['size']>0) {
        if(in_array($fileExt, $allowExt) === true) {
            if($fileSize < 1044070) {
                if(move_uploaded_file($fileTemp, 'assets/'.$gambar)) {
                    $query = mysqli_query($conn,"UPDATE buku SET 
                        kode_buku = '$kode_buku',
                        judul_buku = '$judul_buku',
                        isbn = '$isbn',
                        pengarang = '$pengarang',
                        penerbit = '$penerbit',
                        kategori = '$kategori',
                        jumlah = '$jumlah',
                        gambar = '$gambar' 
                        WHERE kode_buku = '$kode_buku'");
                    if($query) {
                        header("location:kelolaBuku.php?berhasil=yes");
                    } else {
                        header("location:kelolaBuku.php?berhasil=no");
                    }
                } else {
                    echo 'FILE TIDAK TERUPDATE';
                    header("location:kelolaBuku.php?berhasil=no");   
                }
            } else {
                echo 'UKURAN FILE TERLALU BESAR';
                header("location:kelolaBuku.php?berhasil=no");
            }
        } else {
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            header("location:kelolaBuku.php?berhasil=no");
        }
    } else {
        $query = mysqli_query($conn,"UPDATE buku SET 
            kode_buku = '$kode_buku',
            judul_buku = '$judul_buku',
            isbn = '$isbn',
            pengarang = '$pengarang',
            penerbit = '$penerbit',
            kategori = '$kategori',
            jumlah = '$jumlah' 
            WHERE kode_buku = '$kode_buku'");

        if($query) {
            header("location:kelolaBuku.php?berhasil=yes");
        } else {
            header("location:kelolaBuku.php?berhasil=no");
        }
    }
}
?>