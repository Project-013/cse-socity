<?php

if (isset($_POST['submit'])) {
    extract($_POST);
    $avatar = $_FILES['avatar']['name'];
    $tempname = $_FILES['avatar']['tmp_name'];
    $folder = 'images/' . $avatar;

    if ($name == '') {
        $_SESSION['error'] = 'Name field required';
    } elseif ($email == '') {
        $_SESSION['error'] = 'Email field required';
    }elseif ($password == '') {
        $_SESSION['error'] = 'password field is required!';
    } elseif (
        mysqli_num_rows(
            mysqli_query($conn, "select * from admins where email='$email'")
        ) > 0
    ) {
        $_SESSION['error'] = 'email already exits';
    } else {
        $passwordd = password_hash($password, PASSWORD_DEFAULT);
        $run = mysqli_query(
            $conn,
            "insert into admins(avatar,name, email, password,role_id,status)values('$avatar','$name','$email','$passwordd','2','1')"
        );
        if ($run) {
            $_SESSION['success'] = 'Successfully Registerd';
        } else {
            $_SESSION['error'] = 'Not Registerd!!';
        }
    }
    move_uploaded_file($tempname, $folder);
} ?>


<head>
    <style>
    .img-wrapper {
        border: 1px solid;
        padding: 0;
        border-radius: 6px;
        overflow: hidden;
        height: 310px;
    }

    .img-wrapper input {
        background: ;
        width: 100%;
        padding: 2px;
        border-bottom: 1px solid;
    }

    .img-wrapper .preview {
        width: 100% !important;
        height: 100% !important;
    }

    .border-image {
        border: 1px solid #e7515a !important;
    }
    </style>
</head>
<main id="main" class="main">
    <section class="section">
        <div class="col-12">
            <div class="row ">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Admin</h5>
                            <!-- General Form Elements -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mt-4 justify-content-center">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="image-upload-one">
                                                            <div class="center">
                                                                <div class="form-input w-100 ">
                                                                    <label for="fullName">avatar<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="col-sm-12 text-left img-wrapper ">
                                                                        <div class="">
                                                                            <input accept="image/*" type='file'
                                                                                id="imgInp1" class="slider-update-input"
                                                                                name="avatar" />
                                                                            <!-- <input type="hidden" name="old_image" value=""> -->
                                                                        </div>
                                                                        <img class="preview" id="preview1"
                                                                            src="images/img.png" alt="your image" />
                                                                    </div>
                                                                    <script>
                                                                    imgInp1.onchange = evt => {
                                                                        const [file] = imgInp1.files
                                                                        if (file) {
                                                                            preview1.src = URL.createObjectURL(file)
                                                                        }
                                                                    }
                                                                    </script>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">

                                                        <div class="col-12 col-sm-12 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Name<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Name" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Email<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="email" class="form-control" name="email"
                                                                    placeholder="Email" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Password<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="password" class="form-control"
                                                                    name="password" placeholder="Password" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right mt-4">
                                            <button class="btn btn-primary" name="submit" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>