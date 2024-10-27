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
    <title>Form Pengembalian Buku</title>
    <link rel="stylesheet" href="formPengembalian.css">
</head>
<body>
    
    <div class="container">
        <div class="pinjam">
            <p>ID pinjam</p>
            <h3><?php echo $pecah['id_pinjam']; ?></h3>
            <p>Username Peminjam</p>
            <h3><?php echo $pecah['username']; ?></h3>
            <p>Kode Buku</p>
            <h3><?php echo $pecah['kode_buku']; ?></h3>
            <p>Judul Buku</p>
            <h3><?php echo $pecah['judul_buku']; ?></h3>
            <p>Pengarang</p>
            <h3><?php echo $pecah['pengarang']; ?></h3>
            <p>Jumlah Buku yang Dipinjam</p>
            <h3><?php echo $pecah['jumlah']; ?></h3>
        </div>
        <div class="kembali">
            <p>Tanggal Peminjaman</p>
            <h3><?php echo $pecah['tanggal_pinjam']; ?></h3>
            <p>Tanggal Jatuh Tempo</p>
            <h3><?php echo $pecah['tanggal_jatuh_tempo']; ?></h3>
            <form action="dikembalikan.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_pinjam" value="<?php echo $pecah['id_pinjam']; ?>">
                <input type="hidden" name="username" value="<?php echo $pecah['username']; ?>">
                <input type="hidden" name="kode_buku" value="<?php echo $pecah['kode_buku']; ?>">
                <input type="hidden" name="judul_buku" value="<?php echo $pecah['judul_buku']; ?>">
                <input type="hidden" name="pengarang" value="<?php echo $pecah['pengarang']; ?>">
                <input type="hidden" name="jumlah" value="<?php echo $pecah['jumlah']; ?>">
                <input type="hidden" name="tanggal_pinjam" value="<?php echo $pecah['tanggal_pinjam']; ?>">
                <input type="hidden" name="tanggal_jatuh_tempo" value="<?php echo $pecah['tanggal_jatuh_tempo']; ?>">

                <p>Tanggal Pengembalian</p>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo $pecah['tanggal_jatuh_tempo'];  ?>">
                <br>
                <p>Denda</p>
                <input type="number" min="0" name="denda" id="denda" value="<?php echo $denda ?>" readonly>
                <button class="konfirmasi" type="submit" name="submit">KONFIRMASI</button>
                <br>
                <button><a href="peminjaman.php">Batalkan</a></button>
            </form>
        </div>
    </div>

    <script>
        const tanggalPengembalianInput = document.getElementById('tanggal_kembali');
        const dendaInput = document.getElementById('denda');
        const tanggalJatuhTempo = new Date("<?php echo $pecah['tanggal_jatuh_tempo']; ?>");

        tanggalPengembalianInput.addEventListener('change', function() {
            const tanggalPengembalian = new Date(this.value);
            const selisihHari = Math.ceil((tanggalPengembalian - tanggalJatuhTempo) / (1000 * 60 * 60 * 24));
            const denda = selisihHari > 0 ? selisihHari * 1000 : 0;
            dendaInput.value = denda;
        });

        tanggalPengembalianInput.dispatchEvent(new Event('change'));
    </script>
        
</body>
</html>