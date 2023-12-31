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

    <div class="faq-area my-3 mb-5">
        <?php
        if (isset($_SESSION["UserID"])) {
            $UserID = $_SESSION["UserID"];
        }
        if (isset($_GET["p"])) {
            $UserID = $_GET['p'];
        }
        $sql = "SELECT * FROM `user` WHERE `UserID`='$UserID'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        ?>

        <div class="container section_top">
            <div class="row">
                <div class="col-lg-7 mx-auto bg-white shadow-lg rounded p-4 py-5">
                    <div class="text-center ">

                        <?php
                        if ($row['img'] != "") {
                        ?>
                            <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="150" class="d-block mx-auto rounded-circle">
                        <?php
                        } else {
                        ?>
                            <div>
                                <i class="fa fa-user-circle fa-5x border border-success  rounded-circle" aria-hidden="true"></i>
                            </div>

                        <?php
                        }
                        ?>
                        <?php
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && !isset($_GET["p"])) {

                        ?>
                            <a href="change-profile.php" class="small">change</a>

                        <?php
                        }

                        ?>
                        <h4 class="my-2 heading_color"><?php echo $row['name']  ?></h4>

                    </div>
                    <div class="row justify-content-center g-3 my-3">
                        <div class="pb-5">
                            <form class="text-muted">
                                <div class="row g-2 justify-content-center">

                                    <div class="form-floating  col-md-6">
                                        <a class="form-control border-0 bg-white " href="mailto:<?php echo $row['email']  ?>">
                                        <i class="fa fa-envelope  "></i>
                                        <?php echo $row['email']  ?></a>
                                        <label for="email">Email address</label>

                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <a class="form-control border-0 bg-white " href="tel:<?php echo $row['mobile']  ?>">
                                        <i class="fa fa-phone    "></i>
                                        
                                        <?php echo $row['mobile']  ?></a>
                                        <label for="mobile">Phone Number</label>

                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <input type="txet" minlength="7" class="form-control border-0 bg-white" id="blood_group" name="blood_group" placeholder=" " value="<?php echo $row['blood_group']  ?>" disabled>
                                        <label for="blood_group">Blood Group</label>
                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <input type="txet" minlength="7" class="form-control border-0 bg-white" id="last_blood_donate" name="last_blood_donate" placeholder=" " value="
<?php if ($row['last_blood_donate'] != '0000-00-00') {
    echo $row['last_blood_donate'];
} else {
    echo 'N/A';
}  ?>" disabled>
                                        <label for="last_blood_donate">Last donate</label>
                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <input type="txet" minlength="7" class="form-control border-0 bg-white" id="gender" name="gender" placeholder=" " value="<?php echo $row['gender']  ?>" disabled>
                                        <label for="gender">Gender</label>
                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <input type="txet" minlength="7" class="form-control border-0 bg-white" id="address" name="address" placeholder=" " value="<?php echo $row['address']  ?>" disabled>
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <input type="txet" minlength="7" class="form-control border-0 bg-white" id="interests" name="interests" placeholder=" " value="<?php echo $row['interests']  ?>" disabled>
                                        <label for="address">Interests</label>
                                    </div>
                                    <div class="form-floating  col-md-6">
                                        <input type="txet" minlength="7" class="form-control border-0 bg-white" id="skills" name="skills" placeholder=" " value="<?php echo $row['skills']  ?>" disabled>
                                        <label for="skills">skills</label>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>