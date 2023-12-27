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
    <section class="container ptb-100">
        <h2 class=" mb-3"> <span class="text-info">Notice Board</span></h2>
        <div class="row ">

            <?php

            $sql = "SELECT * FROM `notice` ORDER BY NoticeID DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $NoticeID    = $row['NoticeID'];
                $title    = $row['title'];
                $notice    = $row['notice'];
                $timestamp    = $row['timestamp'];
                $start = new DateTime();
                $end = new DateTime($timestamp, timezone_open('asia/dhaka'));
                $interval = $start->diff($end);

                $year = $interval->format('%y');
                $months = $interval->format('%m');
                $days = $interval->format('%a');
                $hours = $interval->format('%h');
                $min = $interval->format('%i');
                $post_time = "Just now";
        
                if ($year > 0) {
                    $post_time = $year . ' yers ago';
                } else if ($months > 0) {
                    $post_time = $months . ' months ago';
                } else if ($days > 0) {
                    $post_time = $days . ' days ago';
                } else if ($hours > 0) {
                    $post_time = $hours . ' hours ago';
                } else if ($min > 0) {
                    $post_time = $min . ' mins ago';
                }



            ?>
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="card-title " data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $NoticeID ?>"><?php echo $title ?> <a href="#">click Here</a> <span class="fw-normal">--<?php echo $post_time ?></span>
                                
                            </h6>


                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop<?php echo $NoticeID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $title ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><?php echo $notice ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }

            ?>



        </div>



    </section>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>