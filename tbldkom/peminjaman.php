<?php 
    session_start();
    include 'koneksi.php';
    $berhasil = isset($_GET['berhasil']);

    if(!isset($_SESSION['username'])){
        header("location: index.html");
    }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <link rel="stylesheet" href="peminjaman.css">
</head>
<body>
    <nav>
        <img src="assets/icon profile.png" alt="">
        <h1><?php echo $_SESSION['username']; ?></h1>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="kelolaBuku.php">Kelola Buku</a></li>
            <li><a href="anggota.php">Anggota</a></li>
            <li class="pinjam"><a href="">Peminjaman</a></li>
            <li><button><a href="logout.php">Logout</a></button></li>
        </ul>
    </nav>
    
    <div class="menu">
        <div class="barang">
            <h2><a href="#riwayatbarang" class="active">Sedang Dipinjam</a></h2>
        </div>
        <div class="ruang">
            <h2><a href="#riwayatruang">Riwayat Peminjaman</a></h2>
        </div>
    </div>

    <section id="riwayatbarang">
        <main>
            <div class="container">
                <div class="judul">
                    <h2>Data Buku Perpustakaan Universitas Andalas
                        <br>yang Sedang Dipinjam
                    </h2>
                </div>
                <div>
                    <table>
                        <thead>
                            <th>ID Pinjam</th>
                            <th>Username Peminjam</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                        <?php 
                            $ambil = mysqli_query($conn, "SELECT * FROM peminjaman");
                            while ($pecah = mysqli_fetch_assoc($ambil)){
                        ?>
                            <tr>
                                <td><?php echo $pecah['id_pinjam']; ?></td>
                                <td><?php echo $pecah['username']; ?></td>
                                <td><?php echo $pecah['kode_buku']; ?></td>
                                <td><?php echo $pecah['judul_buku']; ?></td>
                                <td><?php echo $pecah['pengarang']; ?></td>
                                <td><?php echo $pecah['jumlah']; ?></td>
                                <td><?php echo $pecah['tanggal_pinjam']; ?></td>
                                <td><?php echo $pecah['tanggal_jatuh_tempo']; ?></td>
                                <td>
                                    <ul>
                                        <li><button class="kembali"><a href="formPengembalian.php?id=<?php echo $pecah['id_pinjam'];?>">Dikembalikan</a></button></li>
                                        <li><button class="panjang"><a href="formPerpanjang.php?id=<?php echo $pecah['id_pinjam'];?>">Perpanjang</a></button></li>
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
    </section>
    <section id="riwayatruang">
        <main>
            <div class="container">
                <div class="judul">
                    <h2>Riwayat Peminjaman Buku Perpustakaan
                        <br>Universitas Andalas
                    </h2>
                </div>
                <div>
                    <table>
                        <thead>
                            <th>ID pinjam</th>
                            <th>Username Peminjam</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                        </thead>
                        <tbody>

                        <?php 
                            $ambil2 = mysqli_query($conn, "SELECT * FROM riwayat");
                            while ($pecah2 = mysqli_fetch_assoc($ambil2)){
                        ?>
                            <tr>
                                <td><?php echo $pecah2['id_pinjam']; ?></td>
                                <td><?php echo $pecah2['username']; ?></td>
                                <td><?php echo $pecah2['kode_buku']; ?></td>
                                <td><?php echo $pecah2['judul_buku']; ?></td>
                                <td><?php echo $pecah2['pengarang']; ?></td>
                                <td><?php echo $pecah2['jumlah']; ?></td>
                                <td><?php echo $pecah2['tanggal_pinjam']; ?></td>
                                <td><?php echo $pecah2['tanggal_jatuh_tempo']; ?></td>
                                <td><?php echo $pecah2['tanggal_kembali']; ?></td>
                                <td><?php echo $pecah2['denda']; ?></td>
                            </tr>

                        <?php 
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

</body>
</html>