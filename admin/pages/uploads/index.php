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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="../../public/all/website/assets/images/favicon.ico" sizes="128x128" rel="shortcut icon"
        type="image/x-icon" />
    <link href="../../public/all/website/assets/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <title>North East Medical College</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../../public/all/admin/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <!-- <link href="../../public/all/admin/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="../../public/all/admin/assets/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="../../public/all/admin/assets/css/pages/dashboard1.css" rel="stylesheet">

    <!-- <link href="../../public/all/assets/dist/css/pages/file-upload.css" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="../../public/all/assets/node_modules/dropify/dist/css/dropify.min.css"> -->
    <!-- FILE UPLODE CSS -->
    <link href="../../public/all/admin/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet"
        type="text/css" />
    <link
        href="../../public/all/admin/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="../../public/all/admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="../../public/all/admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fno/zKifZoxEdaLn8zxc9XexSBY5Y1Rseit -->
    <link href="../../public/all/admin/assets/node_modules/dropzone-master/dist/dropzone.css" rel="stylesheet"
        type="text/css" />


    <!-- alertify alert -->
    <link rel=" stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- Date picker plugins css -->
    <link href="../../public/all/admin/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css"
        rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="../../public/all/admin/assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../../public/all/admin/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css"
        rel="stylesheet">

</head>

