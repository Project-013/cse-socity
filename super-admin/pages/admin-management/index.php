<?php
if (isset($_GET['status_id'])) {
    $q = mysqli_query(
        $conn,
        "SELECT * FROM admins WHERE id='" . $_GET['status_id'] . "'"
    );
    $row = mysqli_fetch_assoc($q);
    if ($row) {
        if ($row['status'] == 1) {
            $stt = 0;
        } else {
            $stt = 1;
        }

        $q1 = mysqli_query(
            $conn,
            "UPDATE admins SET status ='$stt' WHERE id='" .
                $_GET['status_id'] .
                "'"
        );
        if ($q1) {
            $_SESSION['success'] = 'Status Changed Successfully';
        } else {
            $_SESSION['error'] = 'Something Is Wrong!!!';
        }
    }
} ?>

<?php if (isset($_GET['delete_id'])) {
    if (
        mysqli_query(
            $conn,
            "delete from admins where id='" . $_GET['delete_id'] . "'"
        )
    ) {
        $_SESSION['success'] = 'Data Delete Successfully';
    } else {
        $_SESSION['error'] = 'Data Not Deleted!!';
    }
} ?>

<main id="main" class="main">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <h5 class="card-title"><b>Sub-Admin List</b></h5>
                    <a href="index.php?page=add-admin" class="btn btn-primary ri-add-fill mb-2"></a>
                </div>


                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"> Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query(
                            $conn,
                            "SELECT * FROM admins where role_id = 2"
                        );
                        if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                        <tr>
                            <td scope="row"><?php echo $i; ?></td>
                            <?php
                            $file = 'images/' . $row['avatar'];
                            if (file_exists($file)) {
                                echo '<td>' .
                                    "<img alt='avatar' class='usr-img-frame mr-2'style='width:100px;height:70px' src='images/" .
                                    $row['avatar'] .
                                    "'/>" .
                                    '</td>';
                            } else {
                                echo '<td>' .
                                    "<img style='width:150px; heiht:100px;' src='images/img.png'/>" .
                                    '</td>';
                            }
                            ?>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><small><?php echo $row['status'] == 1
                                ? 'active'
                                : 'inactive'; ?></small></td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-placement="top" title="Status">
                                        <a class="m-0 <?php echo $row[
                                            'status'
                                        ] == 0
                                            ? 'text-danger btn-dark'
                                            : 'text-success btn-success'; ?>" href="index.php?page=admin-list&status_id=<?php echo $row[
    'id'
]; ?>">
                                            <i class="bi bi-<?php echo $row[
                                                'status'
                                            ] == 0
                                                ? 'toggle2-off'
                                                : 'toggle2-on'; ?>" style=""></i>
                                        </a>
                                    </li>

                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Edit">
                                        <a href="index.php?page=edit-admin&id=<?php echo $row[
                                            'id'
                                        ]; ?>" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>

                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Eelete">
                                        <a href="index.php?page=admin-list&delete_id=<?php echo $row[
                                            'id'
                                        ]; ?>" class="text-warning d-inline-block edit-item-btn">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </li>

                                </ul>
                            </td>

                        </tr>
                        <?php $i++;}
                        }
                        ?>

                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
    </div>

</main>