<?php 
    session_start();
    include 'koneksi.php';
    $kode = $_GET["id"];
    $query = mysqli_query($conn,"SELECT * FROM buku WHERE kode_buku='$kode'");
    $pecah = mysqli_fetch_assoc($query);

    if(!isset($_SESSION['username'])){
        header("location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="formPinjam.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

        <div class="formpinjam">
            <form action="submitPinjam.php" method="post" enctype="multipart/form-data">
                <div>
                    <img src="assets/<?php echo $pecah['gambar']; ?>" alt="" name="gambar" id="gambar">
                </div>
                <div class="peminjam">
                    <label for="">Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" value="<?php echo $pecah['kode_buku']; ?>" readonly>
                    <label for="">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku" value="<?php echo $pecah['judul_buku']; ?>" readonly>
                    <label for="">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" value="<?php echo $pecah['pengarang'] ?>" readonly>
                    <label for="">Username Peminjam</label>
                    <input type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" readonly>
                    <label for="">Jumlah Buku yang Dipinjam</label>
                    <input type="number" min="0" name="jumlah" id="jumlah">
                    <label for="">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam">
                    <label for="">Tanggal Jatuh Tempo</label>
                    <input type="date" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo">
                    <button class="ok" style="font-family: 'Poppins';font-weight: 700;color: white;" type="submit" name="submit">SUBMIT</button>
                    <button class="back"><a href="peminjamanUser.php">kembali</a></button>
                </div>
                
            </form>
        </div>

        <script>
            
            var tanggalPinjamInput = document.getElementById('tanggal_pinjam');
            var tanggalJatuhTempoInput = document.getElementById('tanggal_jatuh_tempo');

            tanggalPinjamInput.addEventListener('change', function() {
                var tanggalPinjam = new Date(this.value);
                tanggalPinjam.setDate(tanggalPinjam.getDate() + 7);

                var tahun = tanggalPinjam.getFullYear();
                var bulan = String(tanggalPinjam.getMonth() + 1).padStart(2, '0');
                var hari = String(tanggalPinjam.getDate()).padStart(2, '0');
                var tanggalJatuhTempo = tahun + '-' + bulan + '-' + hari;

                tanggalJatuhTempoInput.value = tanggalJatuhTempo;
            });
        </script>

</body>
</html>