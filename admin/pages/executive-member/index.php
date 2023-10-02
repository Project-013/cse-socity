<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Executive Member</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Executive Member</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <a href="index.php?page=add-executive-member"
                    class="btn waves-effect waves-light btn-outline-light float-end">Add
                    New Member</a>

                <h3 class="m-b-0 text-white"><b>Executive Member</b></h3>

            </div>
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Info</th>
                                <th>Other Info</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $posted = mysqli_fetch_assoc(mysqli_query($conn,  "SELECT * FROM admins where $_SESSION[''] "));
                        $q = mysqli_query($conn,  "SELECT * FROM members where type='executive' ");
                        if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <img src="<?= $row['avatar'] ?>" style="width:80px;height:50px;" alt="">
                                </td>
                                <td>
                                    <h5>
                                        Name: <b><?= $row['name'] ?></b><br>
                                        Designation: <small><?= $row['designation'] ?></small><br>
                                        Email: <b><?= $row['email'] ?></b><br>
                                        Address: <b><?= $row['address'] ?></b><br>

                                    </h5>
                                </td>
                                <td>
                                    Semester: <b><?= $row['semester_no'] ?></b><br>
                                    ID: <b><?= $row['registration_id'] ?></b><br>
                                    Pnone: <b><?= $row['phone'] ?></b><br>
                                </td>
                                <td style="display: table-cell;"><span
                                        class="label label-<?= $row['status'] == 1 ? 'success' : 'warning' ?>"><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></span>
                                </td>
                                <td class="">
                                    <a class="m-0 <?= $row['status' ] == 0 ? 'text-warning': 'text-success'; ?>"
                                        href="index.php?page=executive-member-list&status_id=<?= $row['id']; ?>">
                                        <i style="font-size:20px"
                                            class="mdi mdi-numeric-<?= $row['status' ] == 0 ? '0-box' : '1-box'; ?>"
                                            style=""></i>
                                    </a>
                                    <a class="" href="index.php?page=edit-executive-member&id=<?= $row['id'] ?>"
                                        title="Edit"><i class="mdi mdi-lead-pencil text-info"
                                            style="font-size:20px"></i>
                                    </a>
                                    <a class="" href="index.php?page=executive-member-list&delete_id=<?= $row['id'] ?>"
                                        title="Delete"><i class="mdi mdi-delete-empty text-danger"
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
    $q = mysqli_query($conn, "SELECT * FROM members WHERE id='" . $_GET['status_id'] . "'");
    $row = mysqli_fetch_assoc($q);
    if ($row) {
        if ($row['status'] == 1) {
            $stt = 0;
        } else {
            $stt = 1;
        }
        $q1 = mysqli_query(
            $conn,
            "UPDATE members SET status ='$stt' WHERE id='" .$_GET['status_id'] . "'" );
        if ($q1) {
            $_SESSION['success'] = 'Status Changed Successfully';
        } else {
            $_SESSION['error'] = 'Something Is Wrong!!!';
        }
    }
} 
?>
<?php if (isset($_GET['delete_id'])) {
    if (
        mysqli_query(
            $conn,
            "delete from members where id='" . $_GET['delete_id'] . "'"
        )
    ) {
        $_SESSION['success'] = 'Data Deleted Successfully';
    } else {
        $_SESSION['error'] = 'Data Not Deleted!!';
    }
} ?>