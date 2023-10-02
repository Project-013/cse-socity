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
            "INSERT INTO `live_footballs`(`teamone_id`,`teamtwo_id`, `big_title`, `venue`, `location`,`day`,`date`,`time`,`score_one`,`score_two`, `match_status`,`match_time`,`scorer_one`,`scorer_two`, `status`) VALUES ('$teamone_id','$teamtwo_id','$big_title','$venue','$location','$day','$date','$time','$score_one','$score_two', '$match_status','$match_time','$scorer_one','$scorer_two','1')"
        );
        if ($run1) {
            $_SESSION['success'] = 'Data Save Successfully';
        } else {
            $_SESSION['error'] = 'Data Not Save!!!';
        }
    }

} ?>


<head>

</head>
<main id="main" class="main">
    <section class="section">
        <div class="col-12">
            <div class="row ">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Live Football Match</h5>
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
                                                                    $q = mysqli_query(
                                                                        $conn,
                                                                        'select * from teams where status=1 '
                                                                    );
                                                                    if (
                                                                        mysqli_num_rows(
                                                                            $q
                                                                        ) > 0
                                                                    ) {
                                                                        while (
                                                                            $row = mysqli_fetch_assoc(
                                                                                $q
                                                                            )
                                                                        ) { ?>
                                                                    <option value="<?php echo $row[
                                                                        'id'
                                                                    ]; ?>"><?php echo $row['team_title']; ?></option>

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
                                                                        'select * from teams where status=1 '
                                                                    );
                                                                    if (
                                                                        mysqli_num_rows(
                                                                            $q
                                                                        ) > 0
                                                                    ) {
                                                                        while (
                                                                            $row = mysqli_fetch_assoc(
                                                                                $q
                                                                            )
                                                                        ) { ?>
                                                                    <option value="<?php echo $row[
                                                                        'id'
                                                                    ]; ?>"><?php echo $row['team_title']; ?></option>

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
                                                                    placeholder="Title" value="">

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
                                                                    placeholder="Venue" value="">
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
                                                                    placeholder="Location" value="">
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
                                                                    placeholder="Date" value="">
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
                                                                    placeholder="Time" value="">
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
                                                                    placeholder="Score Team one" value="">
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
                                                                    placeholder="Socre Team Two" value="">
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
                                                                    <option value="">select</option>
                                                                    <option value="">--</option>
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
                                                                    name="match_time" placeholder="Match Time" value="">
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
                                                                    value=""> </textarea>
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
                                                                    value=""> </textarea>
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