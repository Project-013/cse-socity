<?php
session_start();
include '../database/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title =  $_POST['title'];
    $description =  $_POST['description'];
    $author =  $_POST['author'];
    $live_url =  $_POST['live_url'];
    $git_url =  $_POST['git_url'];
    $technology =  $_POST['technology'];

    $sql = "INSERT INTO `projects`(`title`, `description`, `author`, `live_url`, `git_url`, `technology`) VALUES ('$title','$description','$author','$live_url', '$git_url', '$technology')";
    $result = mysqli_query($conn, $sql);
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
        <h2 class=" mb-3"> <span class="text-info">Our Projects</span></h2>
        <div class="row g-5">

            <?php

            $sql = "SELECT * FROM `projects`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $ProjectID  = $row['ProjectID'];
                $title    = $row['title'];
                $description    = $row['description'];
                $author    = $row['author'];
                $status    = $row['status'];
                $technology    = $row['technology'];

                $live_url    = $row['live_url'];
                $git_url    = $row['git_url'];

                if ($status == "approved") {



            ?>
                    <div class="col-md-6 ">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title text-success"><?php echo $title ?></h4>
                                <h6 class=" text-muted"><?php echo $author ?></h6>
                                <p class="card-text"><b>Description: </b><?php echo $description ?></p>
                                <p class="card-text"><b>Technology: </b> <?php echo $technology ?></p>
                                <?php
                                if ($live_url) {
                                ?>
                                    <p class="card-text"><b>Live : </b><a href="<?php echo $live_url ?>" target="_blank">Click here</a></p>
                                <?php
                                }

                                ?>
                                <?php
                                if ($git_url) {
                                ?>
                                    <p class="card-text"><b>Github : </b><a href="<?php echo $git_url ?>" target="_blank">Click here</a></p>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>


            <?php
                }
            }

            ?>



        </div>

        <div class="mb-3 mt-5 ">
            <hr>

            <div class="row justify-content-center g-3 my-2">
                <div class="col-lg-8 bg-white shadow-lg rounded p-4">
                    <h4 class=" mb-5 fw-semibold">You can submit your projects</h4>

                    <form class="text-muted" action="" method="post">
                        <div class="row g-2 justify-content-center">
                            <div class="form-floating  col-md-12">
                                <input type="text" class="form-control _form_data" id="title" name="title" placeholder=" " required>
                                <label for="title">Title* </label>
                            </div>
                            <div class="form-floating  col-md-12">
                                <input type="text" class="form-control _form_data" id="author" name="author" placeholder=" " required>
                                <label for="author">Author* </label>
                            </div>

                            <div class="form-floating  col-md-12">
                                <input type="text" class="form-control _form_data" id="live_url" name="live_url" placeholder=" ">
                                <label for="url">Live URL </label>
                            </div>

                            <div class="form-floating  col-md-12">
                                <input type="text" class="form-control _form_data" id="git_url" name="git_url" placeholder=" ">
                                <label for="url">Github URL </label>
                            </div>

                            <div class="form-floating  col-md-12">
                                <input type="text" class="form-control _form_data" id="technology" name="technology" placeholder=" " required>
                                <label for="url">Technology*</label>
                            </div>


                            <div class="col-12">
                                <label for="description">Description*</label>
                                <textarea class="form-control _form_data" id="description" name="description" placeholder=" " rows="2"></textarea>
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary px-6 my-3">Submit </button>

                        </div>
                    </form>


                </div>
            </div>


        </div>

    </section>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>