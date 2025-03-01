<?php 

session_start();

if($_SESSION['level'] == ""){
    header("location:../../index.php?pesan=belum_login");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Transaksi | AplikasKasir</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
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
                    <h1>Tambah Transaksi</h1>
                    <p>Selamat datang di halaman tambah transaksi kami <?php echo $_SESSION['username'];?></p>
                </div>
            
                <div class="row d-flex justify-content-center gap-5">
                    <!-- awal form -->
                    <div class="col-md-10">
                        <form action="transaksi.php" method="post">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama Pelanggan</label>
                                <select name="nama_pelanggan" class="form-control">
                                    <?php
                                    include '../../config.php';

                                    $data = mysqli_query($conn, "SELECT*from pelanggan");
                                    while($row = mysqli_fetch_array($data)){
                                    ?>

                                    <option value="<?php echo $row['nama_pelanggan'];?>"><?php echo $row['nama_pelanggan'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama Produk</label>
                                <select name="nama_produk" class="form-control">
                                <option value="">Pilih Produk</option>
                                    <?php
                                    // Mengambil hanya produk yang memiliki stok
                                    $get_produk = mysqli_query($conn, "SELECT * FROM produk WHERE stok > 0");
                                    while($produk = mysqli_fetch_array($get_produk)){
                                        echo "<option value='".$produk['nama_produk']."' data-stok='".$produk['stok']."'>".$produk['nama_produk']." (Stok: ".$produk['stok'].")</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Harga</label>
                                <select name="harga" class="form-control">
                                <?php
                                    // Mengambil hanya produk yang memiliki harga
                                    $get_produk = mysqli_query($conn, "SELECT * FROM produk");
                                    while($produk = mysqli_fetch_array($get_produk)){
                                        echo "<option value='".$produk['harga']."'>".$produk['harga']." (".$produk['nama_produk'].")</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" name="total" class="form-control" hidden>
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>

                            <button type="submit" name="btnSimpan" class="btn btn-success w-100">Simpan</button>
                            <a href="transaksi.php" class="btn btn-warning w-100 text-decoration-none mt-3 text-light">Kembali</a>
                        </form>
                    </div>
                   
                </div>
                
            </div>

            <footer class="position-absolute bottom-0 w-100 fw-bold text-center text-white">
                <p class="pt-4">Created with ❤ by Galih Pratama</p>
            </footer>
            
        </div>
    </div>
</body>
</html>