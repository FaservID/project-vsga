<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('location:../login.php');
}

include('../partials/layout.php');
?>

<div class="container px-5 my-5">
    <h3 class="mt-4">List Calon Siswa</h3>
    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Nomor Registrasi</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia</th>
                        <th>Status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');
                    $sql = "SELECT * FROM pendaftaran";
                    $query = mysqli_query($conn, $sql);
                    $i = 1;
                    while ($user = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $user['nama'] . "</td>";
                        echo "<td>" . $user['no_registrasi'] . "</td>";
                        echo "<td>" . $user['tanggal_lahir'] . "</td>";
                        echo "<td>" . $user['usia'] . "</td>";
                        echo "<td>Wait</td>";
                        echo "<td>Aksi</td>";
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