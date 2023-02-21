<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">SDN 1 PALEMBANG</div>
    <div class="list-group list-group-flush">

        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'admin') {
        ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin/index.php"><i class="fa fa-home px-2"></i>Dashboard</a>

                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin/pendaftaran.php"><i class="fa fa-book px-2"></i>Pendaftaran</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin/users.php"><i class="fa fa-users px-2"></i>users</a>

            <?php
            }
            if ($_SESSION['role'] == 'user') {
            ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../user/index.php"><i class="fa fa-home px-2"></i>Dashboard</a>

                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../user/pendaftaran.php"><i class="fa fa-book px-2"></i>Pendaftaran</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../user/cek_status.php"><i class="fa fa-refresh px-2"></i>Cek Status</a>

        <?php
            }
        }


        ?>

        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../logout.php"><i class="fa fa-sign-out px-2"></i>Logout</a>
    </div>
</div>