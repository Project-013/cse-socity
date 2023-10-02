<?php
session_start();
include '../database/database.php';

extract($_POST);
if (isset($submit)) {

    // extract($_POST);
    $q = mysqli_query(
        $conn,
        "select * from admins where email = '$email'"
    );
    if (mysqli_num_rows($q) > 0) {
        $row = mysqli_fetch_assoc($q);
        $verify = password_verify($password, $row['password']);
        if ($verify == 1 && $row['role_id'] == 2 && $row['status'] == 1) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['role_id'] = $row['role_id'];
            header('location:pages/index.php');
        } elseif($verify == 1 && $row['role_id'] == 1 && $row['status'] == 1) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['role_id'] = $row['role_id'];
            header('location:pages/index.php');
        } 
        else {
            $_SESSION['error'] = 'Password Incorrect!';
        }
    }
    
    // if (
    //     $row = mysqli_fetch_assoc(
    //         mysqli_query(
    //             $conn,
    //             "select * from admins where email='$email' and password='$password'"
    //         )
    //     )
    // ) {
    //     if ($row['role_id'] == 2 && $row['status'] == 1) {
    //         $_SESSION['login'] = true;
    //         $_SESSION['id'] = $row['id'];
    //         header('location:pages/index.php');
    //     }
    //     elseif ($row['role_id'] == 1 && $row['status'] == 1) {
    //         $_SESSION['login'] = true;
    //         $_SESSION['id'] = $row['id'];
    //         header('location:../super-admin/pages/index.php');
    //     }
    // }
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/inverse/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 06:17:59 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../public/all/admin/assets/images/favicon.png">
    <title>Admin Login</title>

    <!-- page css -->
    <link href="../public/all/admin/assets/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../public/all/admin/assets/css/style.min.css" rel="stylesheet">


</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Login</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register"
            style="background-image:url(../public/all/admin/assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="">
                        <h3 class="text-center m-b-20">Admin Login</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="password"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn w-100 btn-lg btn-info btn-rounded text-white" name="submit"
                                    type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../public/all/admin/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../public/all/admin/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>

</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/inverse/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 06:18:09 GMT -->

</html>