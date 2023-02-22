<?php

session_start();

include('../koneksi.php');


$id  = $_POST['id'];
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



$getDate = date('d');

$created_at = date("Y-m-d H:i:s");


// Lulus / TIDAK

$status = $usia >= 7 ? 'lulus' : 'tidak lulus';

// CEK DATA KOSONG ATAU TIDAK
if (empty($nama) || empty($alamat) || empty($no_akte) || empty($asal_sekolah) || empty($nama_ayah) || empty($nama_ibu) || empty($tanggal_lahir) || empty($usia)) {
    $_SESSION['gagal'] = "Data Tidak Boleh Kosong!";
    // $_SESSION['id'] = $id;
    header("location:edit_pendaftaran.php?id=" . $id);
} elseif ($sertifikat_name == "" && $foto_name != "") { // TIDAK UPLOAD FILE

    $sql = "SELECT * FROM pendaftaran WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);


    // FOTO
    $ext_foto_accept = array('jpg', 'jpeg', 'png');
    $pisahkan_ekstensi = explode('.', $foto_name);
    $ekstensi_foto = strtolower(end($pisahkan_ekstensi));
    $file_tmp_foto = $_FILES['foto']['tmp_name'];
    $tanggal = md5(date('Y-m-d h:i:s'));
    $foto_name_new = $tanggal . '-' . $getId . '.' . $ekstensi_foto;

    $sertifikat_akte = $data['sertifikat_akte'];
    // $foto = $data['foto'];


    if (in_array($ekstensi_foto, $ext_foto_accept) === true) {

        move_uploaded_file($file_tmp_foto, '../assets/image/foto/' . $foto_name_new);

        $query = mysqli_query($conn, "UPDATE pendaftaran SET nama='$nama', no_akte='$no_akte', alamat='$alamat', asal_sekolah='$asal_sekolah', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', tanggal_lahir='$tanggal_lahir', usia='$usia', sertifikat_akte='$sertifikat_akte', foto='$foto_name_new' WHERE id='$id'");
        if ($query) {
            $_SESSION['sukses'] = "Pendaftaran Berhasil diupdate!";
            header('location:pendaftaran.php');
        } else {
            $_SESSION['gagal'] = "Pendaftaran Gagal! diupdate";
            header('location:pendaftaran.php');
        }
    } else {
        $_SESSION['gagal'] = "File yang diupload bukan JPG/PNG";
        header('location:pendaftaran.php');
    }
} elseif ($sertifikat_name != "" && $foto_name == "") { // SERTIFIKAT UPLOAD && FOTO KOSONG

    $sql = "SELECT * FROM pendaftaran WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);



    // SERTIFIKAT
    $ext_file_accept = array('pdf');
    $pisahkan_ekstensi = explode('.', $sertifikat_name);
    $ekstensi_file = strtolower(end($pisahkan_ekstensi));
    $file_tmp_file = $_FILES['sertifikat']['tmp_name'];
    $tanggal = md5(date('Y-m-d h:i:s'));
    $sertifikat_name_new = $tanggal . '-' . $getId . '.' . $ekstensi_file;

    $foto = $data['foto'];
    // $foto = $data['foto'];


    if (in_array($ekstensi_file, $ext_file_accept) === true) {

        move_uploaded_file($file_tmp_file, '../assets/file/' . $sertifikat_name_new);

        $query = mysqli_query($conn, "UPDATE pendaftaran SET nama='$nama', no_akte='$no_akte', alamat='$alamat', asal_sekolah='$asal_sekolah', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', tanggal_lahir='$tanggal_lahir', usia='$usia', sertifikat_akte='$sertifikat_name_new', foto='$foto' WHERE id='$id'");
        if ($query) {
            $_SESSION['sukses'] = "Pendaftaran Berhasil diupdate!";
            header('location:pendaftaran.php');
        } else {
            $_SESSION['gagal'] = "Pendaftaran Gagal! diupdate";
            header('location:pendaftaran.php');
        }
    } else {
        $_SESSION['gagal'] = "File yang diupload bukan JPG/PNG";
        header('location:pendaftaran.php');
    }
} elseif ($sertifikat_name != "" && $foto_name != "") {

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
            $query = mysqli_query($conn, "UPDATE pendaftaran SET nama='$nama', no_akte='$no_akte', alamat='$alamat', asal_sekolah='$asal_sekolah', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', tanggal_lahir='$tanggal_lahir', usia='$usia', sertifikat_akte='$sertifikat_name_new', foto='$foto_name_new' WHERE id='$id'");

            if ($query) {
                $_SESSION['sukses'] = "Pendaftaran Berhasil diupdate!";
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
} elseif ($sertifikat_name == "" && $foto_name == "") {
    $sql = "SELECT * FROM pendaftaran WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $foto = $data['foto'];
    $sertifikat_akte = $data['sertifikat_akte'];

    $query = mysqli_query($conn, "UPDATE pendaftaran SET nama='$nama', no_akte='$no_akte', alamat='$alamat', asal_sekolah='$asal_sekolah', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', tanggal_lahir='$tanggal_lahir', usia='$usia', sertifikat_akte='$sertifikat_akte', foto='$foto' WHERE id='$id'");

    if ($query) {
        $_SESSION['sukses'] = "Pendaftaran Berhasil diupdate!";
        header('location:pendaftaran.php');
    } else {
        $_SESSION['gagal'] = "Pendaftaran Gagal!";
        header('location:pendaftaran.php');
    }
} else {
    $_SESSION['gagal'] = "Pendaftaran Gagal!";
    header('location:pendaftaran.php');
}
