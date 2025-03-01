<?php 

session_start();

if($_SESSION['level'] == ""){
    header("location:../../index.php?pesan=belum_login");
}

include '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cetak | AplikasKasir</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <style>
    @media print {
        @page {
            margin:0;
            size:auto;
        }
        .no-print{
            display:none;
        }
    }
    
    </style>  
</head>
<body>
    <div class="container mt-4">
        <div class="header text-center mb-4">
            <h1>Laporan Transaksi</h1>
            <p>Tanggal Cetak : <?php echo date('d-m-Y');?></p>
        </div>
            <table class="table table-hover table-bordered text-center">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $data = mysqli_query($conn, "SELECT*from transaksi");
                    while($row = mysqli_fetch_array($data)){
                    ?>

                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row['nama_pelanggan'];?></td>
                        <td><?php echo $row['nama_produk'];?></td>
                        <td>Rp. <?php echo $row['harga'];?></td>
                        <td><?php echo $row['jumlah'];?></td>
                        <td>Rp. <?php echo $row['total'];?></td>
                        <td><?php echo $row['tanggal'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="no-print text-center">
                <button onclick="window.print()" class="btn btn-primary">Print</button>
                <button onclick="window.close()" class="btn btn-secondary">Close</button>
            </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>