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
                    <h3 class=''>FIND MEMBERS</h3>
                    <h6>Search members based on name, interests or skills.</h6>

                    <form action="" method="get">
                        <div class="col-md-6 mx-auto">
                        <input type="search" placeholder="Search members based on name, interests or skills." class="form-control form-control-sm" name="key" id="search_key" <?php if (isset($_GET['key'])) {
                                                                            echo "value='".$_GET['key']."'";
                                                                        }
                                                                        ?>>
                        </div>

                    </form>

                </div>
                <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
                    <?php

                    if (isset($_GET['key'])) {
                        $key = $_GET['key'];
                        $sql = "SELECT * FROM `user` WHERE `skills` LIKE '%$key%' OR `interests` LIKE '%$key%' OR `name` LIKE '%$key%'";
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
                        $skills = $row['skills'];
                        $interests = $row['interests'];
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 _cursor_pointer">
                            <div class='card shadow rounded'>

                                <div class="card-body text-center">
                                    <i class="fa fa-user-circle fa-4x text-primary mb-2"></i>

                                    <h6 class="card-title my-1"><?php echo $name ?></h6>
                                    <small class="card-text d-block text-muted"><?php echo $email ?></small>
                                    <small class="card-text d-block text-muted"><?php echo $mobile ?></small>
                                    <small class="card-text d-block text-muted"><b>Skills:</b> <?php echo $skills ?></small>
                                    <small class="card-text d-block text-muted"><b>Interests:</b> <?php echo $interests ?></small>
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

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>