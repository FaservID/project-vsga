<?php

include('../koneksi.php');
session_start();

$no_akte = $_POST['no_akte'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$asal_sekolah = $_POST['asal_sekolah'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$usia = $_POST['usia'];
$sertifikat_name = $_FILES['sertifikat']['name'];
$sertifikat_size = $_FILES['sertifikat']['size'];
$foto_name = $_FILES['foto']['name'];
$foto_size = $_FILES['foto']['size'];


$amountOfDigits = 8;
$numbers = range(0, 9);
shuffle($numbers);
$digits = '';
for ($i = 0; $i < $amountOfDigits; $i++)
    $digits .= $numbers[$i];


$getDate = date('d');

$no_registrasi = $digits . '-' . $getDate;
$created_at = date("Y-m-d H:i:s");

$getId = $_SESSION['id'] ?? '';

// Lulus / TIDAK

$status = $usia >= 7 ? 'lulus' : 'tidak lulus';

// if ($sertifikat_size > 2097152) {
//     $_SESSION['gagal'] = "Ukuran Terlalu Besar!";
//     header('location:pendaftaran.php');
// } elseif ($foto_size > 2097152) {
//     $_SESSION['gagal'] = "Ukuran Terlalu Besar!";
//     header('location:pendaftaran.php');
// } else {
if (empty($nama) || empty($alamat) || empty($no_akte) || empty($asal_sekolah) || empty($nama_ayah) || empty($nama_ibu) || empty($tanggal_lahir) || empty($usia) || empty($sertifikat_name)) {
    $_SESSION['gagal'] = "Data Tidak Boleh Kosong!";
    header('location:pendaftaran.php');
} elseif ($sertifikat_name != "") {

    // SERTIFIKAT
    $ext_file_accept = array('pdf');
    $pisahkan_ekstensi = explode('.', $sertifikat_name);
    $ekstensi_file = strtolower(end($pisahkan_ekstensi));
    $file_tmp_file = $_FILES['sertifikat']['tmp_name'];
    $tanggal = md5(date('Y-m-d h:i:s'));
    $sertifikat_name_new = $tanggal . '-' . $getId . '.' . $ekstensi_file;

    // FOTO
    $ext_foto_accept = array('jpg', 'jpeg', 'png');
    $pisahkan_ekstensi = explode('.', $foto_name);
    $ekstensi_foto = strtolower(end($pisahkan_ekstensi));
    $file_tmp_foto = $_FILES['foto']['tmp_name'];
    $tanggal = md5(date('Y-m-d h:i:s'));
    $foto_name_new = $tanggal . '-' . $getId . '.' . $ekstensi_foto;

    if (in_array($ekstensi_file, $ext_file_accept) === true) {
        move_uploaded_file($file_tmp_file, '../assets/file/' . $sertifikat_name_new);

        if (in_array($ekstensi_foto, $ext_foto_accept) === true) {

            move_uploaded_file($file_tmp_foto, '../assets/image/foto/' . $foto_name_new);
            $query = mysqli_query($conn, "INSERT INTO pendaftaran VALUES ('','$no_akte','$no_registrasi', '$nama', '$alamat', '$asal_sekolah', '$nama_ayah', '$getId', '$nama_ibu', '$tanggal_lahir','$usia','$sertifikat_name_new','$foto_name_new','$created_at','$status')");

            if ($query) {
                $_SESSION['sukses'] = "Pendaftaran Berhasil!";
                header('location:pendaftaran.php');
            } else {
                $_SESSION['gagal'] = "Pendaftaran Gagal!";
                header('location:pendaftaran.php');
            }
        } else {
            $_SESSION['gagal'] = "File yang diupload bukan JPG/PNG";
            header('location:pendaftaran.php');
        }
    } else {
        $_SESSION['gagal'] = "File yang diupload bukan PDF";
        header('location:pendaftaran.php');
    }
}
//     }
// }
