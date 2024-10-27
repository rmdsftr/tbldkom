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
    <title>Pendataan Anggota</title>
    <link rel="stylesheet" href="anggota.css">
</head>
<body>
    <nav>
        <img src="assets/icon profile.png" alt="">
        <h1><?php echo $_SESSION['username']; ?></h1>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="kelolaBuku.php">Kelola Buku</a></li>
            <li class="warna"><a href="anggota.php">Anggota</a></li>
            <li><a href="peminjaman.php">Peminjaman</a></li>
            <li><button><a href="logout.php">Logout</a></button></li>
        </ul>
    </nav>

    <main>
        <div class="container">
            <div class="judul">
                <h2>Pendataan Anggota Perpustakaan
                    <br>Universitas Andalas
                </h2>
            </div>

            <div>
                <table>
                    <thead>
                        <th>Nomor Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Username</th>
                        <th>Tanggal Bergabung</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>

                    <?php
                        $ambil = mysqli_query($conn,"SELECT * FROM users");
                        while ($pecah = mysqli_fetch_assoc($ambil)){
                    ?>

                        <tr>
                            <td><?php echo $pecah['nomor_anggota']; ?></td>
                            <td><?php echo $pecah['nama_lengkap']; ?></td>
                            <td><?php echo $pecah['username']; ?></td>
                            <td><?php echo $pecah['tanggal_bergabung']; ?></td>
                            <td><?php echo $pecah['email']; ?></td>
                            <td><?php $jenis_kelamin = $pecah['jenis_kelamin']; 
                                if($jenis_kelamin=='Laki-Laki')
                                    {echo "Laki-Laki";}
                                else
                                    {echo "Perempuan";}
                                ?>
                            </td>
                            <td><?php echo $pecah['password']; ?></td>
                            <td>
                                <ul>
                                    <li><button class="hapus" style="color: white;font-family: 'Poppins';font-weight: 500;" onclick="konfirmasiHapus('<?php echo $pecah['username'];?>')">Hapus</button></li>
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
    function konfirmasiHapus(username) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data?");
        if (konfirmasi) {
            window.location.href = "hapusUser.php?id=" + username;
        } else {
            alert("Penghapusan dibatalkan.");
        }
    }
</script>


</body>
</html>