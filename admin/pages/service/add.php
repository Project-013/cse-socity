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
        
                // Upload new logo file
                $logo = "uploads/service/"  . ($_FILES["logo"]["name"]);
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $logo)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "INSERT INTO service (logo, logo_link, title, short_details,  details) VALUES ('$logo', '$logo_link', '$title', '$short_details', '$details')");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Inserted Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "INSERT INTO service (logo_link, title, short_details,  details) VALUES ('$logo_link', '$title', '$short_details', '$details')");
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
                <h3 class="m-b-0 text-white"><b>Add New Service</b></h3>
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
                                            data-default-file="" data-height="300" />
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
                                            id="validationCustomUsername" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Title<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="title" class="form-control"
                                            id="validationCustomUsername" placeholder="Title">
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
                                                <textarea class="form-control" name="details" rows="6" id="editor4"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <button name="submit" type="submit" class="btn w-100 btn-success">Add New
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