<main id="main" class="main">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <h5 class="card-title"><b>User List</b></h5>
                </div>


                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">avatar</th>
                            <th scope="col">Name</th>
                            <th scope="col"> Email</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query(
                            $conn,
                            "SELECT * FROM users "
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
                                : 'inactive'; ?></small>
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