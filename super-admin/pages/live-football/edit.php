<?php

if (isset($_POST['submit'])) {
    extract($_POST);

    if ($teamone_id == '') {
        $_SESSION['error'] = 'TeamOne field required';
    }
    if ($teamtwo_id == '') {
        $_SESSION['error'] = 'TeamTwo field required';
    } elseif ($big_title == '') {
        $_SESSION['error'] = 'Title field required';
    } elseif ($venue == '') {
        $_SESSION['error'] = 'venue field required';
    } elseif ($location == '') {
        $_SESSION['error'] = 'location field required';
    } elseif ($day == '') {
        $_SESSION['error'] = 'day field required';
    } elseif ($date == '') {
        $_SESSION['error'] = 'date field required';
    } elseif ($time == '') {
        $_SESSION['error'] = 'time field required';
    }
    elseif ($score_one == '') {
        $_SESSION['error'] = 'score one field required';
    }
    elseif ($score_two == '') {
        $_SESSION['error'] = 'score two field required';
    }
    elseif ($match_status == '') {
        $_SESSION['error'] = 'Match Status field required';
    }
    elseif ($match_time == '') {
        $_SESSION['error'] = 'Match Time field required';
    } else {
        $run1 = mysqli_query(
            $conn,
            "update live_footballs set teamone_id='$teamone_id',teamtwo_id='$teamtwo_id', big_title='$big_title',
             venue='$venue', location='$location', day='$day',
              date='$date', time='$time',
               score_one='$score_one',score_two='$score_two', match_status='$match_status',
               match_time='$match_time', scorer_one='$scorer_one',
               scorer_two='$scorer_two' where id='" .
            $_GET['id'] .
            "'"
        );
        if ($run1) {
            $_SESSION['success'] = 'Data Save Successfully';
        } else {
            $_SESSION['error'] = 'Data Not Save!!!';
        }
    }
} ?>
<?php $row = mysqli_fetch_assoc(
    mysqli_query($conn, 'select * from live_footballs where id="' . $_GET['id'] . '" ')
); ?>


<head>

</head>
<main id="main" class="main">
    <section class="section">
        <div class="col-12">
            <div class="row ">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Live Football Match</h5>
                            <!-- General Form Elements -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mt-4 justify-content-center">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Select Team One<span
                                                                        class="text-danger">*</span></label>
                                                                <select type="text" class="form-control"
                                                                    name="teamone_id">
                                                                    <option value="">--Select TeamOne--</option>
                                                                    <?php
                                                                    $q = mysqli_query( $conn,'select * from teams');
                                                                    if (
                                                                        mysqli_num_rows( $q) > 0 ) {
                                                                        while (
                                                                            $team = mysqli_fetch_assoc(
                                                                                $q
                                                                            )
                                                                        ) { ?>

                                                                    <option value="<?php echo $team['id']; ?>"
                                                                        <?php if ($row['teamone_id'] == $team['id']) {echo 'selected';} ?>>
                                                                        <?php echo $team['team_title']; ?>
                                                                    </option>

                                                                    <?php }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Select Team Two<span
                                                                        class="text-danger">*</span></label>
                                                                <select type="text" class="form-control"
                                                                    name="teamtwo_id">
                                                                    <option value="">--Select TeamTwo--</option>
                                                                    <?php
                                                                    $q = mysqli_query(
                                                                        $conn,
                                                                        'select * from teams'
                                                                    );
                                                                    if (
                                                                        mysqli_num_rows(
                                                                            $q
                                                                        ) > 0
                                                                    ) {
                                                                        while (
                                                                            $team = mysqli_fetch_assoc(
                                                                                $q
                                                                            )
                                                                        ) { ?>

                                                                    <option value="<?php echo $team[
                                                                        'id'
                                                                    ]; ?>"
                                                                        <?php if ($row['teamtwo_id'] == $team['id']) {echo 'selected';} ?>>
                                                                        <?php echo $team['team_title']; ?></option>

                                                                    <?php }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Big Title<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="big_title"
                                                                    placeholder="Title"
                                                                    value=" <?php echo $row['big_title']; ?>">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Venue<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="venue"
                                                                    placeholder="Venue"
                                                                    value="<?php echo $row['venue']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Location<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="location"
                                                                    placeholder="Location"
                                                                    value="<?php echo $row['location']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 col-sm-4 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">day<span
                                                                        class="text-danger">*</span></label>
                                                                <select type="text" class="form-control" name="day">
                                                                    <option value="<?php echo $row['day'] ?>">
                                                                        <?php echo $row['day'] ?></option>
                                                                    <option value="">select day</option>
                                                                    <option value="saterday">saterday</option>
                                                                    <option value="sunday">sunday</option>
                                                                    <option value="monday">monday</option>
                                                                    <option value="tuesday">tuesday</option>
                                                                    <option value="wednesday">wednesday</option>
                                                                    <option value="thursday">thursday</option>
                                                                    <option value="friday">friday</option>
                                                                </select>
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 col-sm-4 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Date<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="date"
                                                                    placeholder="Date"
                                                                    value="<?php echo $row['date']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-sm-4 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Time<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="time" class="form-control" name="time"
                                                                    placeholder="Time"
                                                                    value="<?php echo $row['time']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Score Team One<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="score_one"
                                                                    placeholder="Score Team one"
                                                                    value="<?php echo $row['score_one']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Socre Team Two<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="score_two"
                                                                    placeholder="Socre Team Two"
                                                                    value="<?php echo $row['score_two']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Match Status<span
                                                                        class="text-danger">*</span></label>
                                                                <select type="text" class="form-control"
                                                                    name="match_status" value="">
                                                                    <option value="<?php echo $row['match_status']; ?>">
                                                                        <?php echo $row['match_status']; ?></option>
                                                                    <option value="--">--</option>
                                                                    <option value="running">running</option>
                                                                </select>
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Match Time<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    name="match_time" placeholder="Match Time"
                                                                    value=" <?php echo $row['match_time']; ?>">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Scorer Team One<span
                                                                        class="text-danger">*</span></label>
                                                                <textarea type="text" class="form-control"
                                                                    name="scorer_one" placeholder="Scorer Team one"
                                                                    value=""><?php echo $row['scorer_one']; ?></textarea>
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Scorer Team Two<span
                                                                        class="text-danger">*</span></label>
                                                                <textarea type="text" class="form-control"
                                                                    name="scorer_two" placeholder="Scorer Team Two"
                                                                    value=""><?php echo $row['scorer_two']; ?> </textarea>
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right mt-4">
                                            <button class="btn btn-primary" name="submit" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>