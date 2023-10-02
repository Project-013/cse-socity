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

        if ($heading_one == '') {
            $_SESSION['error'] = 'heading_one is required';
        } else {
    
            if ($_FILES["image"]["name"]) {
        
                // Upload new image file
                $image = "uploads/slider/"  . ($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "INSERT INTO photo_sliders (image, heading_one, small_text, btn_title, btn_link) VALUES ('$image', '$heading_one', '$small_text','$btn_title','$btn_link')");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Update Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "INSERT INTO photo_sliders (heading_one, small_text, btn_title, btn_link) VALUES ('$heading_one', '$small_text','$btn_title','$btn_link')");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
            }
        }
    }

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Slider</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=slider-list" class="text-danger">Slider</a>
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
                <h3 class="m-b-0 text-white"><b>Add New Slider</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <label for="">Upload Image</label> -->
                                        <input type="file" class="dropify" name="image" id="input-file-now-custom-1"
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
                                            <span class="input-group-text" id="inputGroupPrepend">Heading<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="heading_one" class="form-control"
                                            id="validationCustomUsername" placeholder="Heading..">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Small Text</span>
                                        </div>
                                        <textarea rows="1" name="small_text" class="form-control"
                                            id="validationCustomUsername" placeholder="text here..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Button Title</span>
                                        </div>
                                        <input type="text" name="btn_title" class="form-control"
                                            id="validationCustomUsername" placeholder="Button Title..">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Button Link</span>
                                        </div>
                                        <input type="text" name="btn_link" class="form-control"
                                            id="validationCustomUsername" placeholder="Button link..">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-5">
                                    <button name="submit" type="submit" class="btn w-100 btn-outline-success">Add New
                                        Slider</button>
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