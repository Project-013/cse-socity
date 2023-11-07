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

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $image =  $_FILES['image']['name'];
        $tmp_name =  $_FILES['image']['tmp_name'];
        $size =  $_FILES['image']['size'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $UserID = $_SESSION["UserID"];
        if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
            if ($size <= 104857600) {
                $sql = "UPDATE `user` SET `img` = '$image' WHERE `UserID`='$UserID'";

                $result = mysqli_query($conn, $sql);
                echo $result;

                if ($result) {
                    $path = "img/";
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $path . "/" . $image);
                    $message = "Added!";
                    $_SESSION["img"] = $image;
          
                }
            } else {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Image should be or Less or Equal 10 MB!
                </div>
            <?php
            }

        } else {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Your file is invalid! Please upload PNG or JPG file
            </div>
        <?php
        }
    }

    ?>

    <div class="faq-area my-3 mb-5">
        <div class="container">


            <section class="container section_top">
                <div class="row justify-content-center g-3 my-2">
                    <div class="col-lg-8 bg-white shadow-lg rounded p-4">
                        <p class="mb-6 lead">Change Profile Picture</p>

                        <form class="text-muted" action="" method="post" enctype="multipart/form-data">
                            <div class="row g-2 justify-content-center">

                                <div class="col-12">
                                    <label for="image">Select new profile picture</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                </div>

                                <button id="submit" type="submit" class="btn btn-primary px-6 my-3">Change</button>

                            </div>
                        </form>
    


                    </div>
                </div>
            </section>
        </div>

    </div>

    <script>

    </script>


    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>