<?php
include('koneksi.php');
session_start();


$email = $_POST['email'];
$password = $_POST['password'];


if (isset($_POST['submit'])) {

    if (empty($email) && empty($password)) {

        $_SESSION['flash'] = 'Email dan Password Tidak boleh Kosong';
        header('location:login.php');
    } else {
        $decrypt = md5($password);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and password='$decrypt'");

        if ($row = mysqli_fetch_array($query)) {
            if($row['role'] == 1) {
                $_SESSION['role'] = 'admin';
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: admin/index.php");
            } else {
                $_SESSION['role'] = 'user';
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: user/index.php");
            }
        } else {
            $_SESSION['gagal'] = 'Email dan Password Salah!';
            header('location:login.php');
        }
    }
}
