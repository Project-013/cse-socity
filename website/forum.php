<?php
session_start();
include '../database/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title =  $_POST['title'];
    $short_description =  $_POST['short_description'];
    $description =  $_POST['description'];
    $UserID =  $_POST['UserID'];
    $post_img = "";
    if (isset($_FILES['post_img']['name'])) {
        $post_img =  $_FILES['post_img']['name'];
        $tmp_name =  $_FILES['post_img']['tmp_name'];
        $path = "img/";
        if (!is_dir($path)) {
            mkdir($path);
        }
        move_uploaded_file($tmp_name, $path . "/" . $post_img);
    }

    $sql = "INSERT INTO `forum`(`title`, `description`, `short_description`, `UserID`,`post_img`) VALUES ('$title','$description','$short_description','$UserID','$post_img')";

    if (isset($_GET['ForumID'])) {
        $UpdateForumID = $_GET['ForumID'];

        $sql = "UPDATE `forum` SET `title` = '$title', `description` = '$description', `short_description` = '$short_description' WHERE `forum`.`ForumID` =  $UpdateForumID;";

        if (isset($_FILES['post_img']['name']) && $_FILES['post_img']['name']) {
            $sql = "UPDATE `forum` SET `title` = '$title', `description` = '$description', `short_description` = '$short_description', `post_img`='$post_img' WHERE `forum`.`ForumID` =  $UpdateForumID;";
        }
    }
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/website/forum.php";
    header("Location: $redirect_url");
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <link rel="stylesheet" href="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.css" />
    <script src="https://unpkg.com/jodit@4.0.1/es2021/jodit.min.js"></script>
    <!-- Include Dropzone.js from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" integrity="sha512-s/MP3wvxM8Cz+BVTWuNgvW5ldhbc6hZ6i/Q68wMAZL8e2I6/J7S+EgqjE1aVYzA2bKipF2c3lKQWv+xDfrneZQ==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-9cF7LRkUjznaamxAGAo4uAHEWLO3s6sTg8+q4lAaW8L5fE5wGx+Js/F7y8rXUqvlkG3Ka2lMpsjlu+kmrE5Yvg==" crossorigin="anonymous"></script>

    <style>
        .previewIcon {
            width: 38px;
            height: 40px;
            margin-right: 1px;
        }
    </style>
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

                if (isset($_GET['ForumID'])) {
                    $sql = "SELECT * FROM `forum` NATURAL JOIN user WHERE `ForumID`=" . $_GET['ForumID'];
                }


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

                        $sql_react = "SELECT * FROM `react`  WHERE `ForumID`='$ForumID'";
                        $result_react = mysqli_query($conn, $sql_react);
                        $total_react = mysqli_num_rows($result_react);

                        $sql_like = "SELECT * FROM `react`  WHERE `ForumID`='$ForumID' AND `type`='like'";
                        $result_like = mysqli_query($conn, $sql_like);
                        $total_like = mysqli_num_rows($result_like);

                        $sql_dislike = "SELECT * FROM `react`  WHERE `ForumID`='$ForumID' AND `type`='dislike'";
                        $result_dislike = mysqli_query($conn, $sql_dislike);
                        $total_dislike = mysqli_num_rows($result_dislike);

                        $sql_love = "SELECT * FROM `react`  WHERE `ForumID`='$ForumID' AND `type`='love'";
                        $result_love = mysqli_query($conn, $sql_love);
                        $total_love = mysqli_num_rows($result_love);

                        $isLiked = "";
                        $react_url = "";
                        if (isset($_SESSION["UserID"])) {
                            $UserID = $_SESSION["UserID"];
                            $like_url = "/cse-socity/website/partials/_action.php?type=like&ForumID=" . $ForumID;
                            $dislike_url = "/cse-socity/website/partials/_action.php?type=dislike&ForumID=" . $ForumID;
                            $love_url = "/cse-socity/website/partials/_action.php?type=love&ForumID=" . $ForumID;
                            $sql_isLiked = "SELECT * FROM `react` WHERE `ForumID`='$ForumID' AND `UserID`= '$UserID'";
                            $r1 = mysqli_query($conn, $sql_isLiked);
                            $isLiked = mysqli_num_rows($r1);
                            if ($isLiked) {
                                $row_react = mysqli_fetch_assoc($r1);
                                $react_type = $row_react['type'];
                            }
                        }




                ?>
                        <div class="col-md-10 my-3" id="<?php echo 'forum' . $ForumID ?>">
                            <div class="card ">
                                <div class="card-body row">
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <div>
                                            <?php
                                            if ($row['post_img'] != "") {
                                                $dlt_img_url = "";
                                                if (isset($_GET['ForumID'])) {
                                                    $dlt_img_url = "/cse-socity/website/partials/_delete.php?remove_img=true&forum=" . $ForumID;
                                            ?>
                                                    <div class="d-flex justify-content-end"> <a href="<?php echo $dlt_img_url ?>" class="btn btn-sm btn-outline-danger">Remove Image</a></div>
                                                <?php
                                                }
                                                ?>
                                                <img src="/cse-socity/website/img/<?php echo $row['post_img']  ?>" alt="nothing found" class="card-img-top">
                                            <?php
                                            } else {
                                            ?>
                                               <i class="fa fa-5x fa-question"></i>
                                            <?php
                                            } ?>
                                        </div>

                                    </div>


                                    <div class="col-md-8">
                                        <?php
                                        if (isset($_SESSION["UserID"]) && $Forum_UserID == $_SESSION["UserID"]) {
                                            $UserID = $_SESSION["UserID"];
                                            $update_url = "/cse-socity/website/forum.php?ForumID=" . $ForumID;
                                            $dlt_url = "/cse-socity/website/partials/_delete.php?ForumID=" . $ForumID;

                                        ?>
                                            <span class="d-flex justify-content-end">
                                                <a href="<?php echo $update_url ?>" class="btn btn-sm btn-primary me-1"> <i class="fa fa-edit " aria-hidden="true"></i></a>
                                                <a href="<?php echo $dlt_url ?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash " aria-hidden="true"></i></a>

                                            </span>

                                        <?php
                                        }


                                        ?>
                                        <h4 class="card-title text-success"><a class=" text-success" href="forum-post.php?id=<?php echo $ForumID ?>"><?php echo $title ?></a></h4>
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
                                            <?php echo $row['name'] ?>
                                        </h6>
                                        <hr>
                                        <p class="card-text"></b><?php echo $short_description ?>...<a class="" href="forum-post.php?id=<?php echo $ForumID ?>">See more</a></p>
                                    </div>
                                </div>

                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <div>
                                                <div class="d-flex">

                                                    <a class="me-2 position-relative" href="<?php echo $like_url ?>">
                                                        <i class="fa fa-thumbs-up   fa-2x text-<?php if ($isLiked && $react_type == 'like') echo "primary";
                                                                                                else echo "dark" ?> d-block" aria-hidden="true"></i>
                                                        <?php if ($total_like) { ?>
                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                <?php echo $total_like ?>
                                                                <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        <?php } ?>
                                                    </a>
                                                    <a class="me-2 position-relative" href="<?php echo $dislike_url ?>">
                                                        <i class="fa fa-thumbs-down   fa-2x text-<?php if ($isLiked && $react_type == 'dislike') echo "primary";
                                                                                                    else echo "dark" ?> d-block" aria-hidden="true"></i>
                                                        <?php if ($total_dislike) { ?>
                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                <?php echo $total_dislike ?>
                                                                <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        <?php } ?>
                                                    </a>
                                                    <a class="me-2 position-relative" href="<?php echo $love_url ?>">
                                                        <i class="fa fa-heart   fa-2x text-<?php if ($isLiked && $react_type == 'love') echo "danger";
                                                                                            else echo "dark" ?> d-block" aria-hidden="true"></i>
                                                        <?php if ($total_love) { ?>
                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                <?php echo $total_love ?>
                                                                <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        <?php } ?>
                                                    </a>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div><?php echo $post_time ?></div>
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
                        $Update_post_img = $row3['post_img'];
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

                            <h4 class=" mb-3 fw-semibold"><?php if (isset($UpdateForumID)) {
                                                                echo "Updete";
                                                            } else echo "Create" ?> post</h4>

                            <form class="text-muted" action="" method="post" enctype="multipart/form-data">
                                <div class="row g-2 justify-content-center">
                                    <div class="form-floating  col-md-12">
                                        <input type="text" class="form-control _form_data" id="title" name="title" placeholder=" " required value="<?php if (isset($Updatetitle)) {
                                                                                                                                                        echo $Updatetitle;
                                                                                                                                                    } ?>">
                                        <label for="title">Title* </label>
                                    </div>
                                    <div class="form-floating  col-md-12 d-none">
                                        <input type="text" class="form-control d-none" id="UserID" name="UserID" placeholder=" " value="<?php echo $UserID ?>" required>
                                        <label for="author">Author* </label>
                                    </div>

                                    <div class="col-12">
                                        <label for="description">Short Description*</label>
                                        <textarea class="form-control _form_data" id="short_description" name="short_description" placeholder=" " rows="2"><?php if (isset($Updateshort_description)) {
                                                                                                                                                                echo $Updateshort_description;
                                                                                                                                                            } ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="description">Description*</label>
                                        <textarea class="form-control _form_data" id="editor" name="description" placeholder=" " rows="6"><?php if (isset($Updatedescription)) {
                                                                                                                                                echo $Updatedescription;
                                                                                                                                            } ?></textarea>
                                        <div class="col-12 my-3">
                                            <label for="post_img">Upload Image</label>
                                            <input type="file" class="form-control-file" id="post_img" name="post_img" accept=".png, .jpg, .jpeg" value="<?php if (isset($UpdatetUpdate_post_imgitle)) {
                                                                                                                                                                echo $Update_post_img;
                                                                                                                                                            } ?>">
                                        </div>

                                    </div>
                                    <button id="submit" type="submit" class="btn btn-primary px-6 my-3"><?php if (isset($UpdateForumID)) {
                                                                                                            echo "Updete";
                                                                                                        } else echo "Create" ?> </button>

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

    <script>
        const editor = Jodit.make('#editor');
    </script>


</body>


</html>