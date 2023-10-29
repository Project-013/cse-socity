<?php
session_start();
include '../database/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title =  $_POST['title'];
    $author =  $_POST['author'];
    $url =  $_POST['url'];
    $description =  $_POST['description'];

    $sql = "INSERT INTO `research`(`title`, `url`, `description`, `author`) VALUES ('$title','$url','$description','$author')";
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
        <h2 class=" mb-3">Introduction our <span class="text-info">Our Research & Publications</span></h2>
        <div class="row g-5">

            <?php

            $sql = "SELECT * FROM `research`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title    = $row['title'];
                $description    = $row['description'];
                $url    = $row['url'];
                $author    = $row['author'];
                $status    = $row['status'];

                if($status=="approved"){



            ?>
                <div class="col-md-12 ">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-success"><?php echo $title ?></h5>
                            <h6 class=" text-muted"><?php echo $author ?></h6>
                            <p class="card-text"><?php echo $description ?></p>

                        </div>
                        <div class="card-footer bg-white">
                            <a class="btn btn-dark btn-sm w-100" href="<?php echo $url ?>" target="_blank">See publication</a>
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
                    <h4 class=" mb-5 fw-semibold">You can submit your publications</h4>

                    <form class="text-muted" action="" method="post">
                        <div class="row g-2 justify-content-center">
                            <div class="form-floating  col-md-12">
                                <input type="text" minlength="4" class="form-control _form_data" id="title" name="title" placeholder=" " required>
                                <label for="title">Title </label>
                            </div>
                            <div class="form-floating  col-md-12">
                                <input type="text" minlength="4" class="form-control _form_data" id="author" name="author" placeholder=" " required>
                                <label for="author">Author </label>
                            </div>

                            <div class="form-floating  col-md-12">
                                <input type="text" minlength="4" class="form-control _form_data" id="url" name="url" placeholder=" " required>
                                <label for="url">URL </label>
                            </div>



                            <div class="col-12">
                                <label for="description">Description</label>
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