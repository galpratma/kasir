<?php 

session_start();

if($_SESSION['level'] == ""){
    header("location:../index.php?pesan=belum_login");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home | AplikasKasir</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
        margin:80px 0  90px;
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

            <a href="../logout.php" class="btn btn-danger" onclick="return confirm('Apakah Kamu yakin ingin keluar')">Logout</a>
        </div>
    </div>
    <!-- end navbar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                    <div class="avatar-circle">G</div>
                    <a href="home.php" class="sidebar-link active">Home</a>
                    <a href="pelanggan/pelanggan.php" class="sidebar-link">Pelanggan</a>
                    <a href="produk/produk.php" class="sidebar-link">Produk</a>
                    <a href="transaksi/transaksi.php" class="sidebar-link">Transaksi</a>
            </div>

            <div class="col-md-10">
                <div class="header text-white text-center fw-bold">
                    <h1>Halaman Utama</h1>
                    <p>Selamat datang di halaman utama kami <?php echo $_SESSION['username'];?></p>
                </div>

                <div class="row d-flex justify-content-center ">
                    <div class="col-md-4 mb-5">
                        <div class="card text-center bg-warning">
                            <div class="card-body">
                                <h4 class="card-title bg-light p-2 rounded text-dark">Pelanggan</h4>
                                <p class="card-text fs-1 text-white">
                                <?php 
                                include '../config.php';

                                $data = mysqli_query($conn, "SELECT*from pelanggan");
                                $total = mysqli_num_rows($data);
                                echo "<span>$total</span>";

                                ?>

                                </p>
                                <a href="pelanggan/pelanggan.php" class="btn btn-primary">Tabel Pelanggan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-5 ">
                    <div class="col-md-4 me-5">
                        <div class="card text-center bg-warning">
                            <div class="card-body ">
                                <h4 class="card-title bg-light p-2 rounded text-dark ">Produk</h4>
                                <p class="card-text fs-1 text-white">
                                <?php 
                                include '../config.php';

                                $data = mysqli_query($conn, "SELECT*from produk");
                                $total = mysqli_num_rows($data);
                                echo "<span>$total</span>";

                                ?>

                                </p>
                                <a href="produk/produk.php" class="btn btn-primary">Tabel Produk</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ms-5">
                        <div class="card text-center bg-warning">
                            <div class="card-body ">
                                <h4 class="card-title bg-light p-2 rounded text-dark ">Transaksi</h4>
                                <p class="card-text fs-1 text-white">
                                <?php 
                                include '../config.php';

                                $data = mysqli_query($conn, "SELECT*from transaksi");
                                $total = mysqli_num_rows($data);
                                echo "<span>$total</span>";

                                ?>

                                </p>
                                <a href="transaksi/transaksi.php" class="btn btn-primary">Tabel Transaksi</a>
                            </div>
                        </div>
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