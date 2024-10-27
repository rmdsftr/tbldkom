<?php
    include('koneksi.php');

    $kode = $_GET["id"];

    $hasil = mysqli_query($conn, "DELETE FROM users WHERE username='$kode'");

    if ($hasil) {
        echo "<script>
                    alert('Data anggota berhasil dihapus');
                    document.location.href='anggota.php';
                </script>";
    } else {
        echo "
            <script>
                alert('Data anggota gagal dihapus');
                document.location.href='anggota.php';
            </script>
        ";
    }
?>
