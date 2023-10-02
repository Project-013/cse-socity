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
        $id = $_POST["id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $short_details = $_POST["short_details"];
        $facebook_link = $_POST["facebook_link"];
        $instagram_link = $_POST["instagram_link"];
        $twitter_link = $_POST["twitter_link"];
        $linkedin = $_POST["linkedin"];

        if ($name == '') {
            $_SESSION['error'] = 'Name is required';
        } elseif ($phone == '') {
            $_SESSION['error'] = 'phone id required';
        } elseif ($email == '') {
            $_SESSION['error'] = 'email is required';
        } elseif ($address == '') {
            $_SESSION['error'] = 'address is required';
        } else {
    
        if ($_FILES["logo"]["name"]) {
        // Delete old logo file (if one exists)
        $old_logo = mysqli_query($conn, "SELECT logo FROM shop_infos WHERE id=$id");
        if ($old_logo) {
            $old_logo = mysqli_fetch_assoc($old_logo);
            $old_logo = $old_logo["logo"];
            if (file_exists($old_logo)) {
            unlink($old_logo);
            }
        }
        // Upload new logo file
        $logo = "uploads/setting/"  . ($_FILES["logo"]["name"]);
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logo)) {
            // Save data to database
            if ($id) {
                $sql1 = mysqli_query($conn, "UPDATE shop_infos SET logo='$logo', name='$name', phone='$phone', email='$email', address='$address', short_details='$short_details', facebook_link='$facebook_link', instagram_link='$instagram_link', twitter_link='$twitter_link', linkedin='$linkedin' WHERE id=$id");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
            } else {
                $sql2 = mysqli_query($conn, "INSERT INTO shop_infos (id, logo, name, phone, email, address, short_details, facebook_link, instagram_link, twitter_link, linkedin) VALUES (1, '$logo', '$name', '$phone','$email', '$address', '$short_details', '$facebook_link', '$instagram_link', '$twitter_link', '$linkedin')");
                if($sql2)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
                
            }
        }
        } else {
        // Save data to database without updating logo
        if ($id) {
            $sql3 = mysqli_query($conn, "UPDATE shop_infos SET name='$name', phone='$phone', email='$email', address='$address', short_details='$short_details', facebook_link='$facebook_link', instagram_link='$instagram_link', twitter_link='$twitter_link', linkedin='$linkedin' WHERE id=$id");
            if($sql3)
            {
                $_SESSION['success'] = 'Data Update Successfully';
            }
        } else {
            $sql4 = mysqli_query($conn, "INSERT INTO shop_infos (id, name, phone, email, address, short_details, facebook_link, instagram_link, twitter_link, linkedin) VALUES (1, '$name', '$phone', '$email', '$address', '$short_details', '$facebook_link', '$instagram_link', '$twitter_link', '$linkedin')");
            if($sql4)
            {
                $_SESSION['success'] = 'Data Update Successfully';
            }

        }

        }
    }
    }

    $result = mysqli_query($conn, "SELECT * FROM shop_infos WHERE id = 1");
    $row = mysqli_fetch_assoc($result);
   
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Shop Info</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Shop Info</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Shop Info</b></h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <input type="hidden" name="id" value="<?php echo $row ? $row['id'] : '' ?>">

                        <div class="col-sm-6">
                            <div class="input-group">
                                <label class="col-md-12">Logo</label>
                                <img class="previewIcon border border-secondary rounded" id="preview1"
                                    src="<?php echo $row['logo'] ?  $row['logo'] : '' ?>"></img>
                                <input type="hidden" name="old_logo" value="<?php $row ? $row['logo'] : '' ?>">
                                <input class="form-control" type="file" id="imgInp1" name="logo">
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Name<span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="name" value="<?php echo $row ? $row['name'] : '' ?>"
                                        placeholder="Johnathan Doe" class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Email<span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="email" name="email" value="<?php echo $row ? $row['email'] : '' ?>"
                                        placeholder="Email" class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Phone<span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" value="<?php echo $row ? $row['phone'] : '' ?>"
                                        placeholder="Phone" class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Address<span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <textarea type="text" cols="2" name="address" rows="1"
                                        class="form-control form-control-line"><?php echo $row ? $row['address'] : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Short Details</label>
                                <div class="col-md-12">
                                    <textarea type="text" cols="2" name="short_details" rows="1"
                                        class="form-control form-control-line"><?php echo $row ? $row['short_details'] : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Facebook Link</label>
                                <div class="col-md-12">
                                    <input type="text" name="facebook_link"
                                        value="<?php echo $row ? $row['facebook_link'] : '' ?>"
                                        placeholder="Facebook Link" class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Instagram Link</label>
                                <div class="col-md-12">
                                    <input type="text" name="instagram_link"
                                        value="<?php echo $row ? $row['instagram_link'] : '' ?>"
                                        placeholder="Instagram Link" class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">Twitter Link</label>
                                <div class="col-md-12">
                                    <input type="text" name="twitter_link"
                                        value="<?php echo $row ? $row['twitter_link'] : '' ?>"
                                        placeholder="Twitter Link" class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-12">LinkedIn Link</label>
                                <div class="col-md-12">
                                    <input type="text" name="linkedin"
                                        value="<?php echo $row ? $row['linkedin'] : '' ?>" placeholder="LinkedIn Link"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button name="submit" type="submit" class="btn w-100 btn-outline-success">Update</button>
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