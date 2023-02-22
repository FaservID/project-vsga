<?php


include('../koneksi.php');
session_start();

$getId = $_GET['id'];

$id = $_SESSION['id'] ?? '';
$sql = "SELECT * FROM pendaftaran WHERE id='$getId'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);


include('../partials/layout.php')
?>

<div class="container px-5 my-5">
    <h4 class="mt-4 mb-3" style="font-family: 'Fira Sans', sans-serif;">Ubah Pendaftaran</h4>
    <?php
    if (isset($_SESSION['sukses'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> <?= $_SESSION['sukses']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['sukses']);
    }
    ?>
    <?php
    if (isset($_SESSION['gagal'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> <?= $_SESSION['gagal']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['gagal']);
    }
    ?>

    <div class="card py-2 px-3">
        <div class="card-body">
            <form action="proses_registrasi.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">No Akte Kelahiran</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" name="no_akte" class="form-control" value="<?= $data['no_akte']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Nama Calon Siswa</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Alamat</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" name="alamat" class="form-control" value="<?= $data['alamat']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Asal Sekolah</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" name="asal_sekolah" class="form-control" value="<?= $data['asal_sekolah']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Nama Ayah</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" name="nama_ayah" class="form-control" value="<?= $data['nama_ayah']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Nama Ibu</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" name="nama_ibu" class="form-control " value="<?= $data['nama_ibu']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Tanggal</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Usia</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="number" name="usia" class="form-control" value="<?= $data['usia']; ?>">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Sertifikat Akte Kelahiran</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="file" name="sertifikat" class="form-control">
                        <div class="form-text"><span class="text-danger">*)</span> PDF Only</div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-lg-2 py-1">
                        <label class="form-label" for="">Pas Foto</label>
                    </div>
                    <div class="col-lg-10">

                        <input type="file" name="foto" class="form-control">
                        <img src="../assets/image/foto/<?= $data['foto']; ?>" alt="foto" class="img-thumbnail" width="100">
                        <div class="form-text"><span class="text-danger">*)</span> JPG & PNG Only</div>
                    </div>
                </div>
        </div>
    </div>
    <div class="d-flex justify-content-end px-2">
        <input type="submit" name="submit" value="Daftar" class="btn btn-primary mx-2" id="submit">
        <input type="reset" name="cancel" value="Cancel" class="btn btn-warning" id="cancel">

    </div>
    </form>
</div>
</div>
</div>
</div>
</div>