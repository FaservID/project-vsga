<?php
session_start();
$id = $_GET['id'];
include('../koneksi.php');
$sql = "DELETE FROM pendaftaran WHERE id='$id'";
$query = mysqli_query($conn, $sql);
// $result = mysqli_num_rows($query);
// $data = mysqli_fetch_assoc($query);

$_SESSION['cancel_sukses'] = 'Pendaftaran Berhasil Dicancel!';
header('location:pendaftaran.php');
?>
