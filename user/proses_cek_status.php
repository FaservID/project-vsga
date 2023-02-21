<?php

include('../koneksi.php');
session_start();

$no_registrasi = $_POST['no_registrasi'];

$sql = "SELECT * FROM pendaftaran WHERE no_registrasi='$no_registrasi'";
$query = mysqli_query($conn, $sql);
// $result = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);

$_SESSION['result'] = $data['status'];
header('location:cek_status.php');
?>