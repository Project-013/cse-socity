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
            $_SESSION['error'] = 'Title is required';
        }
        elseif ($date == '') {
            $_SESSION['error'] = 'Date is required';
        } 
        else {
    
            if ($_FILES["cover_image"]["name"]) {
                $old_image = mysqli_query($conn, "SELECT cover_image FROM posts WHERE id='".$_GET['id'] ."'");
                if ($old_image) {
                    $old_image = mysqli_fetch_assoc($old_image);
                    $old_image = $old_image["cover_image"];
                    if (file_exists($old_image)) {
                    unlink($old_image);
                    }
                }
                // Upload new image file
                $cover_image = "uploads/news/"  . ($_FILES["cover_image"]["name"]);
                if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $cover_image)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "UPDATE posts SET cover_image='$cover_image', title='$title', tag='$tag', date='$date', news_link='$news_link',details='$details' WHERE id='".$_GET['id'] ."'");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Update Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "UPDATE posts SET title='$title', tag='$tag', date='$date', news_link='$news_link',details='$details' WHERE id='".$_GET['id'] ."'");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Update Successfully';
                }
            }
        }
    }
    $result = mysqli_query($conn, 'SELECT * FROM posts WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">News</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=news-list" class="text-danger">News</a>
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
                <h3 class="m-b-0 text-white"><b>Add New News</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="cover_image"
                                            id="input-file-now-custom-1" data-default-file="<?= $row['cover_image'] ?>"
                                            data-height="300" />
                                        <input type="hidden" name="old_image" value="<?= $row['cover_image'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
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
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Tag<span
                                                    class="text-danger"></span></span>
                                        </div>
                                        <input type="text" name="tag" class="form-control" id="validationCustomUsername"
                                            value="<?= $row['tag'] ?>" placeholder="Tag">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Date<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="date" class="form-control" value="<?= $row['date'] ?>"
                                            placeholder="2017-06-04" id="mdate">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">News Link<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="news_link" class="form-control"
                                            id="validationCustomUsername" value="<?= $row['news_link'] ?>"
                                            placeholder="News Link">
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
                                        News</button>
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