<?php

include '../../config.php';

$id_pelanggan  =    $_GET['id_pelanggan'];

mysqli_query($conn, "DELETE from pelanggan where id_pelanggan = '$id_pelanggan'");
header("location:pelanggan.php");


?>