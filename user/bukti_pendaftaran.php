<?php
include('../koneksi.php');

session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM pendaftaran WHERE id='$id'";
$query = mysqli_query($conn, $sql);
// $result = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="card mb-3 py-3 px-3" style="max-width: 100%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../assets/image/foto/<?= $data['foto']; ?>" width="100px" class="img-fluid rounded-start img-thumbnail m-1" alt="...">
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
                            <tr>
                                <td>Tanggal Registrasi</td>
                                <td>:</td>
                                <td><?= $data['created_at']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>