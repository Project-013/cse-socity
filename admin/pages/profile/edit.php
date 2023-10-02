<style>
.previewIcon {
    width: 38px;
    height: 40px;
    margin-right: 1px;
}
</style>


<?php
    if(isset($_POST['submit']))
    {
       extract($_POST);

        if ($name == '') {
            $_SESSION['error'] = 'name is required';
        }
        elseif ($email == '') {
            $_SESSION['error'] = 'email is required';
        }
        elseif ($phone == '') {
            $_SESSION['error'] = 'phone is required';
        }
        elseif ($address == '') {
            $_SESSION['error'] = 'address is required';
        }
        elseif (mysqli_num_rows(mysqli_query($conn, "select * from admins where email='$email' and id !='".$_SESSION['id'] ."'"))) {
            $_SESSION['error'] = 'email has alerady taken!!!';
        } else {
            // $email_verify = mysqli_query($conn, "select * from admins where email='$email' and id !='".$_SESSION['id'] ."'");

            if ($_FILES["avatar"]["name"]) {
                $old_avatar = mysqli_query($conn, "SELECT avatar FROM admins WHERE id='".$_SESSION['id'] ."'");
                if ($old_avatar) {
                    $old_avatar = mysqli_fetch_assoc($old_avatar);
                    $old_avatar = $old_avatar["avatar"];
                    if (file_exists($old_avatar)) {
                    unlink($old_avatar);
                    }
                }
                // Upload new avatar file
                $avatar = "uploads/profile-img/"  . ($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "UPDATE admins SET avatar='$avatar', name='$name', email='$email', phone='$phone', address='$address' WHERE id='".$_SESSION['id'] ."'");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Update Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "UPDATE admins SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='".$_SESSION['id'] ."'");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
            }
        }
    }

    
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id='".$_SESSION['id'] ."'");
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['password_submit']))
    {
       extract($_POST);

        if ($old_password == '') {
            $_SESSION['error'] = 'old_password is required';
        }
        elseif ($new_password == '') {
            $_SESSION['error'] = 'new_password is required';
        }
        elseif ($confirm_password == '') {
            $_SESSION['error'] = 'confirm_password is required';
        }
        else
        {
            // Verify the old password
            if (!password_verify($old_password, $row['password'])) {
                $_SESSION['error'] = 'Incorrect old password. Please try again.';
            }

            // Validate the new password and confirm password match
            if ($new_password !== $confirm_password) {
                $_SESSION['error'] = 'New password and confirm password do not match. Please try again.';
            }

            // Hash the new password
            $newHashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the admin's password in the database
            // Assuming you have a table named 'admins' with columns 'id' and 'password'
            $query = mysqli_query($conn,"UPDATE admins SET password = '$newHashedPassword' WHERE id = '".$_SESSION['id'] ."' ");

            // Execute the update query

            // Display success message or perform any additional tasks
            $_SESSION['success'] = 'Password updated successfully!';
        }

    }

    
   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Profile</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=slider-list" class="text-danger">Profile</a>
                </li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Update Profile</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <label for="">Upload avatar</label> -->
                                        <input type="file" class="dropify" name="avatar" id="input-file-now-custom-1"
                                            data-default-file="<?= $row['avatar'] ?>" data-height="300" />
                                        <input type="hidden" name="old_avatar" value="<?= $row['avatar'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ti-user"></i><span class="text-danger">*</span></span>
                                            <input name="name" type="text" class="form-control" placeholder="Name"
                                                value="<?= $row['name'] ?>" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="ti-email"></i><span class="text-danger">*</span></span>
                                            <input type="email" name="email" value="<?= $row['email'] ?>"
                                                class="form-control" placeholder="Email" aria-label="Email"
                                                aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="icon-call-in"></i><span class="text-danger">*</span></span>
                                            <input type="text" name="phone" value="<?= $row['phone'] ?>"
                                                class="form-control" placeholder="Phone" aria-label="Phone"
                                                aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon2"><i
                                                    class="ti-location-pin"></i><span
                                                    class="text-danger">*</span></span>
                                            <input type="text" name="address" value="<?= $row['address'] ?>"
                                                class="form-control" placeholder="Address" aria-label="Phone"
                                                aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <button name="submit" type="submit"
                                        class="btn w-100 btn-outline-success">Update</button>
                                </div>
                            </div>
                        </div>



                    </div>

                </form>
            </div>

            <div class="card-body">
                <form class="" method="POST">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3"><i
                                                    class="ti-lock"></i><span class="text-danger">*</span></span>
                                            <input type="password" name="old_password" class="form-control"
                                                placeholder="Old Password" aria-label="Password"
                                                aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon3"><i class="ti-lock"></i><span
                                                class="text-danger">*</span></span>
                                        <input type="password" name="new_password" class="form-control"
                                            placeholder="New Password" aria-label="Password"
                                            aria-describedby="basic-addon3">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon3"><i class="ti-lock"></i><span
                                                class="text-danger">*</span></span>
                                        <input type="password" name="confirm_password" class="form-control"
                                            placeholder="Confirm Password" aria-label="Password"
                                            aria-describedby="basic-addon3">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <button name="password_submit" type="submit"
                                        class="btn w-100 btn-outline-success">Update
                                        Password</button>
                                </div>
                            </div>
                        </div>



                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
imgInp1.onchange = evt => {
    const [file] = imgInp1.files;
    if (file) {
        preview1.src = URL.createObjectURL(file)
    }
}
</script>