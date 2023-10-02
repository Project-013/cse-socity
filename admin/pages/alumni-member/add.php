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
        elseif ($time_range == '') {
            $_SESSION['error'] = 'time_range is required';
        }
        elseif (mysqli_num_rows(mysqli_query($conn, "select * from members where name='$name'"))) {
            $_SESSION['error'] = 'name has alerady taken!!!';
        }
        elseif (mysqli_num_rows(mysqli_query($conn, "select * from members where email='$email'"))) {
            $_SESSION['error'] = 'email has alerady taken!!!';
        }
        else {
            
            if ($_FILES["avatar"]["name"]) {
        
                // Upload new avatar file
                $avatar = "uploads/members/alumni/"  . ($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "INSERT INTO members (avatar, name, email, phone, designation, address, time_range, short_details,  details, type) VALUES ('$avatar', '$name', '$email', '$phone','$designation', '$address', '$time_range', '$short_details', '$details', 'alumni')");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Inserted Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "INSERT INTO members (name, email, phone, designation, address, time_range, short_details,  details, type) VALUES ('$name', '$email', '$phone','$designation', '$address', '$time_range', '$short_details', '$details', 'alumni')");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Inserted Successfully';
                }
            }
        }
    }

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Alumni Member</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=alumni-member-list"
                        class="text-danger">Alumni Member</a>
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
                <h3 class="m-b-0 text-white"><b>Add New Member</b></h3>
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
                                            data-default-file="" data-height="300" />
                                        <!-- <input type="hidden" name="old_image"
                                            value=""> -->
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
                                            id="validationCustomUsername" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Email<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                            id="validationCustomUsername" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Phone<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="phone" class="form-control"
                                            id="validationCustomUsername" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Designation<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="designation" class="form-control"
                                            placeholder="Designation">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Time Range<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="time_range" class="form-control"
                                            placeholder="20 may, 2022 - 13 june, 2023">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Address<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="address" class="form-control"
                                            id="validationCustomUsername" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Short Details<span
                                                        class="text-danger"></span></label>
                                                <textarea class="form-control" name="short_details" rows="2" cols="2"
                                                    id="" placeholder=""></textarea>
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
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <button name="submit" type="submit" class="btn w-100 btn-outline-success">Add New
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