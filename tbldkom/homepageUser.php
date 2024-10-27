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
    <title>Welcome</title>
    <link rel="stylesheet" href="homepageUser.css">
</head>
<body>
    <nav>
        <img src="assets/icon profile.png" alt="">
        <h1><?php echo $_SESSION['username']; ?></h1>
        <ul>
            <li class="home"><a href="">Home</a></li>
            <li><a href="peminjamanUser.php">Peminjaman Buku</a></li>
            <li><button><a href="logout.php">Logout</a></button></li>
        </ul>
    </nav>

    <main>
        <div class="content">

            <div>
                <h1>Selamat Datang
                    <br>di Perpustakaan
                    <br><span>Universitas Andalas</span></h1>
            </div>

            <div>
                <p>
                    Kampus Limau Manis <br>Kec. Pauh, Padang
                </p>
            </div>
        </div>
    </main>

    <footer>
        <div class="wa">
            <img src="assets/whatsapp.png" alt="">
            <p>+62 751 72725</p>
        </div>
        <div class="ig">
            <img src="assets/instagram.png" alt="">
            <p>@unand_library</p>
        </div>
        <div class="em">
            <img src="assets/email.png" alt="">
            <p>pustaka@unand.ac.id</p>
        </div>
    </footer>
</body>
</html>