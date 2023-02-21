<?php
session_start();
$id = $_GET['id'];
include('../koneksi.php');
$sql = "DELETE FROM users WHERE id='$id'";
$query = mysqli_query($conn, $sql);
// $result = mysqli_num_rows($query);
// $data = mysqli_fetch_assoc($query);

$_SESSION['result'] = 'Berhasil Menghapus User!';
header('location:users.php');
?>
