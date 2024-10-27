<?php 

session_start();
include 'koneksi.php';
error_reporting(0);

if(isset($_SESSION['username'])){
    if($_SESSION['nama_lengkap'] == 'admin'){
        header("location: homepage.php");
    } else {
        header("location: homepageUser.php");
    }
    exit;
}

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query_sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];

        if($row['nama_lengkap'] == 'admin'){
            header("location: homepage.php");
        } else{
            header("location: homepageUser.php");
        }
        exit;
    } else {
        echo "<script> 
                alert('Email atau Password yang Anda masukkan salah') 
                document.location.href='index.html';
            </script>";
    }

}

?>