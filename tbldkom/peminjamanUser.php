<?php 
    session_start();
    include 'koneksi.php';

    if(!isset($_SESSION['username'])){
        header("location: index.html");
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <link rel="stylesheet" href="peminjamanUser.css">
</head>
<body>
    <nav>
        <img src="assets/icon profile.png" alt="">
        <h1><?php echo $_SESSION['username']; ?></h1>
        <ul>
            <li><a href="homepageUser.php">Home</a></li>
            <li class="buku"><a href="">Peminjaman Buku</a></li>
            <li><button><a href="logout.php">Logout</a></button></li>
        </ul>
    </nav>

    <main>

        <form action="" method="get">
            <div class="search">
                <input type="search" name="search" placeholder="Cari berdasarkan judul atau nama pengarang">
                <button type="submit" name="submit" style="font-family: 'Poppins';font-weight: 600;color: white;">Cari</button>
            </div>
        </form>

        <div class="content">

            <?php 

                if(isset($_GET['search'])) {
                    $keyword = $_GET['search'];
                    $query = "SELECT * FROM buku WHERE judul_buku LIKE '%$keyword%' OR pengarang LIKE '%$keyword%'";
                } else {
                    $query = "SELECT * FROM buku";
                }

        
                $ambil = mysqli_query($conn, $query);
                while ($pecah = mysqli_fetch_assoc($ambil)){

            ?>

            <div class="box">
                <img src="assets/<?php echo $pecah['gambar']; ?>" alt="">
                <h4><?php echo $pecah['judul_buku']; ?></h4>
                <p class="pengarang"><?php echo $pecah['pengarang'] ?></p>
                <p class="tersedia">Tersedia : <?php echo $pecah['jumlah']; ?> buku</p>
                <button><a href="formPinjam.php?id=<?php echo $pecah['kode_buku'];?>">Pinjam</a></button>
            </div>

            <?php 
                }
            ?>
        </div>
    </main>

</body>
</html>