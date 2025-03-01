<?php 

// mengaktifkan session
session_start();

// koneksi
include 'config.php';

$username   =   $_POST['username'];
$password   =   md5($_POST['password']);

$login  =   mysqli_query($conn, "SELECT*from users where username = '$username' and password = '$password'");

$cek = mysqli_num_rows($login);

if($cek > 0 ){
    $data = mysqli_fetch_assoc($login);

    if($data['level'] == "admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:admin/home.php");
    }else if($data['level'] == "petugas"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        header("location:petugas/home.php");
    }else {
        header("location:index.php?pesan=gagal");
    }
}else {
    header("location:index.php?pesan=gagal");
}

// username
// admin and petugas

// password
// admin : admin123
// petugas  : petugas123
?>  