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
            "UPDATE `live_crickets` SET `big_title`='$big_title',
            `venue`='$venue',`location`='$location',`day`='$day',`date`='$date',
            `time`='$time',`teamone_id`='$teamone_id',`teamtwo_id`='$teamtwo_id',
            `total_run_one`='$total_run_one',`total_run_two`='$total_run_two',`total_wicket_one`='$total_wicket_one',
            `total_wicket_two`='$total_wicket_two',`total_over_one`='$total_over_one',
            `total_over_two`='$total_over_two',`batsman_one`='$batsman_one',`r1`='$r1',
            `b1`='$b1',`fours1`='$fours1',`six1`='$six1',`sr1`='$sr1',
            `batsman_two`='$batsman_two',`r2`='$r2',`b2`='$b2',`fours2`='$fours2',
            `six2`='$six2',`sr2`='$sr2',`bowler`='$bowler',`over`='$over',
            `meiden`='$meiden',`run`='$run',`wicket`='$wicket',`econ`='$econ',`comentary`='$comentary'
             where id='" .
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
    mysqli_query($conn, 'select * from live_crickets where id="' . $_GET['id'] . '" ')
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
                            <h5 class="card-title">Edit Live Cricket Match</h5>
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
                                                                    placeholder="Title"
                                                                    value="<?php echo $row['big_title']  ?>">

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
                                                                    value="<?php echo $row['venue']  ?>">

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
                                                                    value="<?php echo $row['location']  ?>">
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
                                                                    <option value="<?php echo $row['day']  ?>">
                                                                        <?php echo $row['day']  ?></option>
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
                                                                    value="<?php echo $row['date']  ?>">
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
                                                                    value="<?php echo $row['time']  ?>">
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
                                                        <div class="col-2 col-sm-2 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Run1<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_run_one" placeholder=""
                                                                    value="<?php echo $row['total_run_one'] ?>">

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
                                                                    $q = mysqli_query( $conn,'select * from teams');
                                                                    if (
                                                                        mysqli_num_rows( $q) > 0 ) {
                                                                        while (
                                                                            $team = mysqli_fetch_assoc(
                                                                                $q
                                                                            )
                                                                        ) { ?>

                                                                    <option value="<?php echo $team['id']; ?>"
                                                                        <?php if ($row['teamtwo_id'] == $team['id']) {echo 'selected';} ?>>
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
                                                        <div class="col-2 col-sm-2 mt-4">
                                                            <div class="form-group">
                                                                <label for="fullName">Total Run2<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" class="form-control"
                                                                    name="total_run_two" placeholder=""
                                                                    value="<?php echo $row['total_run_two'] ?>">

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
                                                                    name="total_wicket_one" placeholder=""
                                                                    value="<?php echo $row['total_wicket_one'] ?>">

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
                                                                    name="total_over_one" placeholder=""
                                                                    value="<?php echo $row['total_over_one'] ?>">

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
                                                                    name="total_over_two" placeholder=""
                                                                    value="<?php echo $row['total_over_two'] ?>">

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
                                                                    name="total_wicket_two" placeholder=""
                                                                    value="<?php echo $row['total_wicket_two'] ?>">

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
                                                                    name="batsman_one" placeholder=""
                                                                    value="<?php echo $row['batsman_one'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['r1'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['b1'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['fours1'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['six1'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['sr1'] ?>">
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
                                                                    name="batsman_two" placeholder=""
                                                                    value="<?php echo $row['batsman_two'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['r2'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['b2'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['fours2'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['six2'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['sr2'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['bowler'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['over'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['meiden'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['run'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['wicket'] ?>">
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
                                                                    placeholder="" value="<?php echo $row['econ'] ?>">
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
                                                                    value=""><?php echo $row['comentary'] ?></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right mt-4">
                                            <button class="btn btn-primary" name="submit" type="submit">Update</button>
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