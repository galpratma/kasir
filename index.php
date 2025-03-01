<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AplikasKasir</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"> 
    <style>
    * {
        margin:0;
        padding:0;
    }
    
    body {
        height : 100vh;
        background:linear-gradient(45deg, #23a6d5, #23d5ab);
        display:flex;
        align-items:center;
    }


    .login-container {
        max-width:400px;
        width:90%;
        background-color:aliceblue;
        padding:25px 45px;
        margin:auto;
        border-radius:20px;
        transition:all 0.3s ease;
        box-shadow:0 5px 15px rgba(0,0,0,0.10);
    }

    .login-container:hover {
        transform:translateY(-6px);
        box-shadow:0 5px 15px rgba(0,0,0,0.45);
    }

    .avatar-circle {
        width:100px;
        height:100px;
        border-radius:50%;
        background:linear-gradient(45deg, #23a6d5, #23d5ab);
        display:flex;
        justify-content:center;
        align-items:center;
        margin:20px auto 30px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-secondary mb-5">AplikasKasir</h1>
        <div class="login-container">
            <div class="avatar-circle fw-bold fs-1 text-white">G</div>

            <?php 

            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<div class='alert alert-danger text-center'>Username atau password salah!</div>";
                }else if($_GET['pesan'] == "belum_login"){
                    echo "<div class='alert alert-danger text-center'>Silahkan login dahulu untuk mengakses halaman admin</div>";
                }
            }

            ?>
            <form action="p_login.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" placeholder="username" required>
                    <label for="" class="form-label">Username</label>

                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                    <label for="" class="form-label">Password</label>

                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html> 