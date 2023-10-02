<style>
.previewIcon {
    width: 38px;
    height: 40px;
    margin-right: 1px;
}
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Testimonial</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Testimonial</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <?php
    if(isset($_GET['edit_id']))
    { 
    $result = mysqli_query($conn, 'SELECT * FROM testimonial WHERE id="'.$_GET['edit_id'].'"');
    $testimonial = mysqli_fetch_assoc($result);
    ?>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Edit Testimonial</b></h3>
            </div>
            <div class="card-body">
                <form method="post" action="" class="form-horizontal p-t-20" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <img class="previewIcon border border-secondary rounded" id="preview5"
                                    src="<?php echo $testimonial['avatar'] ?  $testimonial['avatar'] : '' ?>"></img>
                                <input type="hidden" name="old_avatar"
                                    value="<?php echo $testimonial ? $testimonial['avatar'] : '' ?>">
                                <input class="form-control" type="file" id="imgInp5" name="avatar">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="number" name="star" class="form-control"
                                    value="<?= $testimonial['star'] ?>" placeholder="Star">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="text" name="name" class="form-control" value="<?= $testimonial['name'] ?>"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="text" name="designation" class="form-control"
                                    value="<?= $testimonial['designation'] ?>" placeholder="Designation">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox"></i></span>
                                <textarea type="text" name="message"
                                    class="form-control"><?= $testimonial['message'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="col-sm-12">
                            <button type="submit" name="submit"
                                class="btn btn-info waves-effect waves-light text-white w-100">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php } else{?>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Add New Testimonial</b></h3>
            </div>
            <div class="card-body">
                <form method="post" action="" class="form-horizontal p-t-20" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <img class="previewIcon border border-secondary rounded" id="preview5" src=""></img>
                                <input class="form-control" type="file" id="imgInp5" name="avatar">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="number" name="star" class="form-control" value="" placeholder="Star">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="text" name="name" class="form-control" value="" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="text" name="designation" class="form-control" value=""
                                    placeholder="Designation">
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox"></i></span>
                                <textarea type="text" name="message" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="col-sm-12">
                            <button type="submit" name="submit"
                                class="btn btn-info waves-effect waves-light text-white w-100">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-sm-8">
        <div class="card ">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Testimonial List</b></h3>

            </div>
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>avatar</th>
                                <th>Others</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $posted = mysqli_fetch_assoc(mysqli_query($conn,  "SELECT * FROM admins where $_SESSION[''] "));
                            $q = mysqli_query($conn,  "SELECT * FROM testimonial ");
                            if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <h5><img src="<?= $row['avatar'] ?>" height="50px" width="50px"
                                            style="object-fit:fill" alt=""></h5>
                                </td>
                                <td>
                                    <h5>
                                        <b>Name: <?= $row['name'] ?></b><br>
                                        <b>Designation: <?= $row['designation'] ?></b><br>
                                    </h5>
                                </td>
                                <td>
                                    <?= $row['message'] ?>
                                </td>
                                <td style="display: table-cell;"><span
                                        class="label label-<?= $row['status'] == 1 ? 'success' : 'info' ?>"><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></span>
                                </td>
                                <td class="">
                                    <a class="m-0 <?= $row['status' ] == 0 ? 'text-info': 'text-success'; ?>"
                                        href="index.php?page=testimonial-list&status_id=<?= $row['id']; ?>">
                                        <i style="font-size:20px"
                                            class="mdi mdi-numeric-<?= $row['status' ] == 0 ? '0-box' : '1-box'; ?>"
                                            style=""></i>
                                    </a>
                                    <a class="" href="index.php?page=testimonial-list&edit_id=<?= $row['id'] ?>"
                                        title="Edit"><i class="mdi mdi-lead-pencil text-info"
                                            style="font-size:20px"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++;} } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_GET['status_id'])) {
        $q = mysqli_query($conn, "SELECT * FROM testimonial WHERE id='" . $_GET['status_id'] . "'");
        $row = mysqli_fetch_assoc($q);
        if ($row) {
            if ($row['status'] == 1) {
                $stt = 0;
            } else {
                $stt = 1;
            }
            $q1 = mysqli_query(
                $conn,
                "UPDATE testimonial SET status ='$stt' WHERE id='" .$_GET['status_id'] . "'" );
            if ($q1) {
                $_SESSION['success'] = 'Status Changed Successfully';
            } else {
                $_SESSION['error'] = 'Something Is Wrong!!!';
            }
        }
    } 
?>

<?php
    if(isset($_POST['submit']))
    {
        if(isset($_GET['edit_id']))
        { 
            extract($_POST);
            if ($_FILES["avatar"]["name"]) {
                $old_avatar = mysqli_query($conn, "SELECT avatar FROM testimonial WHERE id='".$_GET['edit_id'] ."'");
                if ($old_avatar) {
                    $old_avatar = mysqli_fetch_assoc($old_avatar);
                    $old_avatar = $old_avatar["avatar"];
                    if (file_exists($old_avatar)) {
                    unlink($old_avatar);
                    }
                }
                // Upload new image file
                $avatar = "uploads/testimonial/"  . ($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar)) {
                    // Save data to database 
                    $sql = mysqli_query($conn, "UPDATE testimonial SET avatar='$avatar', name='$name',star= '$star', designation= '$designation', message= '$message' WHERE id='".$_GET['edit_id'] ."'");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Update Successfully';
                    }     
                }
            }
            else
            {
                $sql1 = mysqli_query($conn, "UPDATE testimonial SET name='$name',star= '$star', designation= '$designation', message= '$message' where id= '".$_GET['edit_id']."'");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Updated Successfully';
                }  
            }
        }

        
        else{
            extract($_POST);
            if ($_FILES["avatar"]["name"]) {
    
                // Upload new avatar file
                $avatar = "uploads/testimonial/"  . ($_FILES["avatar"]["name"]);
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatar)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "INSERT INTO testimonial (avatar, name, star, designation, message) VALUES ('$avatar', '$name', '$star', '$designation', '$message')");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Inserted Successfully';
                    }     
                }
            }
            else{
                $sql1 = mysqli_query($conn, "INSERT INTO testimonial (name, star, designation, message) VALUES ('$name', '$star', '$designation', '$message')");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Inserted Successfully';
                }
            }
            
        }
       
    }
   
?>

<script>
imgInp5.onchange = evt => {
    const [file] = imgInp5.files;
    if (file) {
        preview5.src = URL.createObjectURL(file)
    }
}
</script>