<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">

</head>

<body>
    <div class="bg-image">
        <div class="container mt-5 d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12 my-5">
                    <h4 class="text-center text-uppercase my-3" style="font-family: 'Verdana', Geneva, Tahoma, sans-serif;">Login</h4>
                    <div class="card py-4 px-4 shadow p-3 mb-5 bg-body-tertiary rounded">


                        <!-- FLASH MESSAGE -->

                        <?php
                        if (isset($_SESSION['error'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> <?= $_SESSION['error']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['error']);
                        }

                        ?>


                        <!-- END FLASH MESSAGE -->

                        <form action="cek_login.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>