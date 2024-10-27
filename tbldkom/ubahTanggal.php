<?php 
    include 'koneksi.php';

    if(isset($_POST['submit'])){

        $id_pinjam = $_POST['id_pinjam'];
        $tanggal_jatuh_tempo = $_POST['tanggal_jatuh_tempo'];

        $query = mysqli_query($conn, "UPDATE peminjaman SET 
            tanggal_jatuh_tempo = '$tanggal_jatuh_tempo'
            WHERE id_pinjam = '$id_pinjam'");

        if($query){
            header("location:peminjaman.php?berhasil=yes");
        } else {
            echo "Error: " . mysqli_error($conn);
            header("location:peminjaman.php?berhasil=no");
        }
    }

?>