<?php
    $q = mysqli_query($conn,  "SELECT * FROM shop_infos where id=1 ");
    $row = mysqli_fetch_assoc($q)
?>
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                    <!-- dark Logo text -->
                    <img src="<?= $row ? $row['logo'] : ''?>" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="<?= $row ? $row['logo'] : ''?>" class="light-logo" alt="homepage" />
                </span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse bg-success">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                        class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->

            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                        href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            </ul>
        </div>
    </nav>
</header>