<?php
session_start();
include '../database/database.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'header-link.php'; ?>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>

    <div class="faq-area my-3 mb-5">
        <div class="faq-area mb-5 mt-3 pb-5">
            <div class="container">

                <div class="text-center">
                    <h3 class=''>Blood Donors</h3>
                    <h6>If you need blood donors, search now.</h6>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="a_pos-tab" data-bs-toggle="tab" data-bs-target="#a_pos-tab-pane" type="button" role="tab" aria-controls="a_pos-tab-pane" aria-selected="false">A+</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="a_neg-tab" data-bs-toggle="tab" data-bs-target="#a_neg-tab-pane" type="button" role="tab" aria-controls="a_neg-tab-pane" aria-selected="false">A-</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="b_pos-tab" data-bs-toggle="tab" data-bs-target="#b_pos-tab-pane" type="button" role="tab" aria-controls="b_pos-tab-pane" aria-selected="false">B+</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="b_neg-tab" data-bs-toggle="tab" data-bs-target="#b_neg-tab-pane" type="button" role="tab" aria-controls="b_neg-tab-pane" aria-selected="false">B-</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ab_pos-tab" data-bs-toggle="tab" data-bs-target="#ab_pos-tab-pane" type="button" role="tab" aria-controls="ab_pos-tab-pane" aria-selected="false">AB+</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ab_neg-tab" data-bs-toggle="tab" data-bs-target="#ab_neg-tab-pane" type="button" role="tab" aria-controls="ab_neg-tab-pane" aria-selected="false">AB-</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="o_pos-tab" data-bs-toggle="tab" data-bs-target="#o_pos-tab-pane" type="button" role="tab" aria-controls="o_pos-tab-pane" aria-selected="false">O+</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="o_neg-tab" data-bs-toggle="tab" data-bs-target="#o_neg-tab-pane" type="button" role="tab" aria-controls="o_neg-tab-pane" aria-selected="false">O-</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php

                                $sql = "SELECT * FROM `user`";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">

                                                <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="a_pos-tab-pane" role="tabpanel" aria-labelledby="a_pos-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='A+'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="a_neg-tab-pane" role="tabpanel" aria-labelledby="a_neg-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='A-'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="b_pos-tab-pane" role="tabpanel" aria-labelledby="b_pos-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='B+'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="b_neg-tab-pane" role="tabpanel" aria-labelledby="b_neg-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='B-'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="ab_pos-tab-pane" role="tabpanel" aria-labelledby="ab_pos-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='AB+'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="ab_neg-tab-pane" role="tabpanel" aria-labelledby="ab_neg-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='AB-'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="o_pos-tab-pane" role="tabpanel" aria-labelledby="o_pos-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='O+'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="o_neg-tab-pane" role="tabpanel" aria-labelledby="o_neg-tab" tabindex="0">
                            <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                                <?php


                                $sql = "SELECT * FROM `user` WHERE `blood_group`='O-'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name  = $row['name'];
                                    $email = $row['email'];
                                    $mobile = $row['mobile'];
                                    $address = $row['address'];
                                    $User_ID = $row['UserID'];
                                    $blood_group = $row['blood_group'];
                                    $last_blood_donate = $row['last_blood_donate'];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                                        <div class='card shadow rounded'>

                                            <div class="card-body text-center">
                                                       <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                                <h6 class="card-title my-1"><?php echo $name ?></h6>
                                                <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                                <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                                <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                            </div>
                                            <div class="card-footer">
                                                <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                                }

                                ?>


                            </div>
                        </div>
                    </div>


                </div>
                <!-- <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                    <?php

                    if (isset($_GET['key'])) {
                        $key = $_GET['key'];
                        $sql = "SELECT * FROM `user` WHERE `blood_group` LIKE '%$key%'";
                    } else {
                        $sql = "SELECT * FROM `user`";
                    }
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name  = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $address = $row['address'];
                        $User_ID = $row['UserID'];
                        $blood_group = $row['blood_group'];
                        $last_blood_donate = $row['last_blood_donate'];
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                            <div class='card shadow rounded'>

                                <div class="card-body text-center">
                                           <?php
                                                if ($row['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="80" class="d-block mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-4x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>>

                                    <h6 class="card-title my-1"><?php echo $name ?></h6>
                                    <small class="card-text d-block text-muted"><b>Mobile:</b> <?php echo $mobile ?></small>
                                    <small class="card-text d-block text-muted"><b>Blood Group: </b> <?php echo $blood_group ?></small>
                                    <small class="card-text d-block text-muted"><b>Last Donate:</b> <?php echo $last_blood_donate ?></small>
                                </div>
                                <div class="card-footer">
                                    <a href="profile.php?p=<?php echo $User_ID ?>" class="btn btn-sm btn-dark w-100">View Profile</a>
                                </div>
                            </div>
                        </div>
                    <?php


                    }

                    ?>


                </div> -->

            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>