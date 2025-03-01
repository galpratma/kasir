<?php 

$conn  = mysqli_connect('localhost','root','','kasir');

// untuk mengecek koneksi
if(mysqli_connect_errno()){
    echo "koneksi gagal : " . mysqli_connect_error();
}
?>