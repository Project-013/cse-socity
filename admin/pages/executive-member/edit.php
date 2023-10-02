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
        elseif ($designation == '') {
            $_SESSION['error'] = 'designation is required';
        }
        elseif ($semester_no == '') {
            $_SESSION['error'] = 'semester_no is required';
        }
        elseif ($registration_id == '') {
            $_SESSION['error'] = 'registration_id is required';
        }
        elseif (mysqli_num_rows(mysqli_query($conn, "select * from members where name='$name' and id != '".$_GET['id'] ."'"))) {
            $_SESSION['error'] = 'name has alerady taken!!!';
        }
        elseif (mysqli_num_rows(mysqli_query($conn, "select * from members where email='$email' and id != '".$_GET['id'] ."'"))) {
            $_SESSION['error'] = 'email has alerady taken!!!';
        }
        else {
    
            if ($_FILES["avatar"]["name"]) {
                $old_avatar = mysqli_query($conn, "SELECT avatar FROM members WHERE id='".$_GET['id'] ."'");
                if ($old_avatar) {
                    $old_avatar = mysqli_fetch_assoc($old_avatar);
                    $old_avatar = $old_avatar["avatar"];
                    if (file_exists($old_avatar)) {
                    unlink($old_avatar);
                    }
                }
                // Upload new image file
                $avatar = "uploads/members/executive/"  . ($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar)) {
                    // Save data to database 
                    $sql = mysqli_query($conn, "UPDATE members SET avatar='$avatar', name='$name',email= '$email', phone='$phone', designation='$designation',address='$address',semester_no='$semester_no',registration_id='$registration_id',short_details='$short_details',details='$details' WHERE id='".$_GET['id'] ."'");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Update Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "UPDATE members SET name='$name',email= '$email', phone='$phone', designation='$designation',address='$address',semester_no='$semester_no',registration_id='$registration_id',short_details='$short_details',details='$details' WHERE id='".$_GET['id'] ."'");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
            }
        }
    }


    $result = mysqli_query($conn, 'SELECT * FROM members WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Executive Member</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=executive-member-list"
                        class="text-danger">Executive Member</a>
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
                <h3 class="m-b-0 text-white"><b>Update Member</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
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
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Name<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="name" class="form-control"
                                            id="validationCustomUsername" placeholder="Name"
                                            value="<?= $row['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Email<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                            id="validationCustomUsername" placeholder="Email"
                                            value="<?= $row['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Phone<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="phone" class="form-control"
                                            id="validationCustomUsername" placeholder="Phone"
                                            value="<?= $row['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Designation<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="designation" class="form-control"
                                            placeholder="Designation" value="<?= $row['designation'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Address<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="address" class="form-control"
                                            id="validationCustomUsername" placeholder="Address"
                                            value="<?= $row['address'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Semester No.<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="semester_no" class="form-control"
                                            id="validationCustomUsername" placeholder="Semester No."
                                            value="<?= $row['semester_no'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Reg. Id<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="registration_id" class="form-control"
                                            id="validationCustomUsername" placeholder="Reg. Id"
                                            value="<?= $row['registration_id'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Short Details<span
                                                        class="text-danger"></span></label>
                                                <textarea class="form-control" name="short_details" rows="2" cols="2"
                                                    id="" placeholder=""><?= $row['short_details'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><span class="text-danger"></span></label>
                                                <textarea class="form-control" name="details" rows="6" id="editor3"
                                                    placeholder=""><?= $row['details'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <button name="submit" type="submit" class="btn w-100 btn-outline-success">Update
                                        Member</button>
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