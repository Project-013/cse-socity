<?php
session_start();
include '../database/database.php';
$ForumID = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment =  $_POST['comment'];
    $UserID =  $_POST['UserID'];
    $ForumID =  $_POST['ForumID'];

    $sql = "INSERT INTO `comments`(`comment`, `UserID`, `ForumID`) VALUES ('$comment','$UserID','$ForumID')";

    if (isset($_GET['CommentID'])) {
        $UpdateCommentID= $_GET['CommentID'];

        $sql = "UPDATE `comments` SET `comment` = '$comment' WHERE `CommentID` =  $UpdateCommentID;";

    }
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/website/forum-post.php?id=" . $ForumID;
    header("Location: $redirect_url");
}
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
        <h2 class=" mb-3"> Students<span class="text-info"> Forum</span></h2>
        <div class="row g-5">

            <?php

            $sql = "SELECT * FROM `forum` NATURAL JOIN user WHERE `ForumID`='$ForumID'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $ForumID  = $row['ForumID'];
                $title    = $row['title'];
                $short_description    = $row['short_description'];
                $description    = $row['description'];
                $Forum_UserID    = $row['UserID'];
                $status    = $row['status'];
                $timestand    = $row['timestand'];
                $start = new DateTime();
                $end = new DateTime($timestand, timezone_open('asia/dhaka'));

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

                if ($ForumID) {



            ?>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION["UserID"]) && $Forum_UserID == $_SESSION["UserID"]) {
                                    $UserID = $_SESSION["UserID"];
                                    $update_url = "/cse-socity/website/forum.php?id=" . $ForumID;
                                    $dlt_url = "/cse-socity/website/partials/_delete.php?ForumID=" . $ForumID;

                                ?>
                                         <span class="d-flex justify-content-end">
                                            <a href="<?php echo $update_url ?>" class="btn btn-sm btn-primary me-1"> <i class="fa fa-edit " aria-hidden="true"></i></a>
                                            <a href="<?php echo $dlt_url ?>" class="btn btn-sm btn-danger ">  <i class="fa fa-trash " aria-hidden="true"></i></a>

                                        </span>

                                <?php
                                }

                                ?>
                                <h4 class="card-title text-success"><?php echo $title ?></h4>
                                <h6 class=" text-muted">
                                <?php 
                                    if ($row['img']) {
                                        ?>
                                            <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="20" height="20" class="d- mx-auto rounded-circle">
                                        <?php
                                        } else {
                                        ?>
                                            <i class="fa fa-user-circle  text-primary " aria-hidden="true"></i>

                                        <?php
                                        }
                                        ?>  
                                
                                <?php echo $row['name'] ?></h6>
                                <hr>

                                <p class="card-text"></b><?php echo $description ?></p>
                            </div>
                            <div class="card-footer bg-white">
                                <?php echo $post_time ?>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-5">
                    <?php
                    if (isset($_SESSION["UserID"])) {
                        $UserID = $_SESSION["UserID"];


          

                        if (isset($_GET['CommentID'])) {
                            $UpdateCommentID = $_GET['CommentID'];

                            $sql3 = "SELECT * FROM `comments` WHERE `CommentID`=$UpdateCommentID";
                            $result3 = mysqli_query($conn, $sql3);

                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                $Update_comment   = $row3['comment'];
                            }
                        }


                    ?>


                        <div class="">
                            <div class="row justify-content-center g-3 my-2">
                                <div class="col-lg-12 bg-white shadow-lg rounded p-4">

                                    <h4 class=" mb-3 fw-semibold"><?php if (isset($UpdateCommentID)) {
                                                                        echo "Updete";
                                                                    } else echo "Create" ?> comment</h4>

                                    <form class="text-muted" action="" method="post">
                                        <div class="row g-2 justify-content-center">
                                            <div class="form-floating  col-md-12 d-none ">
                                                <input type="text" class="form-control" id="UserID" name="UserID" placeholder=" " value="<?php echo $UserID ?>" required>
                                                <label for="author">Author* </label>
                                            </div>
                                            <div class="form-floating  col-md-12 d-none ">
                                                <input type="text" class="form-control" id="ForumID" name="ForumID" placeholder=" " value="<?php echo $ForumID ?>" required>
                                                <label for="author">ForumID* </label>
                                            </div>

                                            <div class="col-12">
                                                <textarea class="form-control _form_data" id="comment" name="comment" placeholder=" " rows="2"><?php if (isset($Update_comment)) {
                                                                                                                                                    echo $Update_comment;
                                                                                                                                                } ?></textarea>
                                            </div>

                                            <button id="submit" type="submit" class="btn btn-primary px-6 my-3"><?php if (isset($UpdateCommentID)) {
                                                                                                                    echo "Updete";
                                                                                                                } else echo "Create" ?> </button>

                                        </div>
                                    </form>


                                </div>


                            </div>



                        <?php
                    } else {
                        ?>
                            <div class=" ">
                                <div class="alert alert-info " role="alert">
                                    Please <a href="login.php">login</a> to comment!
                                </div>
                            </div>
                        <?php


                    }

                        ?>
                        <?php include('partials/_comment.php') ?>
                    </div>
                   

                <?php
                }
            }

                ?>



                        </div>

    </section>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>