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


                            ?>
                                <div class="card bg-white shadow-lg rounded my-2">
                                    <div class="card-body">
                                    <?php
                                if (isset($_SESSION["UserID"]) && $commentUserID == $_SESSION["UserID"]) {
                                    $UserID = $_SESSION["UserID"];
                                    $update_url_c = "/cse-socity/website/forum-post.php?id=".$ForumID."&CommentID=" . $CommentID;
                                    $dlt_url_c = "/cse-socity/website/partials/_delete.php?CommentID=" . $CommentID."&forum=".$ForumID;

                                ?>
                                           <span class="d-flex justify-content-end">
                                            <a href="<?php echo $update_url_c ?>" class="btn btn-sm btn-primary me-1"> <i class="fa fa-edit " aria-hidden="true"></i></a>
                                            <a href="<?php echo $dlt_url_c ?>" class="btn btn-sm btn-danger ">  <i class="fa fa-trash " aria-hidden="true"></i></a>

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
                                        <?php echo $row_comment['name'] ?></h6>
                                        <hr>

                                        <p class="card-text small"></b><?php echo $comment ?></p>
                                    </div>
                                    <div class="card-footer">
                                    <?php echo $post_time_comment ?>
                                    </div>
                                </div>



                            <?php


                            }


                            ?>