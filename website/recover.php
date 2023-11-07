<?php
session_start();



include '../database/database.php';




?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'header-link.php'; ?>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>
    <?php
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $birthday = $_POST['birthday'];

        $emailquery = "SELECT * from `user` WHERE `email`='$email' AND `birthday`='$birthday'";
        $query = mysqli_query($conn, $emailquery);
        $count = mysqli_num_rows($query);

        if ($count == 1) {
            if ($password1 == $password2) {
                $pass = password_hash($password1, PASSWORD_BCRYPT);
                $updatequery = "UPDATE `user` SET `password`='$pass' WHERE `email`='$email'";
                $query = mysqli_query($conn, $updatequery);
                if ($query) {

    ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <b>Password Changed!</b> You can login now
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    Password not matched!
                </div>

            <?php
            }
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                Sorry! User not confirmed...
            </div>

    <?php
        }
    }

    ?>

    <div class="faq-area my-3 mb-5">
        <div class="container section_top">
            <div class="row justify-content-center my-3 g-1">
                <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded p-4">
                    <h3 class=" heading_color my-3 ">Recover your password </h3>
                    <form action="" method="post" class="my-3">
                        <div class="form-floating text-muted">
                            <input type="email" minlength="6" class="form-control _form_data" id="email" name="email" placeholder=" " required>
                            <label for="email">Enter your email</label>

                        </div>
                        <div class="form-floating text-muted">
                            <input type="password" minlength="6" class="form-control _form_data my-2" id="password1" name="password1" placeholder=" " required>
                            <label for="password1">New Password</label>

                        </div>
                        <div class="form-floating  text-muted">
                            <input type="password" minlength="6" class="form-control _form_data my-2" id="password2" name="password2" placeholder=" " required>
                            <label for="password2">Confirm Password</label>
                        </div>
                        <h6 class="text-muted ">Security Question</h6>
                        <div class="form-floating text-muted">
                            <input type="date" class="form-control _form_data" id="birthday " name="birthday" placeholder=" " required>
                            <label for="birthday">Date of Birth</label>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary  w-100 mt-3">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>