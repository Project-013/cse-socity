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
    <section class="container py-5">
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
                            <a href="notice-post.php?id=<?php echo $NoticeID ?>" class="card-title " ><?php echo $title ?> <span class="fw-normal">--<?php echo $post_time ?></span>
                                
                            </a>


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