<?php 
    include 'koneksi.php';

    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $isbn = $_POST['isbn'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];

    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    $result = mysqli_query($conn, "SELECT kode_buku FROM buku WHERE kode_buku = '$kode_buku'");
    if(mysqli_num_rows($result) > 0){
        echo 
        "<script>
            alert ('Terdapat duplicate entry pada kode buku. Data tidak dapat dimasukkan');
            document.location.href='formKelolaBuku.php';
        </script>";
    } else {
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){			
                move_uploaded_file($file_tmp, 'assets/'.$gambar);
                $query = mysqli_query($conn,"INSERT INTO buku (kode_buku, judul_buku, isbn, pengarang, penerbit, kategori, jumlah, gambar) VALUES ('$kode_buku','$judul_buku','$isbn','$pengarang','$penerbit','$kategori','$jumlah','$gambar')");
                if($query){
                    header("location: kelolaBuku.php?berhasil=yes");
                }else{
                    echo "Terjadi kesalahan dalam eksekusi query: " . mysqli_error($conn);
                    header("location: kelolaBuku.php?berhasil=no");
                }
            }else{
                echo 'UKURAN FILE TERLALU BESAR';
                header("location: kelolaBuku.php?berhasil=no");
            }
        }else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            header("location: kelolaBuku.php?berhasil=no");
        }
    }
?>