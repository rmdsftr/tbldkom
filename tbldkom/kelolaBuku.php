<?php 
    session_start();
    include 'koneksi.php';
    $berhasil = isset($_GET['berhasil']);
    $a = 1;

    if(!isset($_SESSION['username'])){
        header("location: index.html");
    }

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Buku</title>
    <link rel="stylesheet" href="kelolaBuku.css">
</head>
<body>
    <nav>
        <img src="assets/icon profile.png" alt="">
        <h1><?php echo $_SESSION['username']; ?></h1>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li class="buku"><a href="">Kelola Buku</a></li>
            <li><a href="anggota.php">Anggota</a></li>
            <li><a href="peminjaman.php">Peminjaman</a></li>
            <li><button><a href="index.html">Logout</a></button></li>
        </ul>
    </nav>

    <main>
        <div class="container">
            <div class="judul">
                <h2>Pendataan Buku Perpustakaan
                    <br>Universitas Andalas
                </h2>
            </div>
            <div class="tombol">
                <button><a href="formKelolaBuku.php">+ Tambah data</a></button>
            </div>

            <div>
                <?php if($berhasil=='yes') {?>
                    <strong>Submit Berhasil !</strong> Data sudah masuk ke database.
                <?php } else if ($berhasil=='no') {?>
                    <strong>Submit Gagal !</strong> Data tidak dapat disimpan di database.
                <?php } ?>
            </div>

            <div>
                <table>
                    <thead>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>ISBN</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Cover</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>

                    <?php
                        $ambil = mysqli_query($conn,"SELECT * FROM buku");
                        while ($pecah = mysqli_fetch_assoc($ambil)){
                    ?>

                        <tr>
                            <td><?php echo $pecah['kode_buku']; ?></td>
                            <td><?php echo $pecah['judul_buku']; ?></td>
                            <td><?php echo $pecah['isbn']; ?></td>
                            <td><?php echo $pecah['pengarang']; ?></td>
                            <td><?php echo $pecah['penerbit']; ?></td>
                            <td><?php $kategori = $pecah['kategori']; 
                                if($kategori==1)
                                    {echo "Fiksi";}
                                else
                                    {echo "non-Fiksi";}
                                ?>
                            </td>
                            <td><img src="assets/<?php echo $pecah['gambar']; ?>" alt="" style="width:100px;height: 150px;"></td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td>
                                <ul>
                                    <li><button class="edit"><a href="formEditBuku.php?id=<?php echo $pecah['kode_buku'];?>">Edit</a></button></li>
                                    <li><button class="hapus" style="color: white;font-family: 'Poppins';font-weight: 500;" onclick="konfirmasiHapus('<?php echo $pecah['kode_buku'];?>')">Hapus</button></li>
                                </ul>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
    function konfirmasiHapus(kode_buku) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data?");
        if (konfirmasi) {
            window.location.href = "hapus.php?id=" + kode_buku;
        } else {
            alert("Penghapusan dibatalkan.");
        }
    }
</script>


</body>
</html>