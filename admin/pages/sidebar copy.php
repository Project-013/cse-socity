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
                $q = mysqli_query($conn,'select * from admins where id="' . $_SESSION['id'] . '" ');
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
                        <i class=" ti-layout-grid3-alt text-success"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">News Management</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=add-news">Add News</a>
                        </li>
                        <li>
                            <a href="index.php?page=news-list">News List</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-media-right-alt"></i>
                        <span class="hide-menu">Event Management</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=add-event">Add Event</a>
                        </li>
                        <li>
                            <a href="index.php?page=event-list">Event List</a>
                        </li>
                    </ul>
                </li> -->

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-slider"></i>
                        <span class="hide-menu">Website Manage..</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Slider</a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                </li>
                                <li>
                                    <a href="index.php?page=slider-list">Slider List</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">FAQs</a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="index.php?page=add-faqs">Add FAQs</a>
                                </li>
                                <li>
                                    <a href="index.php?page=faqs-list">FAQs List</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?page=about-us">About-Us</a>
                        </li>
                        <li>
                            <a href="index.php?page=privacy-policy">Privacy & Policy</a>
                        </li>
                        <li>
                            <a href="index.php?page=term-condition">Term & Condition</a>
                        </li>
                    </ul>
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




                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Faculty Member</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=faculty-member-list">Member List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Alumni Member</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=alumni-member-list">Member List</a>
                        </li>
                    </ul>
                </li>
                <?php if ($_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Access User</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=access-user-list">User List</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Feature</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=feature-list">Feature List</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-email"></i>
                        <span class="hide-menu">Contact Us</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=contact-list">Contact List</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-settings"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=shop-info">Shop Info</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>