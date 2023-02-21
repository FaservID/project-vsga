<?php 

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_vsga';


$conn = mysqli_connect($hostname,$username,$password, $database);


if(!$conn) {
    echo "Gagal Terkoneksi " + mysqli_connect_error();
}

?>
