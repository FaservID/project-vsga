<?php
session_start();
$id = $_GET['id'];
include('../koneksi.php');
$sql = "SELECT * FROM pendaftaran WHERE id='$id'";
$query = mysqli_query($conn, $sql);
// $result = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);

include('../partials/layout.php');
?>


<div class="container px-5 my-5">
    <h4 class="mt-4 mb-3" style="font-family: 'Fira Sans', sans-serif;">Calon Siswa</h4>

    <div class="card mb-3 py-3 px-3" style="max-width: 100%">
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center flex-column">
                <img src="../assets/image/foto/<?= $data['foto']; ?>" width="80%" class="img-fluid rounded-start img-thumbnail m-1" alt="...">
                <a href="../assets/file/<?= $data['sertifikat_akte']; ?>" target="_blank" class="btn btn-danger m-1" style="width: 80%;">Download Sertifikat Akte Kelahiran</a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Detail Siswa</h5>
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
            <a href="pendaftaran.php" class="btn btn-primary mx-3 mb-3">Kembali</a>
        </div>

    </div>

</div>