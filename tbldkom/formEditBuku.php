<?php
    include 'koneksi.php';
    $kode = $_GET["id"];
    $query = mysqli_query($conn, "SELECT * FROM buku WHERE kode_buku='$kode'");
    $pecah = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit data buku</title>
    <link rel="stylesheet" href="formEditBuku.css">
</head>
<body>
    <div class="container">
        <div class="forminput">
            <h1>Pendataan Buku</h1>
            <form action="edit.php" method="post" enctype="multipart/form-data">

                <div class="input">
                    <label for="kode">Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku" value="<?php echo $pecah['kode_buku']; ?>" readonly>
                </div>

                <div class="input">
                    <label for="nama">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku" value="<?php echo $pecah['judul_buku']; ?>">
                </div>

                <div class="input">
                    <label for="nama">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="<?php echo $pecah['isbn']; ?>">
                </div>

                <div class="input">
                    <label for="nama">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" value="<?php echo $pecah['pengarang']; ?>">
                </div>

                <div class="input">
                    <label for="nama">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" value="<?php echo $pecah['penerbit']; ?>">
                </div>

                <div class="input">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori">
                        <?php
                            $kategori_db = $pecah['kategori'];

                            $selected_fiksi = ($kategori_db == 1) ? "selected" : "";
                            $selected_non_fiksi = ($kategori_db == 2) ? "selected" : "";
                        ?>
                        <option value="1" <?php echo $selected_fiksi; ?>>Fiksi</option>
                        <option value="2" <?php echo $selected_non_fiksi; ?>>non-Fiksi</option>
                    </select>
                </div>

                
                <div class="input">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" min="0" name="jumlah" id="jumlah" value="<?php echo $pecah['jumlah']; ?>">
                </div>

                <div class="input">
                    <img src="assets/<?php echo $pecah['gambar']; ?>" alt="" style="width:100px;height: 150px;margin-top: 5px;">
                    <input type="file" name="gambar" id="gambar">
                </div>

                <button class="btninput" type="submit" name="submit" style="font-family: 'Poppins';font-size: 16px;color: white;font-weight: 700;">SUBMIT</button>
                <button class="back"><a href="kelolaBuku.php">Kembali</a></button>
            </form>
        </div>
    </div>
</body>
</html>
