<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header('location:../login.php');
}
include('../partials/layout.php');

?>

<div class="container px-5 my-5">
    <div class="alert alert-white border-secondary" role="alert">
        <h4 class="alert-heading">Halo, <?= $_SESSION['name']; ?></h4>
        <p>Selamat Datang Kembali</p>
        <hr>
        <p class="mb-0"><label class="badge bg-primary"><?= date('d M Y')?></label></p>
    </div>
</div>
</div>
</div>