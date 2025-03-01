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
        display: inline;
    }

    .navbar {
        position:fixed;
        width:100%;
        z-index:999;
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
    }

    @keyframes float {
        0% , 100% {
            transform:translateY(0px);
        }
        50% {
            transform:translateY(-30px);
        }
    }
    
    footer {
        background-color:blue;
    }

    .card {
        margin-top:300px;
        background-color:white;
        border:0;
        box-shadow:0 4px 15px cyan;
        animation:float 4s ease-in-out infinite;
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
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 card text-center fw-bold fs-1 p-5">
                <div class="avatar-circle  text-white">G</div>
                    <h1>Selamat datang <?php echo $_SESSION['username'];?></h1>
                    <p>Jadilah Petugas Yang Amanah dan Bertanggung Jawab.</p>
            </div>



            
        <footer class="position-absolute bottom-0 w-100 fw-bold text-center text-white">
                <p class="pt-4">Created with ❤ by Galih Pratama</p>
        </footer> 
        </div>
    </div>
</body>
</html>