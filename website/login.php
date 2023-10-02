<?php
session_start();



include '../database/database.php';

if (isset($_POST['loginEmail'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $email_search = "SELECT * from user where email='$email'";

    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);

    if ($email_count) {
        $row = mysqli_fetch_assoc($query);
        $user_id = $row['UserID'];
        $name = $row['name'];
        $user_type = $row['user_type'];
        $user_pass_hash = $row['password'];
        $pass_decode = password_verify($password, $user_pass_hash);
        if ($pass_decode) {
            $_SESSION["loggedin"] = true;
            $_SESSION["name"] =   $name;
            $_SESSION["UserID"] =   $user_id;
            $_SESSION["user_type"] = $user_type;
            $redirect_url = "/cse-socity/website/";
            header("Location: $redirect_url");
        } else {
?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Sorry! User & Password not matched
            </div>
        <?php
        }
    } else {

        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Sorry! User not found...!
        </div>
<?php
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'header-link.php'; ?>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>

    <div class="faq-area my-3 mb-5">
        <div class="container">
            <?php

            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                include '_welcome.php';
            } else {
            ?>
                <div class="container section_top">

                    <div class="row justify-content-center g-3 my-2 ">
                        <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">



                            <h3 class="heading_color mb-4">Welcome Back!</h3>

                            <form action="" method="post" class="text-muted">
                                <div class="form-floating  text-muted">
                                    <input type="email" class="form-control _form_data" id="loginEmail" name="loginEmail" placeholder="name@example.com" required>
                                    <label for="loginEmail">Email address</label>
                                </div>

                                <div class="form-floating my-2 text-muted">
                                    <input type="password" class="form-control _form_data" id="loginPassword" name="loginPassword" placeholder=" " required>
                                    <label for="loginPassword">Enter your Password</label>
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary my-3 w-100 fw-bold">Login</button>
                            </form>
                            <h6 style="cursor: pointer;" href="#" class="text-center text-primary">Forgotten password?</h6>
                            <p class="text-center text-muted fw-bold">or</p>
                            <div class="d-flex justify-content-center">
                                <a href="index.php?page=registration" class="btn btn-sm btn-success mx-auto  my-3 fw-bold ">Create new account</a>
                            </div>


                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>