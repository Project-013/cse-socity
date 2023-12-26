<?php
session_start();
include '../database/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title =  $_POST['title'];
    $short_description =  $_POST['short_description'];
    $description =  $_POST['description'];
    $UserID =  $_POST['UserID'];

    $sql = "INSERT INTO `forum`(`title`, `description`, `short_description`, `UserID`) VALUES ('$title','$description','$short_description','$UserID')";

    if (isset($_GET['ForumID'])) {
        $UpdateForumID = $_GET['ForumID'];

        $sql = "UPDATE `forum` SET `title` = '$title', `description` = '$description', `short_description` = '$short_description' WHERE `forum`.`ForumID` =  $UpdateForumID;";

    }
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/website/forum.php";
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
        <h2 class=" "> Students<span class="text-info"> Forum</span></h2>
        <div class="row">
            <div class="col-md-7 g-5">

                <?php

                $sql = "SELECT * FROM `forum` NATURAL JOIN user ORDER BY  `timestand` DESC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ForumID  = $row['ForumID'];
                    $title    = $row['title'];
                    $short_description    = $row['short_description'];
                    $description    = $row['description'];
                    $status    = $row['status'];
                    $timestand    = $row['timestand'];
                    $Forum_UserID    = $row['UserID'];
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


                    if ($status == "approved") {



                ?>
                        <div class="col-md-10 my-3">
                            <div class="card">

                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["UserID"]) && $Forum_UserID == $_SESSION["UserID"]) {
                                        $UserID = $_SESSION["UserID"];
                                        $update_url = "/cse-socity/website/forum.php?ForumID=" . $ForumID;
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
                                    <p class="card-text"></b><?php echo $short_description ?>...<a class="" href="forum-post.php?id=<?php echo $ForumID ?>">See more</a></p>
                                </div>
                                <div class="card-footer bg-white">
                                <?php echo $post_time ?>
                                </div>
                            </div>
                        </div>


                <?php
                    }
                }

                ?>



            </div>
            <?php
            if (isset($_SESSION["UserID"])) {
                $UserID = $_SESSION["UserID"];


                $sql2 = "SELECT * FROM `forum` WHERE `UserID`=$UserID AND `status`='pending'";
                $result2 = mysqli_query($conn, $sql2);
                $numRows = mysqli_num_rows($result2);

                if (isset($_GET['ForumID'])) {
                    $UpdateForumID = $_GET['ForumID'];

                    $sql3 = "SELECT * FROM `forum` WHERE `ForumID`=$UpdateForumID";
                    $result3 = mysqli_query($conn, $sql3);

                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        $Updatetitle    = $row3['title'];
                        $Updateshort_description    = $row3['short_description'];
                        $Updatedescription    = $row3['description'];
                    }
                }


            ?>


                <div class="col-md-5">
                    <div class="row justify-content-center g-3 my-2">
                        <div class="col-lg-12 bg-white shadow-lg rounded p-4">
                            <?php
                            if ($numRows) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    You have <?php echo $numRows ?> pending post!
                                </div>
                            <?php
                            }

                            ?>

                            <h4 class=" mb-3 fw-semibold"><?php if (isset($UpdateForumID)) {echo "Updete";}else echo "Create" ?> post</h4>

                            <form class="text-muted" action="" method="post">
                                <div class="row g-2 justify-content-center">
                                    <div class="form-floating  col-md-12">
                                        <input type="text" class="form-control _form_data" id="title" name="title" placeholder=" " required 
                                        value="<?php if (isset($Updatetitle)) {echo $Updatetitle;} ?>">
                                        <label for="title">Title* </label>
                                    </div>
                                    <div class="form-floating  col-md-12 d-none">
                                        <input type="text" class="form-control d-none" id="UserID" name="UserID" placeholder=" " value="<?php echo $UserID ?>" required>
                                        <label for="author">Author* </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="description">Short Description*</label>
                                        <textarea class="form-control _form_data" id="short_description" name="short_description" placeholder=" " rows="2"><?php if (isset($Updateshort_description)) {echo $Updateshort_description;} ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="description">Description*</label>
                                        <textarea class="form-control _form_data" id="description" name="description" placeholder=" " rows="6"><?php if (isset($Updatedescription)) {echo $Updatedescription;} ?></textarea>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-primary px-6 my-3"><?php if (isset($UpdateForumID)) {echo "Updete";}else echo "Create" ?> </button>

                                </div>
                            </form>


                        </div>


                    </div>

                <?php
            } else {
                ?>
                    <div class=" col-md-5">
                        <div class="alert alert-info " role="alert">
                            Please <a href="login.php">login</a> to crerate post!
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