<body class="skin-default fixed-layout">



    <div id="main-wrapper">

        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>


        <!-- <div class="page-wrapper" style="background-color:#FAFFD1"> -->
        <div class="page-wrapper"
            style="background-image:url(../../public/all/admin/assets/images/background/back3.jpg);object-fit:fill !important; background-repeat: no-repeat;">

            <div class="container-fluid">
                <?php
                    @$page = $_GET['page'];
                    if ($page != '') {
                         //shop-info
                         if ($page == 'shop-info') {
                            include 'settings/shop-info.php';
                        }
                        // about-us
                        else if ($page == 'about-us') {
                            include 'website-management/about-us.php';
                        }
                        // term-condition
                        else if ($page == 'term-condition') {
                            include 'website-management/term-condition.php';
                        }
                        // privacy-policy
                        else if ($page == 'privacy-policy') {
                            include 'website-management/privacy-policy.php';
                        }
                        // faqs
                        else if ($page == 'faqs-list') {
                            include 'website-management/faqs/index.php';
                        }
                        else if ($page == 'add-faqs') {
                            include 'website-management/faqs/add.php';
                        }
                        else if ($page == 'edit-faqs') {
                            include 'website-management/faqs/edit.php';
                        }
                        // slider
                        else if ($page == 'slider-list') {
                            include 'website-management/slider/index.php';
                        }
                        else if ($page == 'add-slider') {
                            include 'website-management/slider/add.php';
                        }
                        else if ($page == 'edit-slider') {
                            include 'website-management/slider/edit.php';
                        }
                        // news
                         else if ($page == 'news-list') {
                            include 'news/index.php';
                        }
                        else if ($page == 'add-news') {
                            include 'news/add.php';
                        }
                        else if ($page == 'edit-news') {
                            include 'news/edit.php';
                        }
                        // event
                        else if ($page == 'event-list') {
                            include 'event/index.php';
                        }
                        else if ($page == 'add-event') {
                            include 'event/add.php';
                        }
                        else if ($page == 'edit-event') {
                            include 'event/edit.php';
                        }
                        else if($page == 'contact-list')
                        {
                            include 'contact-us/index.php';
                        }
                        else if($page == 'edit-profile')
                        {
                            include 'profile/edit.php';
                        }
                        
                        else if($page == 'access-user-list')
                        {
                            include 'access-user/index.php';
                        }
                        else if($page == 'add-access-user')
                        {
                            include 'access-user/add.php';
                        }
                        else if($page == 'edit-access-user')
                        {
                            include 'access-user/edit.php';
                        }
                        //doctor
                        else if($page == 'add-doctor')
                        {
                            include 'doctor/add.php';
                        }
                        else if($page == 'edit-doctor')
                        {
                            include 'doctor/edit.php';
                        }
                        else if($page == 'doctor-list')
                        {
                            include 'doctor/index.php';
                        }
                        //accountant
                        else if($page == 'add-accountant')
                        {
                            include 'accountant/add.php';
                        }
                        else if($page == 'edit-accountant')
                        {
                            include 'accountant/edit.php';
                        }
                        else if($page == 'accountant-list')
                        {
                            include 'accountant/index.php';
                        }
                        //pharmacist
                        else if($page == 'add-pharmacist')
                        {
                            include 'pharmacist/add.php';
                        }
                        else if($page == 'edit-pharmacist')
                        {
                            include 'pharmacist/edit.php';
                        }
                        else if($page == 'pharmacist-list')
                        {
                            include 'pharmacist/index.php';
                        }
                        //nurse
                        else if($page == 'add-nurse')
                        {
                            include 'nurse/add.php';
                        }
                        else if($page == 'edit-nurse')
                        {
                            include 'nurse/edit.php';
                        }
                        else if($page == 'nurse-list')
                        {
                            include 'nurse/index.php';
                        }
                        //receptionist
                        else if($page == 'add-receptionist')
                        {
                            include 'receptionist/add.php';
                        }
                        else if($page == 'edit-receptionist')
                        {
                            include 'receptionist/edit.php';
                        }
                        else if($page == 'receptionist-list')
                        {
                            include 'receptionist/index.php';
                        }
                        //service
                        else if($page == 'add-service')
                        {
                            include 'service/add.php';
                        }
                        else if($page == 'edit-service')
                        {
                            include 'service/edit.php';
                        }
                        else if($page == 'service-list')
                        {
                            include 'service/index.php';
                        }
                        
                        else if($page == 'feature-list')
                        {
                            include 'feature/index.php';
                        }
                        else if($page == 'access-feature')
                        {
                            include 'access-user/access-feature/edit.php';
                        }

                        //department
                        else if($page == 'department-list')
                        {
                            include 'department/index.php';
                        }

                        //testimonial
                        else if($page == 'testimonial-list')
                        {
                            include 'testimonial/index.php';
                        }

                        //gallery
                        else if($page == 'add-gallery')
                        {
                            include 'gallery/add.php';
                        }
                        else if($page == 'edit-gallery')
                        {
                            include 'gallery/edit.php';
                        }
                        else if($page == 'gallery-list')
                        {
                            include 'gallery/index.php';
                        }
                         

                        
                        
                    } else {
                        include 'dashboard/dashboard.php';
                    }
                ?>

                <?php include 'theme.php'; ?>

            </div>
        </div>

        <?php include 'footer.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../public/all/admin/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../public/all/admin/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../public/all/admin/assets/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../../public/all/admin/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../public/all/admin/assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../public/all/admin/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../../public/all/admin/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../../public/all/admin/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../../public/all/admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- <script src="../../public/all/admin/assets/node_modules/toast-master/js/jquery.toast.js"></script> -->
    <!-- Chart JS -->
    <script src="../../public/all/admin/assets/js/dashboard1.js"></script>
    <!-- <script src="../../public/all/admin/assets/node_modules/toast-master/js/jquery.toast.js"></script> -->

    <!-- FILE UPLOADES JS -->
    <script src="../../public/all/admin/assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="../../public/all/admin/assets/plugins/fileuploads/js/file-upload.js"></script>

    <!--stickey kit -->
    <script src="../../public/all/admin/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../../public/all/admin/assets/dist/js/pages/jasny-bootstrap.js"></script>

    <!-- jQuery file upload -->
    <!-- <script src="../../public/all/admin/assets/node_modules/dropify/dist/js/dropify.min.js"></script> -->
    <script src="../../public/all/admin/assets/node_modules/dropzone-master/dist/dropzone.js"></script>

    <!-- Ckeditor JS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

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
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
    </script>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor3'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor4'))
        .catch(error => {
            console.error(error);
        });
    </script>


    <script src="../../public/all/admin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../public/all/admin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js">
    </script>
    <!-- start - This is for export functionality only -->
    <script src="../../public/all/admin/assets/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="../../public/all/admin/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="../../public/all/admin/assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="../../public/all/admin/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="../../public/all/admin/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="../../public/all/admin/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="../../public/all/admin/assets/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                            '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
        // responsive table
        $('#config-table').DataTable({
            responsive: true
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
            'btn btn-primary me-1');
    });
    </script>
    <!-- Plugin JavaScript -->
    <script src="../../public/all/admin/assets/node_modules/moment/moment.js"></script>
    <script
        src="../../public/all/admin/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>


    <!-- Date Picker Plugin JavaScript -->
    <script src="../../public/all/admin/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../../public/all/admin/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../../public/all/admin/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
    // MAterial Date picker    
    $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#auto_employee_id').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var email = selectedOption.data('email');
            $('#auto_email').val(email);
        });
    });
    </script>

    <script>
    $(document).on('change', '.file-input', function() {

        var filesCount = $(this)[0].files.length;

        var textbox = $(this).prev();

        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#divImageMediaPreview");
            dvPreview.html("");
            $($(this)[0].files).each(function() {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $("<img />");
                    img.attr("style",
                        "width: 97px; height:97px; padding: 10px; border: 1px dotted #ddd;");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }

    });
    </script>

</body>


</html>