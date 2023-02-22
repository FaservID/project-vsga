<?php

session_start();
// if ($_SESSION['role'] == null) {
//     header('location:login.php');
// }

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('location:admin/index.php');
    } elseif ($_SESSION['role'] == 'user') {
        header('location:user/index.php');
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin ">
        <form action="cek_login.php" method="POST">
            <h1 class="h3 mb-4 fw-normal" style="font-family: 'Fira Sans', sans-serif;">Login</h1>
            <?php
            if (isset($_SESSION['gagal'])) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> <?= $_SESSION['gagal']; ?>.
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            <?php
                unset($_SESSION['gagal']);
            }

            ?>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" required id="floatingInput" placeholder="name@gmail.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" required id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-3" name="submit" type="submit">Sign in</button>
        </form>
        <hr>
        Belum punya Akun? Daftar <a href="registrasi.php">Disini</a>
    </main>



</body>

</html>