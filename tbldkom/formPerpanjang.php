<?php
    include 'koneksi.php';
    $kode = $_GET["id"];
    $query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_pinjam='$kode'");
    $pecah = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpanjangan Peminjaman Buku</title>
    <link rel="stylesheet" href="formPerpanjang.css">
</head>
<body>
    <main>
        <p>Username Peminjam</p>
        <h3><?php echo $pecah['username']; ?></h3>
        <p>Kode Buku</p>
        <h3><?php echo $pecah['kode_buku']; ?></h3>
        <p>Judul Buku</p>
        <h3><?php echo $pecah['judul_buku']; ?></h3>
        <p>Jumlah Buku yang Dipinjam</p>
        <h3><?php echo $pecah['jumlah']; ?></h3>
        <p>Tanggal Peminjaman</p>
        <h3><?php echo $pecah['tanggal_pinjam']; ?></h3>
        <form action="ubahTanggal.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_pinjam" value="<?php echo $pecah['id_pinjam']; ?>">
            <p>Tanggal Jatuh Tempo</p>
            <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" value="<?php echo $pecah['tanggal_jatuh_tempo'];  ?>">
            <br>
            <button class="konfirmasi" type="submit" name="submit">KONFIRMASI</button>
            <br>
            <button><a href="peminjaman.php">Batalkan</a></button>
        </form>
    </main>
</body>
</html>