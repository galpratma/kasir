<?php

include '../../config.php';

$id_transaksi  =    $_GET['id_transaksi'];

mysqli_query($conn, "DELETE from transaksi where id_transaksi = '$id_transaksi'");
header("location:transaksi.php");


?>