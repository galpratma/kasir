<?php

include '../../config.php';

$id_produk      =   $_POST['id_produk'];
$nama_produk    =   $_POST['nama_produk'];
$harga          =   $_POST['harga'];
$stok           =   $_POST['stok'];

mysqli_query($conn, "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga' , stok = '$stok' WHERE id_produk = '$id_produk'");
header("location:produk.php");
?>