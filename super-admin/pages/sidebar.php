<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Admin Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="index.php?page=add-admin">
                        <i class="bi bi-circle"></i><span>Add New Admin</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=admin-list">
                        <i class="bi bi-circle"></i><span>Admin List</span>
                    </a>
                </li>

            </ul>
        </li>


        <li class="nav-item d-none">
            <a class="nav-link collapsed" data-bs-target="#live-football" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Live Football Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="live-football" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="index.php?page=add-live-football">
                        <i class="bi bi-circle"></i><span>Add Live Football Match</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=live-football-list">
                        <i class="bi bi-circle"></i><span>Live Football List</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item d-none">
            <a class="nav-link collapsed" data-bs-target="#live-cricket" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Live Cricket Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="live-cricket" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="index.php?page=add-live-cricket">
                        <i class="bi bi-circle"></i><span>Add Live Cricket Match</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=live-cricket-list">
                        <i class="bi bi-circle"></i><span>Live Cricket List</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->