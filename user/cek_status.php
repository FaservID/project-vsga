<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header('location:../login.php');
}
include('../partials/layout.php');

?>

<div class="container px-5 my-5">
    <h4 class="mt-4 mb-3" style="font-family: 'Fira Sans', sans-serif;">Cek Status Kelulusan</h4>
    <div class="card">
        <div class="card-body">
            <h5 class="text-center mt-3 mb-4">Masukkan Nomor Registrasi Anda</h5>
            <form class="row g-3 d-flex justify-content-center" action="proses_cek_status.php" method="POST">
                <div class="col-md-8">
                    <input type="text" class="form-control" id="no_registrasi" name="no_registrasi" placeholder="Nomor Registrasi">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-3" style="width:100%">Check</button>
                </div>
            </form>
        </div>


        <?php
        if (isset($_SESSION['result'])) {
            if ($_SESSION['result'] == "lulus") {
        ?>
                <div class="text-center mt-2 mb-4" style="font-weight: bold">
                    <div class="text-success">Selamat Anda Dinyatakan Lulus</div>
                    <p>Silahkan untuk Segera melakukan Pengumpulan Berkas Secepatnya</p>
                </div>
            <?php
                unset($_SESSION['result']);
            } elseif ($_SESSION['result'] == 'tidak lulus') {

            ?>
                <div class="text-center mt-2 mb-4 text-danger" style="font-weight: bold">
                    Mohon Maaf Anda Dinyatakan Tidak Lulus
                </div>
        <?php
                unset($_SESSION['result']);
            }
        }
        ?>


    </div>
</div>
</div>
</div>