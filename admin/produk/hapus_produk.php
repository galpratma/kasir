<?php

include '../../config.php';

$id_produk  =    $_GET['id_produk'];

mysqli_query($conn, "DELETE from produk where id_produk = '$id_produk'");
header("location:produk.php");


?>