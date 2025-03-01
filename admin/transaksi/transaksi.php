<?php 

session_start();

if($_SESSION['level'] == ""){
    header("location:../../index.php?pesan=belum_login");
}

include '../../config.php';

// if(isset($_POST['btnSimpan'])){
//     $nama_pelanggan =   $_POST['nama_pelanggan'];
//     $nama_produk    =   $_POST['nama_produk'];
//     $harga          =   $_POST['harga'];
//     $jumlah         =   $_POST['jumlah'];
//     $total          =   $harga * $jumlah;
//     $tanggal        =   $_POST['tanggal'];

//     mysqli_query($conn, "INSERT into transaksi VALUES('','$nama_pelanggan','$nama_produk','$harga','$jumlah','$total','$tanggal')");
//     header("location:transaksi.php");
//     exit();
// }
if(isset($_POST['btnSimpan'])){
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_produk    = $_POST['nama_produk'];
    $harga          = $_POST['harga'];
    $jumlah         = $_POST['jumlah'];
    $total          = $harga * $jumlah;
    $tanggal        = $_POST['tanggal'];
    
    // Mengambil data produk berdasarkan nama produk
    $get_produk = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk='$nama_produk'");
    $produk = mysqli_fetch_array($get_produk);
    $id_produk = $produk['id_produk'];
    $stok_sekarang = $produk['stok'];
    
    // Memeriksa apakah stok cukup
    if($stok_sekarang >= $jumlah){
        // Mengurangi stok di tabel produk
        $sisa_stok = $stok_sekarang - $jumlah;
        mysqli_query($conn, "UPDATE produk SET stok=$sisa_stok WHERE id_produk=$id_produk");
        
        // Menyimpan data transaksi
        mysqli_query($conn, "INSERT INTO transaksi VALUES('','$nama_pelanggan','$nama_produk','$harga','$jumlah','$total','$tanggal')");
        
        // Mengalihkan dengan pesan sukses
        header("location:transaksi.php");
    }
    exit();
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi | AplikasKasir</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.grid.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <style>
    * {
        margin : 0 ;
        padding:0;
    }

    body {
        height :100vh;
    }

    .navbar {
        position:fixed;
        width:100%;
        z-index:999;
        background-color:blue;
    }

    .sidebar {
        background-color:aliceblue;
        height:100vh;
        padding:50px 20px 0;
        box-shadow:2px 0 15px rgba(0,0,0,0.45);
        font-weight:500;
    }

    .sidebar-link {
        text-decoration:none;
        color:black;
        display:block;
        padding : 10px 12px;
        border-radius:10px;
        transition:all 0.3s ease;
    }

    .sidebar-link:hover{
        color:blue;
        text-decoration:none;
        background-color:white;
        transform:translateX(6px);
    }

    .sidebar-link.active{
        color:white;
        background-color:blue;
    }

   

    .avatar-circle {
        width:80px;
        height:80px;
        border-radius:50%;
        background:linear-gradient(45deg, #23a6d5, #23d5ab);
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:40px;
        font-weight:bold;
        color:white;
        margin:50px auto 40px ;
        box-shadow:0 5px 10px cyan;
        animation:float 4s ease-in-out infinite;
    }

    @keyframes float {
        0% , 100% {
            transform:translateY(0px);
        }
        50% {
            transform:translateY(-10px);
        }
    }

    .header {
        background-color:blue;
        padding:25px 20px;
        margin:80px 0  60px;
        border-radius:0 0 25px 25px;
        box-shadow:0 5px 15px rgba(0,0,0,0.25);
    }
    
    footer {
        background-color:blue;
    }

    .card {
        background-color:white;
        box-shadow:0 5px 15px rgba(0,0,0,0.45);
        padding:15px 20px 0;
    }
    </style>  
</head>
<body>
    <!-- navbar -->
    <div class="navbar p-2">
        <div class="container-fluid">
            <h1 class="navbar-brand text-white ps-5 fs-3">AplikasKasir</h1>

            <a href="../../logout.php" class="btn btn-danger" onclick="return confirm('Apakah Kamu yakin ingin keluar')">Logout</a>
        </div>
    </div>
    <!-- end navbar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                    <div class="avatar-circle">G</div>
                    <a href="../home.php" class="sidebar-link">Home</a>
                    <a href="../pelanggan/pelanggan.php" class="sidebar-link">Pelanggan</a>
                    <a href="../produk/produk.php" class="sidebar-link">Produk</a>
                    <a href="transaksi.php" class="sidebar-link  active">Transaksi</a>
            </div>

            <div class="col-md-10">
                <div class="header text-white text-center fw-bold">
                    <h1>Halaman Transaksi</h1>
                    <p>Selamat datang di halaman transaksi kami <?php echo $_SESSION['username'];?></p>
                </div>
            
                <div class="row d-flex justify-content-center">
                    <!-- awal form -->
                     
                     <!-- awal tabel -->
                    <div class="col-md-10 card">
                    
                    <div class="tambah mb-4 mt-2">
                        <a href="tambah.php" class="btn btn-success">Tambah Transaksi</a>
                     </div>
                        <table class="table table-hover table-bordered text-center ">
                            <thead class="table-success">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Navigasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                $no     = 1;
                                $data   = mysqli_query($conn, "SELECT*from transaksi");
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
                                    <td>
                                        <a href="hapus_transaksi.php?id_transaksi=<?php echo $row['id_transaksi'];?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    <button type="button" class="btn btn-secondary mb-3 mt-2" onclick="window.open('print.php','_blank')">Cetak Berkas</button>
                    </div>
                    
                      <!-- end tabel -->
                </div>
                
            </div>

            <footer class="position-absolute bottom-0 w-100 fw-bold text-center text-white">
                <p class="pt-4">Created with ❤ by Galih Pratama</p>
            </footer>
            
        </div>
    </div>
</body>
</html>