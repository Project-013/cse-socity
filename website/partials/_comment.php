<?php
$sql_comment = "SELECT * FROM `comments` NATURAL JOIN user WHERE `ForumID`='$ForumID' ORDER BY  `timestand` DESC";
$result_comment = mysqli_query($conn, $sql_comment);
while ($row_comment = mysqli_fetch_assoc($result_comment)) {
    $CommentID    = $row_comment['CommentID'];
    $comment    = $row_comment['comment'];
    $commentUserID    = $row_comment['UserID'];
    $name    = $row_comment['name'];
    $timestand    = $row_comment['timestand'];
    $start = new DateTime();
    $end = new DateTime($timestand, timezone_open('asia/dhaka'));

    $interval_comment = $start->diff($end);

    $year = $interval_comment->format('%y');
    $months = $interval_comment->format('%m');
    $days = $interval_comment->format('%a');
    $hours = $interval_comment->format('%h');
    $min = $interval_comment->format('%i');
    $post_time_comment = "Just now";

    if ($year > 0) {
        $post_time_comment = $year . ' yers ago';
    } else if ($months > 0) {
        $post_time_comment = $months . ' months ago';
    } else if ($days > 0) {
        $post_time_comment = $days . ' days ago';
    } else if ($hours > 0) {
        $post_time_comment = $hours . ' hours ago';
    } else if ($min > 0) {
        $post_time_comment = $min . ' mins ago';
    }

    $sql_react = "SELECT * FROM `react`  WHERE `CommentID`='$CommentID'";
    $result_react = mysqli_query($conn, $sql_react);
    $total_react = mysqli_num_rows($result_react);


    $sql_like = "SELECT * FROM `react`  WHERE `CommentID`='$CommentID' AND `type`='like'";
    $result_like = mysqli_query($conn, $sql_like);
    $total_like = mysqli_num_rows($result_like);

    $sql_dislike = "SELECT * FROM `react`  WHERE `CommentID`='$CommentID' AND `type`='dislike'";
    $result_dislike = mysqli_query($conn, $sql_dislike);
    $total_dislike = mysqli_num_rows($result_dislike);

    $sql_love = "SELECT * FROM `react`  WHERE `CommentID`='$CommentID' AND `type`='love'";
    $result_love = mysqli_query($conn, $sql_love);
    $total_love = mysqli_num_rows($result_love);

    $react_url = "";
    $isLiked = "";

    if (isset($_SESSION["UserID"])) {
        $UserID = $_SESSION["UserID"];
        $react_url = "/cse-socity/website/partials/_action.php?forum=$ForumID&CommentID=" . $CommentID;
        $like_url = "/cse-socity/website/partials/_action.php?type=like&forum=$ForumID&CommentID=" . $CommentID;
        $dislike_url = "/cse-socity/website/partials/_action.php?type=dislike&forum=$ForumID&CommentID=" . $CommentID;
        $love_url = "/cse-socity/website/partials/_action.php?type=love&forum=$ForumID&CommentID=" . $CommentID;
        $sql_isLiked = "SELECT * FROM `react` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
        $r1 = mysqli_query($conn, $sql_isLiked);
        $isLiked = mysqli_num_rows($r1);
        if ($isLiked) {
            $row_react = mysqli_fetch_assoc($r1);
            $react_type = $row_react['type'];
        }
    }



?>
    <div class="card bg-white shadow-lg rounded my-2">
        <div class="card-body">
            <?php
            if (isset($_SESSION["UserID"]) && $commentUserID == $_SESSION["UserID"]) {
                $UserID = $_SESSION["UserID"];
                $update_url_c = "/cse-socity/website/forum-post.php?id=" . $ForumID . "&CommentID=" . $CommentID;
                $dlt_url_c = "/cse-socity/website/partials/_delete.php?CommentID=" . $CommentID . "&forum=" . $ForumID;

            ?>
                <span class="d-flex justify-content-end">
                    <a href="<?php echo $update_url_c ?>" class="btn btn-sm btn-primary me-1"> <i class="fa fa-edit " aria-hidden="true"></i></a>
                    <a href="<?php echo $dlt_url_c ?>" class="btn btn-sm btn-danger "> <i class="fa fa-trash " aria-hidden="true"></i></a>

                </span>

            <?php
            }

            ?>
            <h6 class=" text-muted">
                <?php
                if ($row_comment['img']) {
                ?>
                    <img src="/cse-socity/website/img/<?php echo $row_comment['img']  ?>" alt="nothing found" width="20" height="20" class="d- mx-auto rounded-circle">
                <?php
                } else {
                ?>
                    <i class="fa fa-user-circle  text-primary " aria-hidden="true"></i>

                <?php
                }
                ?>
                <?php echo $row_comment['name'] ?>
            </h6>
            <hr>

            <p class="card-text small"></b><?php echo $comment ?></p>
        </div>

        <div class="card-footer bg-white d-flex justify-content-between">
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
            <div><?php echo $post_time_comment ?></div>
        </div>
    </div>



<?php


}


?>