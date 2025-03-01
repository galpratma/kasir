<?php 

include '../../config.php';

$id_pelanggan   =   $_POST['id_pelanggan'];
$nama_pelanggan =   $_POST['nama_pelanggan'];
$alamat         =   $_POST['alamat'];
$nomor_telepon  =   $_POST['nomor_telepon'];

mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', nomor_telepon = '$nomor_telepon' WHERE id_pelanggan = '$id_pelanggan'");
header("location:pelanggan.php");
?>