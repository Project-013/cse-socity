<?php
session_start();
include '../../database/database.php';
$admin = $_SESSION['login'];
if ($admin == '') {
    header('location:../login.php');
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

    <title> Dashboard Template</title>
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
        // game
        if ($page == 'add-game') {
            include 'game/add.php';
        }
        if ($page == 'game-list') {
            include 'game/index.php';
        }
        if ($page == 'edit-game') {
            include 'game/edit.php';
        }
        // team
        if ($page == 'add-team') {
            include 'team/add.php';
        }
        if ($page == 'team-list') {
            include 'team/index.php';
        }
        if ($page == 'edit-team') {
            include 'team/edit.php';
        }
        // player
        if ($page == 'add-player') {
            include 'player/add.php';
        }
        if ($page == 'player-list') {
            include 'player/index.php';
        }
        if ($page == 'edit-player') {
            include 'player/edit.php';
        }
        // shcedule
        if ($page == 'add-shcedule') {
            include 'shcedule/add.php';
        }
        if ($page == 'shcedule-list') {
            include 'shcedule/index.php';
        }
        if ($page == 'edit-shcedule') {
            include 'shcedule/edit.php';
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
        // donation
        if ($page == 'donation-list') {
            include 'donation/index.php';
        }
        // users
        if($page == 'user-list'){
            include 'users/index.php';
        }
        // manager
        if($page == 'manager-list'){
            include 'manager/index.php';
        }
        if($page == 'add-manager'){
            include 'manager/add.php';
        }
        // draft
        if ($page == 'add-draft-player') {
            include 'draft/add.php';
        }
        if ($page == 'draft-player-list') {
            include 'draft/index.php';
        }
        if ($page == 'edit-draft-player') {
            include 'draft/edit.php';
        }
        if ($page == 'pending-draft-player') {
            include 'draft/pending.php';
        }
        if ($page == 'accept-draft-player') {
            include 'draft/accept.php';
        }
        if ($page == 'reject-draft-player') {
            include 'draft/reject.php';
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