<?php
    include('koneksi.php');

    $kode = $_GET["id"];

    $hasil = mysqli_query($conn, "DELETE FROM buku WHERE kode_buku='$kode'");

    if ($hasil) {
        echo "<script>
                    alert('data berhasil dihapus');
                    document.location.href='kelolaBuku.php';
                </script>";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href='kelolaBuku.php';
            </script>
        ";
    }
?>
