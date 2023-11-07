<div class="faq-area my-3 mb-5">
    <div class="container">
        <?php
        // session_start();


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $img =  $_FILES['image']['name'];
            $tmp_name =  $_FILES['image']['tmp_name'];
            $size =  $_FILES['image']['size'];
            $ext = pathinfo($img, PATHINFO_EXTENSION);
            if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
                if ($size <= 104857600) {

                    $name =  $_POST['name'];
                    $email =  $_POST['email'];
                    $mobile =  $_POST['mobile'];
                    $gender =  $_POST['gender'];
                    $blood_group =  $_POST['blood_group'];
                    $birthday =  $_POST['birthday'];
                    $last_blood_donate =  $_POST['last_blood_donate'];
                    $address =  $_POST['address'];
                    $interests =  $_POST['interests'];
                    $skills =  $_POST['skills'];
                    $pass1 =  $_POST['password1'];
                    $pass2 =  $_POST['password2'];

                    $existsql = "SELECT * FROM `user` WHERE `email` = '$email'";

                    $result = mysqli_query($conn, $existsql);
                    $numRows = mysqli_num_rows($result);


                    if ($numRows > 0) {

        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            User already exist!
                        </div>
                        <?php
                    } else {
                        if ($pass1 == $pass2) {
                            $hashpass = password_hash($pass1, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO `user` (`name`, `email`,`mobile`,`gender`,`blood_group`,`birthday`,`last_blood_donate`,`address`,`password`,`interests`,`skills`,`img`) VALUES ('$name', '$email','$mobile','$gender','$blood_group','$birthday','$last_blood_donate','$address','$hashpass','$interests','$skills','$img')";

                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $path = "img/";
                                if (!is_dir($path)) {
                                  mkdir($path);
                                }
                                move_uploaded_file($tmp_name, $path . "/" . $img);
                                $_SESSION["message"] = "<b>Signup Success!</b> You can login now";
                                // echo 2;
                        ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <b>Signup Success!</b> You can login now!
                                </div>
                            <?php
                            }
                        } else {
                            $showError = "Passwords do not match";
                            echo $showError;
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Passwords do not matched!
                            </div>
                    <?php
                        }
                    }
                } else {
                    $message = "Image should be or Less or Equal 10 MB!";
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Image should be or Less or Equal 10 MB!
                    </div>
                <?php
                }
            } else {
                $message = "Your file is invalid! Please upload PBG or JPG file";
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Your file is invalid! Please upload PNG or JPG file
                </div>
            <?php
            }
        }

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            include '_page_not_found.php';
        } else {
            ?>
            <section class="container section_top">
                <div class="row justify-content-center g-3 my-2">
                    <div class="col-lg-8 bg-white shadow-lg rounded p-4">
                        <h3 class="heading_color">Hi There,</h3>
                        <p class="mb-6 lead">Register now to explore more</p>

                        <form class="text-muted" action="" method="post" enctype="multipart/form-data">
                            <div class="row g-2 justify-content-center">
                                <div class="form-floating  col-md-12">
                                    <input type="text" minlength="4" class="form-control _form_data" id="name" name="name" placeholder=" " required>
                                    <label for="name">Full Name </label>
                                </div>
                                <div class="form-floating  col-md-6">
                                    <input type="email" minlength="6" class="form-control _form_data" id="email" name="email" aria-describedby="emailHelp" placeholder=" " required>
                                    <label for="email">Email address</label>

                                </div>
                                <div class="form-floating  col-md-6">
                                    <input type="txet" minlength="7" class="form-control _form_data" id="mobile" name="mobile" placeholder=" " required>
                                    <label for="mobile">Phone Number</label>

                                </div>
                                <div class="form-floating col-md-6">
                                    <select class="form-select _form_data" id="gender" name="gender">
                                        <option disabled selected>......</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="form-floating col-md-6">
                                    <select class="form-select _form_data" id="blood_group" name="blood_group">
                                        <option disabled selected>......</option>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                    </select>
                                    <label for="blood_group">Blood Group</label>
                                </div>
                                <div class="form-floating  col-md-6">
                                    <input type="date" class="form-control _form_data" id="birthday " name="birthday" placeholder=" " required>
                                    <label for="birthday">Date of Birth</label>
                                </div>
                                <div class="form-floating  col-md-6">
                                    <input type="date" class="form-control _form_data" id="last_blood_donate " name="last_blood_donate" placeholder=" ">
                                    <label for="last_blood_donate">Last Blood Donote</label>
                                </div>
                                <div class="form-floating  col-md-6">
                                    <input type="password" minlength="6" class="form-control _form_data" id="password1" name="password1" placeholder=" " required>
                                    <label for="password1">Password</label>

                                </div>
                                <div class="form-floating  col-md-6">
                                    <input type="password" minlength="6" class="form-control _form_data" id="password2" name="password2" placeholder=" " required>
                                    <label for="password2">Confirm Password</label>
                                </div>
                                <div class="col-12">
                                    <label for="interests">Interests</label>
                                    <textarea class="form-control _form_data" id="interests" name="interests" placeholder=" " rows="2"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="skills">Skills</label>
                                    <textarea class="form-control _form_data" id="skills" name="skills" placeholder=" " rows="2"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="address">Address</label>
                                    <textarea class="form-control _form_data" id="address" name="address" placeholder=" " rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="image">Select profile picture</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                                        <label class="form-check-label" for="invalidCheck3">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <button id="submit" type="submit" class="btn btn-primary px-6 my-3">Create</button>

                            </div>
                        </form>
                        <p class="text-center text-muted fw-bold">or</p>

                        <div class="d-flex justify-content-center">
                            <a href="login.php" class="btn btn-sm btn-success mx-auto  my-3 fw-bold ">Login Now</a>
                        </div>


                    </div>
                </div>
            </section>

        <?php
        }
        ?>
    </div>
</div>

<script>

</script>