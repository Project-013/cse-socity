<?php
if (isset($_GET['status_id'])) {
    $q = mysqli_query(
        $conn,
        "SELECT * FROM live_footballs WHERE id='" . $_GET['status_id'] . "'"
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
            "UPDATE live_footballs SET status ='$stt' WHERE id='" .
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
            "delete from live_footballs where id='" . $_GET['delete_id'] . "'"
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
                    <h5 class="card-title"><b>Live Football List</b></h5>
                    <a href="index.php?page=add-live-football" class="btn btn-primary ri-add-fill mb-2"></a>
                </div>


                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Info</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query(
                            $conn,
                            "SELECT t1.team_title as title1, t2.team_title as title2,t1.logo as logo1,t2.logo as logo2, 
                            l.id as id, l.score_one as score1, l.score_two as score2, l.scorer_one as scorer1,
                            l.scorer_two as scorer2, l.big_title as bigtitle, l.venue as venue, l.location as location,
                            l.day as day, l.date as date, l.time as time, l.status as status FROM live_footballs as l 
                            INNER JOIN teams t1 ON l.teamone_id = t1.id 
                            INNER JOIN teams t2 ON l.teamtwo_id = t2.id"
                        );
                        if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                        <tr class="text-center">
                            <td scope="row"><?php echo $i; ?></td>
                            <td>
                                <img class="rounded-circle" style='width:50px;height:50px'
                                    src="images/<?php echo $row['logo1'] ?>" alt=""> <span class="text-danger">VS</span>
                                <img class="rounded-circle" style='width:50px;height:50px'
                                    src="images/<?php echo $row['logo2'] ?>" alt=""><br>
                                <b><?php echo $row['score1'] ?> - <?php echo $row['score2'] ?></b><br>
                                <b><?php echo $row['title1'] ?> <span class="text-danger">VS</span>
                                    <?php echo $row['title2'] ?></b>
                            </td>

                            <td>

                                Title: <?php echo $row['bigtitle'] ?><br>
                                Venue: <?php echo $row['venue'] ?>, <?php echo $row['location'] ?><br>
                                Date: <?php echo $row['date'] ?>
                            </td>


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
                                            : 'text-success btn-success'; ?>" href="index.php?page=live-football-list&status_id=<?php echo $row[
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
                                        <a href="index.php?page=edit-live-football&id=<?php echo $row[
                                            'id'
                                        ]; ?>" class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>

                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Eelete">
                                        <a href="index.php?page=live-football-list&delete_id=<?php echo $row[
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