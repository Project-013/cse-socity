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
        if ($title == '') {
            $_SESSION['error'] = 'title is required';
        }
        elseif ($short_details == '') {
            $_SESSION['error'] = 'short_details is required';
        }
        else {
    
            if ($_FILES["logo"]["name"]) {
                $old_logo = mysqli_query($conn, "SELECT logo FROM service WHERE id='".$_GET['id'] ."'");
                if ($old_logo) {
                    $old_logo = mysqli_fetch_assoc($old_logo);
                    $old_logo = $old_logo["logo"];
                    if (file_exists($old_logo)) {
                    unlink($old_logo);
                    }
                }
                // Upload new image file
                $logo = "uploads/service/"  . ($_FILES["logo"]["name"]);
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logo)) {
                    // Save data to database 
                    $sql = mysqli_query($conn, "UPDATE service SET logo='$logo', title='$title',logo_link= '$logo_link',short_details='$short_details',details='$details' WHERE id='".$_GET['id'] ."'");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Update Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "UPDATE service SET title='$title',logo_link= '$logo_link',short_details='$short_details',details='$details' WHERE id='".$_GET['id'] ."'");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
            }
        }
    }


    $result = mysqli_query($conn, 'SELECT * FROM service WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Service</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=service-list" class="text-danger">Service</a>
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
                <h3 class="m-b-0 text-white"><b>Update Service</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="logo" id="input-file-now-custom-1"
                                            data-default-file="<?= $row['logo'] ?>" data-height="300" />
                                        <input type="hidden" name="old_logo" value="<?= $row['logo'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">

                                <div class="col-md-12 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Logo (Link/Class)<span
                                                    class="text-danger"></span></span>
                                        </div>
                                        <input type="text" name="logo_link" class="form-control"
                                            id="validationCustomUsername" value="<?= $row['logo_link'] ?>"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Title<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="title" class="form-control"
                                            id="validationCustomUsername" value="<?= $row['title'] ?>"
                                            placeholder="Title">
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
                                                <textarea class="form-control" name="details" rows="6" id="editor4"
                                                    placeholder=""><?= $row['details'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <button name="submit" type="submit" class="btn w-100 btn-outline-success">Update
                                        service</button>
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