<?php
$q = mysqli_query($conn, "SELECT * FROM shop_infos WHERE id = 1");
$row = mysqli_fetch_assoc($q);
    $showSidebar1 = '';
    $showSidebar2 = '';
    $showSidebar3 = '';
    $showSidebar4 = '';
    $showSidebar5 = '';
    $showSidebar6 = '';
    $showSidebar7 = '';
    $showSidebar8 = '';
    $showSidebar9 = '';
    $showSidebar10 = '';
    $showSidebar11 = '';
    $showSidebar12 = '';
    $showSidebar13 = '';
    $showSidebar14 = '';

// Check if the user is an admin and has access to the sidebar feature
if ($_SESSION['role_id'] == 1) {
    $showSidebar = true;
}
else {
    $adminId = $_SESSION['id'];

    // Query the access_feature table to check if the admin has access to the feature
    $query1 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 1 AND status = 1");
    $hasAccess1 = mysqli_num_rows($query1) > 0;

    $query2 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 2 AND status = 1");
    $hasAccess2 = mysqli_num_rows($query2) > 0;

    $query3 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 3 AND status = 1");
    $hasAccess3 = mysqli_num_rows($query3) > 0;

    $query4 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 4 AND status = 1");
    $hasAccess4 = mysqli_num_rows($query4) > 0;

    $query5 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 5 AND status = 1");
    $hasAccess5 = mysqli_num_rows($query5) > 0;

    $query6 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 6 AND status = 1");
    $hasAccess6 = mysqli_num_rows($query6) > 0;

    $query7 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 7 AND status = 1");
    $hasAccess7 = mysqli_num_rows($query7) > 0;

    $query8 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 8 AND status = 1");
    $hasAccess8 = mysqli_num_rows($query8) > 0;

    $query9 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 9 AND status = 1");
    $hasAccess9 = mysqli_num_rows($query9) > 0;

    $query10 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 10 AND status = 1");
    $hasAccess10 = mysqli_num_rows($query10) > 0;

    $query11 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 11 AND status = 1");
    $hasAccess11 = mysqli_num_rows($query11) > 0;

    $query12 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 12 AND status = 1");
    $hasAccess12 = mysqli_num_rows($query12) > 0;

    $query13 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 13 AND status = 1");
    $hasAccess13 = mysqli_num_rows($query13) > 0;

    $query14 = mysqli_query($conn, "SELECT * FROM access_features WHERE admin_id = '$adminId' AND feature_id = 14 AND status = 1");
    $hasAccess14 = mysqli_num_rows($query14) > 0;

    $showSidebar1 = $hasAccess1;
    $showSidebar2 = $hasAccess2;
    $showSidebar3 = $hasAccess3;
    $showSidebar4 = $hasAccess4;
    $showSidebar5 = $hasAccess5;
    $showSidebar6 = $hasAccess6;
    $showSidebar7 = $hasAccess7;
    $showSidebar8 = $hasAccess8;
    $showSidebar9 = $hasAccess9;
    $showSidebar10 = $hasAccess10;
    $showSidebar11 = $hasAccess11;
    $showSidebar12 = $hasAccess12;
    $showSidebar13 = $hasAccess13;
    $showSidebar14 = $hasAccess14;
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

                <?php if ($showSidebar1 || $_SESSION['role_id'] == 1) { ?>
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
                <?php if ($showSidebar1 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-user"></i>
                        <span class="hide-menu">Campaigns</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=campaigns">Campaign list</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($showSidebar1 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-user"></i>
                        <span class="hide-menu">Publications</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=publications">Publications list</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($showSidebar1 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-user"></i>
                        <span class="hide-menu">projects</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=projects">Project list</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>


                <?php if ($showSidebar2 || $_SESSION['role_id'] == 1) { ?>
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
                <?php } ?>
                <?php if ($showSidebar3 || $_SESSION['role_id'] == 1) { ?>
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
                <?php } ?>
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
                <?php if ($showSidebar10 || $_SESSION['role_id'] == 1) { ?>
                <li>
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
                </li>
                <?php } ?>
                <?php if ($showSidebar11 || $_SESSION['role_id'] == 1) { ?>
                <li>
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
                </li>
                <?php } ?>

                <?php if ($showSidebar12 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Service</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=service-list">Service List</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($showSidebar13 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Testimonial</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=testimonial-list">Testimonial List</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($showSidebar14 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class=" ti-user"></i>
                        <span class="hide-menu">Gallery</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=gallery-list">Gallery List</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-slider"></i>
                        <span class="hide-menu">Website Manage..</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">

                        <?php if ($showSidebar4 || $_SESSION['role_id'] == 1) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Slider</a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="index.php?page=slider-list">Slider List</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if ($showSidebar5 || $_SESSION['role_id'] == 1) { ?>
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
                        <?php } ?>
                        <?php if ($showSidebar6 || $_SESSION['role_id'] == 1) { ?>
                        <li>
                            <a href="index.php?page=about-us">About-Us</a>
                        </li>
                        <?php } ?>
                        <?php if ($showSidebar7 || $_SESSION['role_id'] == 1) { ?>
                        <li>
                            <a href="index.php?page=privacy-policy">Privacy & Policy</a>
                        </li>
                        <li>
                            <a href="index.php?page=term-condition">Term & Condition</a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>

                <?php if ($showSidebar8 || $_SESSION['role_id'] == 1) { ?>
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
                <?php } ?>
                <?php if ($showSidebar1 || $_SESSION['role_id'] == 1) { ?>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-user"></i>
                        <span class="hide-menu">Others</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index.php?page=others">Others</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($showSidebar9 || $_SESSION['role_id'] == 1) { ?>
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
                <?php } ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>