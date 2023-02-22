<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header('location:../login.php');
}

include('../partials/layout.php');
?>
<div class="container px-5 my-5">
    <h4 class="mt-4 mb-3" style="font-family: 'Fira Sans', sans-serif;">Pendaftaran</h4>
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


    <?php
    $id = $_SESSION['id'] ?? '';
    include('../koneksi.php');
    $sql = "SELECT * FROM pendaftaran WHERE id_user='$id'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($query);
    $data = mysqli_fetch_assoc($query);
    // exit;
    if ($result == 0) {
    ?>
        <div class="card py-2 px-3">
            <div class="card-body">
                <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">No Akte Kelahiran</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="no_akte" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Nama Calon Siswa</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Alamat</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="alamat" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Asal Sekolah</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="asal_sekolah" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Nama Ayah</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="nama_ayah" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Nama Ibu</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="nama_ibu" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Tanggal</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-2 py-1">
                            <label class="form-label" for="">Usia</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="number" name="usia" class="form-control">
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
                            <div class="form-text"><span class="text-danger">*)</span> JPG & PNG Only</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end px-2">
                        <input type="submit" name="submit" value="Daftar" class="btn btn-primary mx-2" id="submit">
                        <input type="reset" name="cancel" value="Cancel" class="btn btn-warning" id="cancel">

                    </div>
                </form>
            </div>
        </div>
    <?php

    }

    if ($result > 0) {
    ?>
        <div class="card mb-3 py-3 px-3" style="max-width: 100%">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../assets/image/foto/<?= $data['foto']; ?>" width="80%" class="img-fluid rounded-start img-thumbnail m-1" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Bukti Pendaftaran</h5>
                        <hr>
                        <p class="card-text">
                        <table style="width:100%">
                            <tbody>
                                <tr>
                                    <td>Nama Calon Siswa</td>
                                    <td>:</td>
                                    <td><?= $data['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Registrasi</td>
                                    <td>:</td>
                                    <td><?= $data['no_registrasi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Asal Sekolah</td>
                                    <td>:</td>
                                    <td><?= $data['asal_sekolah']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Akte</td>
                                    <td>:</td>
                                    <td><?= $data['no_akte']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td>:</td>
                                    <td><?= $data['nama_ayah']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>:</td>
                                    <td><?= $data['nama_ibu']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $data['tanggal_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Usia</td>
                                    <td>:</td>
                                    <td><?= $data['usia']; ?> Tahun</td>
                                </tr>
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="javascript:window.open('bukti_pendaftaran.php?id=<?= $data['id']; ?>', 'Cetak Bukti Pendaftaran', 'width=900,height=900')" class="btn btn-primary mx-3 mb-3">Cetak Bukti Pendaftaran</a>
            </div>
        </div>

    <?php
    }
    ?>


</div>
</div>
</div>