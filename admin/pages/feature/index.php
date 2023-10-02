<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Feature</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Feature</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Feature List</b></h3>

            </div>
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $posted = mysqli_fetch_assoc(mysqli_query($conn,  "SELECT * FROM admins where $_SESSION[''] "));
                            $q = mysqli_query($conn,  "SELECT * FROM features ");
                            if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <h5><b><?= $row['name'] ?></b><br></h5>
                                </td>
                                <td style="display: table-cell;"><span
                                        class="label label-<?= $row['status'] == 1 ? 'success' : 'warning' ?>"><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></span>
                                </td>
                                <td class="">
                                    <a class="m-0 <?= $row['status' ] == 0 ? 'text-warning': 'text-success'; ?>"
                                        href="index.php?page=feature-list&status_id=<?= $row['id']; ?>">
                                        <i style="font-size:20px"
                                            class="mdi mdi-numeric-<?= $row['status' ] == 0 ? '0-box' : '1-box'; ?>"
                                            style=""></i>
                                    </a>
                                    <a class="" href="index.php?page=feature-list&edit_id=<?= $row['id'] ?>"
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
    <?php
    if(isset($_GET['edit_id']))
    { 
    $result = mysqli_query($conn, 'SELECT * FROM features WHERE id="'.$_GET['edit_id'].'"');
    $feature = mysqli_fetch_assoc($result);
    ?>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Edit Feature</b></h3>
            </div>
            <div class="card-body">
                <form method="post" action="" class="form-horizontal p-t-20">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="text" name="name" class="form-control" value="<?= $feature['name'] ?>"
                                    placeholder="feature name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="col-sm-12">
                            <button type="submit" name="submit"
                                class="btn btn-success waves-effect waves-light text-white w-100">Update</button>
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
                <h3 class="m-b-0 text-white"><b>Add New Feature</b></h3>
            </div>
            <div class="card-body">
                <form method="post" action="" class="form-horizontal p-t-20">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-dropbox">*</i></span>
                                <input type="text" name="name" class="form-control" placeholder="feature name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="col-sm-12">
                            <button type="submit" name="submit"
                                class="btn btn-success waves-effect waves-light text-white w-100">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
    if (isset($_GET['status_id'])) {
        $q = mysqli_query($conn, "SELECT * FROM features WHERE id='" . $_GET['status_id'] . "'");
        $row = mysqli_fetch_assoc($q);
        if ($row) {
            if ($row['status'] == 1) {
                $stt = 0;
            } else {
                $stt = 1;
            }
            $q1 = mysqli_query(
                $conn,
                "UPDATE features SET status ='$stt' WHERE id='" .$_GET['status_id'] . "'" );
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
            if (mysqli_num_rows(mysqli_query($conn, "select * from features where name='$name' and id != '".$_GET['edit_id'] ."'"))) {
                $_SESSION['error'] = 'name has alerady taken!!!';
            }
            else 
            {
                $sql1 = mysqli_query($conn, "UPDATE features SET name='$name' where id= '".$_GET['edit_id']."'");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Updated Successfully';
                }
            }

        }
        else{
            extract($_POST);
            if (mysqli_num_rows(mysqli_query($conn, "select * from features where name='$name'"))) {
                $_SESSION['error'] = 'name has alerady taken!!!';
            }
            else 
            {
                $sql1 = mysqli_query($conn, "INSERT INTO features (name) VALUES ('$name')");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Inserted Successfully';
                }
            }
        }
       
    }
   
?>