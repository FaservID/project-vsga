<?php
include('koneksi.php');
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$created_at = date("Y-m-d H:i:s");

if (isset($_POST['submit'])) {

    if (empty($name) || empty($email) || empty($password)) {

        $_SESSION['flash'] = 'Data Tidak boleh Kosong';
        header('location:registrasi.php');
    } else {
        $hashing = md5($password);
        $queryInsert = mysqli_query($conn, "INSERT INTO users VALUES('', '$name','$email','$hashing','0','$created_at','')");
        $query = mysqli_query($conn, "SELECT * FROM users WHERE name='$name'");
        if ($queryInsert) {
            if ($row = mysqli_fetch_array($query)) {
                if ($row['role'] == 1) {
                    $_SESSION['role'] = 'admin';
                    $_SESSION['id'] = $row['id'];
                    header("Location: admin/index.php");
                } else {
                    $_SESSION['role'] = 'user';
                    $_SESSION['id'] = $row['id'];
                    header("Location: user/index.php");
                }
            } else {
                $_SESSION['error'] = 'Email dan Password Salah!';
                header('location:login.php');
            }
        }
    }
}
