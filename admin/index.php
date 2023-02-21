<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('location:../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ADMIN AREA</h1>
    <form action="../logout.php" method="POST">
        <button type="submit" name="submit">Logout</button>
    </form>
</body>

</html>