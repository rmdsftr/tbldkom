<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form input data buku</title>
    <link rel="stylesheet" href="formKelolaBuku.css">
</head>
<body>
    <div class="container">
        <div class="forminput">
            <h1>Pendataan Buku</h1>
            <form action="submit.php" method="post" enctype="multipart/form-data">

                <div class="input">
                    <label for="kode">Kode Buku</label>
                    <input type="text" name="kode_buku" id="kode_buku">
                </div>

                <div class="input">
                    <label for="nama">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku">
                </div>

                <div class="input">
                    <label for="nama">ISBN</label>
                    <input type="text" name="isbn" id="isbn">
                </div>

                <div class="input">
                    <label for="nama">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang">
                </div>

                <div class="input">
                    <label for="nama">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit">
                </div>

                <div class="input">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori">
                        <option value="1">Fiksi</option>
                        <option value="2">non-Fiksi</option>
                    </select>
                </div>
                
                <div class="input">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" min="0" name="jumlah" id="jumlah">
                </div>

                <div class="input">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar">
                </div>

                <button class="btninput" type="submit" name="submit" style="font-family: 'Poppins';font-size: 16px;color: white;font-weight: 700;">SUBMIT</button>
                <button class="back"><a href="kelolaBuku.php">Kembali</a></button>
            </form>
        </div>
    </div>
</body>
</html>
