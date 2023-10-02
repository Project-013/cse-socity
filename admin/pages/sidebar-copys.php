<?php
$q = mysqli_query($conn, "SELECT * FROM shop_infos WHERE id = 1");
$row = mysqli_fetch_assoc($q);
//$showSidebar = '';
// Check if the user is an admin and has access to the sidebar feature
if ($_SESSION['role_id'] == 1) {
    $showSidebar = true;
}
else {
    $adminId = $_SESSION['id'];

    // Query the access_feature table to check if the admin has access to the feature
    $query = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 1 AND status = 1");
    $hasAccess = mysqli_num_rows($query) > 0;

    $showSidebar = $hasAccess;
}
?>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <?php
            $q = mysqli_query($conn, "SELECT * FROM admins WHERE id = '" . $_SESSION['id'] . "'");
            $row = mysqli_fetch_assoc($q);
            ?>
            <div class="user-pro-body">
                <div>
                    <img src="<?php echo $row['avatar']; ?>" alt="user-img" class="img-circle">
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                        data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $row['name']; ?>
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="index.php?page=edit-profile&id=<?php echo $_SESSION['id'] ?>" class="dropdown-item">
                            <i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="../logout.php" class="dropdown-item">
                            <i class="ti-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="index.php" aria-expanded="false">
                        <i class="ti-layout-grid3-alt text-success"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <?php if ($showSidebar) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-user"></i>
                        <span class="hide-menu">Executive Member</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=executive-member-list">Member List</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>