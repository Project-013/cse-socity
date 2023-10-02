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
    <section class="container ptb-100">
        <h2 class=" mb-3">Introduction our <span class="text-info">Campaign</span></h2>
        <div class="row g-5">

            <?php

            $sql = "SELECT * FROM `campaigns`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $CampaignID     = $row['CampaignID'];
                $title    = $row['title'];
                $description    = $row['description'];
                $img    = $row['img'];
                $goals    = $row['goals'];
                $raised    = $row['raised'];
                if ($raised < $goals) {
                    $percent  = ($raised / $goals) * 100;
                    $to_go = $goals - $raised;
                } else {
                    $percent = 100;
                    $to_go = 0;
                }

                $action_url= "donate.php?id=".$CampaignID;


            ?>
                <div class="col-md-4 ">
                    <div class="card">
                        <img class='card-img-top ' height="350px" src="../admin/pages/img/<?php echo $img ?>" alt="">

                        <div class="card-body">
                            <h5 class="card-title text-success"><?php echo $title ?></h5>
                            <p class="card-text"><?php echo $description ?></p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $percent ?>%;" aria-valuenow="<?php echo number_format($percent, 2); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($percent, 2) ?>%</div>
                            </div><br>
                            <div class="row">
                                <div class="col-4">
                                    <h6>Goals</h6>
                                    <p>$<?php echo $goals ?></p>
                                </div>
                                <div class="col-4">
                                    <h6>Raised</h6>
                                    <p>$<?php echo $raised ?></p>
                                </div>
                                <div class="col-4">
                                    <h6>To Go</h6>
                                    <p>$<?php echo $to_go ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <a class="btn btn-outline-dark btn-sm w-100" href="<?php echo $action_url ?>" >Donate Now</a>
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