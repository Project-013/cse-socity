<?php
if (isset($_GET['status_id'])) {
    $q = mysqli_query(
        $conn,
        "SELECT * FROM live_crickets WHERE id='" . $_GET['status_id'] . "'"
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
            "UPDATE live_crickets SET status ='$stt' WHERE id='" .
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
            "delete from live_crickets where id='" . $_GET['delete_id'] . "'"
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
                    <h5 class="card-title"><b>Live Cricket List</b></h5>
                    <a href="index.php?page=add-live-cricket" class="btn btn-primary ri-add-fill mb-2"></a>
                </div>


                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Info</th>
                            <th scope="col">Other Info</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query(
                            $conn,
                            "SELECT t1.team_title as title1, t2.team_title as title2,t1.logo as logo1,t2.logo as logo2, 
                            l.id as id, l.big_title as bigtitle, l.venue as venue, l.location as location,
                            l.day as day, l.date as date, l.time as time,
                            l.total_run_one as total_run_teamone,
                            l.total_wicket_one as total_wicket_teamone,
                            l.total_run_two as total_run_teamtwo,
                            l.total_wicket_two as total_wicket_teamtwo,
                            l.total_over_one as total_over_teamone,
                            l.total_over_two as total_over_teamtwo,
                            l.batsman_one as batsman_one,
                            l.batsman_two as batsman_two,
                            l.r1 as run1,l.r2 as run2,l.b1 as ball1,l.b2 as ball2,l.sr1 as sr1,l.sr2 as sr2,
                            l.bowler as bowler,l.over as overs, l.run as run,l.econ as econ,l.wicket as wicket,l.meiden as meiden,l.fours1 as fours1,l.six1 as six1,l.fours2 as fours2,l.six2 as six2,
                             l.status as status FROM live_crickets as l 
                            INNER JOIN teams t1 ON l.teamone_id = t1.id 
                            INNER JOIN teams t2 ON l.teamtwo_id = t2.id"
                        );
                        // $q = mysqli_query($conn,"SELECT a.name as std_name, b.sub_name as sub_name, b.credit as credit, c.marks as marks FROM student_result as c 
                        //  INNER JOIN student a ON c.stu_id = a.id 
                        //     INNER JOIN subject b ON b.sub_id = a.id");
                        if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                        <tr class="text-center">
                            <td scope="row"><?php echo $i; ?></td>
                            <td><br><br>
                                <img class="rounded-circle" style='width:30px;height:30px'
                                    src="images/<?php echo $row['logo1'] ?>" alt=""> <span class="text-danger">VS</span>
                                <img class="rounded-circle" style='width:30px;height:30px'
                                    src="images/<?php echo $row['logo2'] ?>" alt=""><br><br>

                                <br>
                                <b><?php echo $row['title1'] ?> <span class="text-danger">=></span>
                                    <?php echo $row['total_run_teamone'] ?>/<?php echo $row['total_wicket_teamone'] ?>
                                    (<?php echo $row['total_over_teamone'] ?>) <br>
                                    <b><?php echo $row['title2'] ?> <span class="text-danger">=></span>
                                        <?php echo $row['total_run_teamtwo'] ?>/<?php echo $row['total_wicket_teamtwo'] ?>
                                        (<?php echo $row['total_over_teamtwo'] ?>)
                            </td>
                            <td>
                                <table class="table table-borderd">
                                    <tr>
                                        <th>BAT</th>
                                        <th>R</th>
                                        <th>B</th>
                                        <th>4s</th>
                                        <th>6s</th>
                                        <th>SR</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row['batsman_one'] ?></td>
                                        <td><?php echo $row['run1'] ?></td>
                                        <td><?php echo $row['ball1'] ?></td>
                                        <td><?php echo $row['fours1'] ?></td>
                                        <td><?php echo $row['six1'] ?></td>
                                        <td><?php echo $row['sr1'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row['batsman_two'] ?></td>
                                        <td><?php echo $row['run2'] ?></td>
                                        <td><?php echo $row['ball2'] ?></td>
                                        <td><?php echo $row['fours2'] ?></td>
                                        <td><?php echo $row['six2'] ?></td>
                                        <td><?php echo $row['sr2'] ?></td>
                                    </tr>
                                </table>
                                <hr>
                                <table class="table table-borderd">
                                    <tr>
                                        <th>BL</th>
                                        <th>R</th>
                                        <th>O</th>
                                        <th>W</th>
                                        <th>M</th>
                                        <th>Eco</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row['bowler'] ?></td>
                                        <td><?php echo $row['run'] ?></td>
                                        <td><?php echo $row['overs'] ?></td>
                                        <td><?php echo $row['wicket'] ?></td>
                                        <td><?php echo $row['meiden'] ?></td>
                                        <td><?php echo $row['econ'] ?></td>

                                    </tr>
                                </table>
                            </td>
                            <td><br><br>
                                Title: <?php echo $row['bigtitle'] ?><br>
                                Venue: <?php echo $row['venue'] ?>, <?php echo $row['location'] ?><br>
                                Date: <?php echo $row['date'] ?>
                            </td>


                            <td><br><br><small><?php echo $row['status'] == 1
                                ? 'active'
                                : 'inactive'; ?></small></td>
                            <td class=""><br><br>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-placement="top" title="Status">
                                        <a class="m-0 <?php echo $row[
                                            'status'
                                        ] == 0
                                            ? 'text-danger btn-dark'
                                            : 'text-success btn-success'; ?>" href="index.php?page=live-cricket-list&status_id=<?php echo $row[
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
                                        <a href="index.php?page=edit-live-cricket&id=<?php echo $row[
                                            'id'
                                        ]; ?>" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>

                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Eelete">
                                        <a href="index.php?page=live-cricket-list&delete_id=<?php echo $row[
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