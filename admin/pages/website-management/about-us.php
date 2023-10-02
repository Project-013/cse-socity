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
        $small_description = $_POST["small_description"];
        $home_page_description = $_POST["home_page_description"];
        $main_page_description = $_POST["main_page_description"];

        if ($small_description == '') {
            $_SESSION['error'] = 'small description is required';
        } 
        else 
        {
    
            if ($_FILES["image"]["name"]) {
            // Delete old image file (if one exists)
                $old_image = mysqli_query($conn, "SELECT image FROM about_us WHERE id=$id");
                if ($old_image) {
                    $old_image = mysqli_fetch_assoc($old_image);
                    $old_image = $old_image["image"];
                    if (file_exists($old_image)) {
                    unlink($old_image);
                    }
                }
            }
            // Upload new image file
            $image = "uploads/about/"  . ($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
                    // Save data to database
                    if ($id) {
                        $sql1 = mysqli_query($conn, "UPDATE about_us SET image='$image', small_description='$small_description', home_page_description='$home_page_description', main_page_description='$main_page_description' WHERE id=$id");
                        if($sql1)
                        {
                            $_SESSION['success'] = 'Data Update Successfully';
                        }
                    } else {
                        $sql2 = mysqli_query($conn, "INSERT INTO about_us (id, image, small_description, home_page_description, main_page_description) VALUES (1, '$image', '$small_description', '$home_page_description','$main_page_description')");
                        if($sql2)
                        {
                            $_SESSION['success'] = 'Data Update Successfully';
                        }
                        
                    }
                }
                else {
                    // Save data to database without updating image
                    if ($id) {
                        $sql3 = mysqli_query($conn, "UPDATE about_us SET small_description='$small_description', home_page_description='$home_page_description', main_page_description='$main_page_description' WHERE id=$id");
                        if($sql3)
                        {
                            $_SESSION['success'] = 'Data Update Successfully';
                        }
                    } else {
                        $sql4 = mysqli_query($conn, "INSERT INTO about_us (id, small_description, home_page_description, main_page_description) VALUES (1, '$small_description', '$home_page_description', '$main_page_description')");
                        if($sql4)
                        {
                            $_SESSION['success'] = 'Data Update Successfully';
                        }

                    }

            }
        }
    }

    $result = mysqli_query($conn, "SELECT * FROM about_us WHERE id = 1");
    $row = mysqli_fetch_assoc($result);
   
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">About Us</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>About Us</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row ? $row['id'] : '' ?>">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="image" id="input-file-now-custom-1"
                                            data-default-file="<?php echo $row ? $row['image'] : '' ?>"
                                            data-height="300" />
                                        <input type="hidden" name="old_image"
                                            value="<?php $row ? $row['image'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Small Description</label>
                                        <textarea class="form-control" name="small_description" rows="2"
                                            placeholder="text here.."><?php echo $row ? $row['small_description'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Mail Page Description</label>
                                        <textarea class="form-control" name="main_page_description" rows="2"
                                            id="editor1"
                                            placeholder="text here.."><?php echo $row ? $row['main_page_description'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Home Page Description</label>
                                        <textarea class="form-control" name="home_page_description" rows="2"
                                            id="editor2"
                                            placeholder="text here.."><?php echo $row ? $row['home_page_description'] : '' ?></textarea>
                                    </div>
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