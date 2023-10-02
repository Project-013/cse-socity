<?php

if (isset($_POST['submit'])) {
    extract($_POST);

    if ($big_title == '') {
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
    
    elseif ($batsman_one == '') {
        $_SESSION['error'] = 'batsman_one field required';
    }
    elseif ($r1 == '') {
        $_SESSION['error'] = 'r1 field required';
    }
    elseif ($b1 == '') {
        $_SESSION['error'] = 'b1 field required';
    }
    elseif ($batsman_two== '') {
        $_SESSION['error'] = 'batsman_two field required';
    }
    elseif ($r2 == '') {
        $_SESSION['error'] = 'r2 field required';
    }
    elseif ($b2 == '') {
        $_SESSION['error'] = 'b2 field required';
    }

    elseif ($bowler == '') {
        $_SESSION['error'] = 'bowler field required';
    }
    elseif ($over == '') {
        $_SESSION['error'] = 'over field required';
    }
    elseif ($meiden == '') {
        $_SESSION['error'] = 'meiden field required';
    }
    elseif ($run == '') {
        $_SESSION['error'] = 'run field required';
    }
    elseif ($wicket == '') {
        $_SESSION['error'] = 'wicket field required';
    }
    elseif ($econ == '') {
        $_SESSION['error'] = 'econ field required';
    }
    
     else {
        $run1 = mysqli_query(
            $conn,
            "INSERT INTO `live_crickets`(`big_title`, `venue`, `location`, `day`, `date`, `time`, `teamone_id`, `teamtwo_id`,
             `total_run_one`, `total_run_two`, `total_wicket_one`, `total_wicket_two`, `total_over_one`, `total_over_two`, `batsman_one`,
              `r1`, `b1`, `fours1`, `six1`, `sr1`, `batsman_two`, `r2`, `b2`, `fours2`, `six2`, `sr2`, `bowler`, `over`, `meiden`,
               `run`, `wicket`, `econ`,`comentary`)
                VALUES ('$big_title','$venue','$location','$day','$date','$time','$teamone_id','$teamtwo_id','$total_run_one',
                '$total_run_two','$total_wicket_one','$total_wicket_two','$total_over_one','$total_over_two','$batsman_one','$r1',
                '$b1','$fours1','$six1','$sr1','$batsman_two','$r2','$b2','$fours2','$six2','$sr2','$bowler',
                '$over', '$meiden','$run','$wicket','$econ','$comentary')"
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
                            <h5 class="card-title">Add Live Cricket Match</h5>
                            <!-- General Form Elements -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mt-4 justify-content-center">
                                    <div class="col-lg-12 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 ">
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
                                                        <hr class="mt-4 text-danger"
                                                            style="border: 10px solid green;border-radius: 5px;">
                                                        <div class="col-4 col-sm-4 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Select Team One<span
                                                                        class="text-danger"></span></label>
                                                                <select type="text" class="form-control"
                                                                    name="teamone_id">
                                                                    <option value="">--</option>
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
                                                        <div class="col-2 col-sm-2 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Run1<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_run_one" placeholder="" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-sm-4 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Select Team Two<span
                                                                        class="text-danger"></span></label>
                                                                <select type="text" class="form-control"
                                                                    name="teamtwo_id">
                                                                    <option value="">--</option>
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
                                                        <div class="col-2 col-sm-2 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Run2<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_run_two" placeholder="" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>

                                                        <div class="col-3 col-sm-3 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Wicket1 <span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_wicket_one" placeholder="" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-sm-3 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Over1 <span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_over_one" placeholder="" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-sm-3 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Over2 <span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_over_two" placeholder="" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <div class="col-3 col-sm-3 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Wicket2 <span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_wicket_two" placeholder="" value="">

                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>

                                                            </div>
                                                        </div>
                                                        <hr class="mt-4 text-danger"
                                                            style="border: 10px solid blue;border-radius: 5px;">
                                                        <div class="col-7 col-sm-7 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Batsman One<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    name="batsman_one" placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">R1<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="r1"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">B1<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="b1"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Fours1<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control" name="fours1"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">six1<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control" name="six1"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">SR1<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control" name="sr1"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-7 col-sm-7 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Batsman Two<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    name="batsman_two" placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">R2<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="r2"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">B2<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="b2"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Fours2<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control" name="fours2"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Six2<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control" name="six2"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">SR2<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control" name="sr2"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <hr class="mt-4 text-danger"
                                                            style="border: 10px solid blue;border-radius: 5px;">
                                                        <div class="col-7 col-sm-7 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Bowler<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="bowler"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">O<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="over"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">M<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="meiden"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">R<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="run"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">W<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="wicket"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-1 col-sm-1 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Econ<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="econ"
                                                                    placeholder="" value="">
                                                                <small class="text-danger mb-2" role="alert">
                                                                    <strong></strong>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-12 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Comentary<span
                                                                        class="text-danger"></span></label>
                                                                <textarea type="text" cols="2" rows="3"
                                                                    class="form-control" name="comentary" placeholder=""
                                                                    value=""></textarea>
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