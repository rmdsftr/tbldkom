<?php 
session_start();
include 'koneksi.php';

$username = $_POST["username"];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST["email"];
$jenis_kelamin = $_POST['jenis_kelamin'];
$password = $_POST["password"];
$tanggal_gabung = date("Y-m-d H:i:s");
$nomor_anggota = date('ymd') . random_int(0,100);

$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if(mysqli_num_rows($result)>0){
    echo 
        "<script>
            alert ('Username sudah digunakan');
            document.location.href='register.html';
        </script>";
        exit;
} else {
    $query_sql = "INSERT INTO users(nomor_anggota, username, nama_lengkap, email, jenis_kelamin, password, tanggal_bergabung) VALUES ('$nomor_anggota','$username', '$nama_lengkap', '$email', '$jenis_kelamin', '$password', '$tanggal_gabung')";

    if (mysqli_query($conn, $query_sql)){
        $_SESSION['nomor_anggota'] = $nomor_anggota;
        $_SESSION['username'] = $username;
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        $_SESSION['email'] = $email;
        $_SESSION['jenis_kelamin'] = $jenis_kelamin;
        $_SESSION['password'] = $password;
        $_SESSION['tanggal_bergabung'] = $tanggal_gabung;

        header("Location: homepageUser.php");
        exit;
    } else {
        echo "Registrasi gagal : " . mysqli_error($conn);
    }

}


?>