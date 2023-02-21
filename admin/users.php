<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('location:../login.php');
}

include('../partials/layout.php');
?>

<div class="container px-5 my-5">
    <h3 class="mt-4">List Users</h3>
    <?php
    if (isset($_SESSION['result'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> <?= $_SESSION['result']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['result']);
    }
    ?>
    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Registrasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');
                    $sql = "SELECT * FROM users";
                    $query = mysqli_query($conn, $sql);
                    $i = 1;
                    while ($user = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $user['name'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        if ($user['role'] == 0) {
                            echo "<td>User</td>";
                        } else {
                            echo "<td>Admin</td>";
                        }
                        echo "<td>" . $user['created_at'] . " </td>";
                        echo "<td>
                                <a href='hapus_user.php?id=$user[id]' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>