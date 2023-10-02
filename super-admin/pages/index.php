<?php
session_start();
include '../../database/database.php';
$admin = $_SESSION['login'];
if ($admin == '') {
    header('location:../../admin/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
        content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title> Super Admin Dashboard</title>
    <!-- Vendor CSS Files -->
    <link href="../assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets1/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets1/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets1/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets1/css/style.css" rel="stylesheet">

    <!-- alertify alert -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- ck editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <!-- END PAGE LEVEL CUSTOM STYLES -->

</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <?php
    @$page = $_GET['page'];
    if ($page != '') {
         // sub-admin 
         if ($page == 'add-admin') {
            include 'admin-management/add.php';
        }
        if ($page == 'admin-list') {
            include 'admin-management/index.php';
        }
        if ($page == 'edit-admin') {
            include 'admin-management/edit.php';
        }
        // live football
        if ($page == 'add-live-football') {
            include 'live-football/add.php';
        }
        if ($page == 'live-football-list') {
            include 'live-football/index.php';
        }
        if ($page == 'edit-live-football') {
            include 'live-football/edit.php';
        }
         // live cricket
         if ($page == 'add-live-cricket') {
            include 'live-cricket/add.php';
        }
        if ($page == 'live-cricket-list') {
            include 'live-cricket/index.php';
        }
        if ($page == 'edit-live-cricket') {
            include 'live-cricket/edit.php';
        }
    } else {
        include 'dashboard/dashboard.php';
    }
    ?>
    <?php include 'footer.php'; ?>

    <!-- Vendor JS Files -->
    <script src="../assets1/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets1/vendor/chart.js/chart.min.js"></script>
    <script src="../assets1/vendor/echarts/echarts.min.js"></script>
    <script src="../assets1/vendor/quill/quill.min.js"></script>
    <script src="../assets1/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets1/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets1/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets1/js/main.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    <?php if (isset($_SESSION['success'])) { ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?= $_SESSION['success'] ?> ');
    <?php unset($_SESSION['success']);} ?>
    </script>

    <script>
    <?php if (isset($_SESSION['error'])) { ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.error('<?= $_SESSION['error'] ?> ');
    <?php unset($_SESSION['error']);} ?>
    </script>

    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>

    <script>
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
    </script>
</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1-ds/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Oct 2022 11:20:54 GMT -->

</html>