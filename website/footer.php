<?php
$q = mysqli_query($conn,  "SELECT * FROM shop_infos where id=1 ");
$row = mysqli_fetch_assoc($q);



if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $sql = "SELECT * FROM `newslatter` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 0) {
        $sql2 =  "INSERT INTO `newslatter` (`email`) VALUES ('$email')";
        $result2 = mysqli_query($conn, $sql2);
?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            Success!
        </div>

<?php

    }
}
if (isset($_POST["details"])) {
    $details = $_POST["details"];
    $sql3 =  "INSERT INTO `feedback` (`details`) VALUES ('$details')";
    $result3 = mysqli_query($conn, $sql3);
    if ($result3) {
        
?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            Success!
        </div>

<?php

    }
}
?>

<div class="container">
    <div class="row g-3 my-5 p-3  justify-content-between">
        <div class="col-md-6 ">
            <form method="POST" action="" class="m-3 p-5 bg-info rounded-pill border shadow">
                <h4 class="text-light mb-2">SUBSCRIBE TO OUR NEWSLETTER</h4>
                <h6 class="text-muted small mb-2">How would you rate your experience?</h6>

                <div class="input-group">
                    <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Enter your email">
                    <button class="btn btn-sm btn-dark" type="submit">Subscribe Now</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 p-3 rounded shadow " style="background-color: #94a2cf;">

            <form method="POST" action="">
                <h4 class="text-dark ">SHARE YOUR FEEDBACK</h4>
                <p class="text-muted small mb-2">How would you rate your experience?</p>
                <div class="mb-3">
                    <textarea class="form-control" id="details" name="details" rows="2"></textarea>
                </div>
                <button class="btn  btn-dark" type="submit">Send Feedback</button>

            </form>
        </div>

    </div>

</div>
<div class="footer-area pt-100 pb-70">

    <div class="container">


        <div class="row">

            <div class="col-lg-4 col-sm-6">
                <div class="footer-logo-area">
                    <a href="index.php"><img src="<?= '../admin/pages/' . $row['logo'] ?>" alt="Image"></a>
                    <p><?= $row['short_details'] ?></p>
                    <div class="contact-list">
                        <ul>
                            <li><a href="tel:<?= $row['phone'] ?>"><?= $row['phone'] ?>
                                </a></li>
                            <li><a href="<?= $row['email'] ?>"><span class="__cf_email__" data-cfemail="<?= $row['email'] ?>"><?= $row['email'] ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widjet">
                    <h3>Campus Life</h3>
                    <div class="list">
                        <ul>
                            <li><a href="campus-life.html">Accessibility</a></li>
                            <li><a href="campus-life.html">Financial Aid</a></li>
                            <li><a href="campus-life.html">Food Services</a></li>
                            <li><a href="campus-life.html">Housing</a></li>
                            <li><a href="campus-life.html">Information Technologies</a></li>
                            <li><a href="campus-life.html">Student Life</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widjet">
                    <h3>Our Campus</h3>
                    <div class="list">
                        <ul>
                            <li><a href="campus-life.html">Acedemic</a></li>
                            <li><a href="campus-life.html">Planning & Administration</a></li>
                            <li><a href="campus-life.html">Campus Safety</a></li>
                            <li><a href="campus-life.html">Office of the Chancellor</a></li>
                            <li><a href="campus-life.html">Facility Services</a></li>
                            <li><a href="campus-life.html">Human Resources</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="footer-widjet">
                    <h3>Academics</h3>
                    <div class="list">
                        <ul>
                            <li><a href="academics.html">Canvas</a></li>
                            <li><a href="academics.html">Catalyst</a></li>
                            <li><a href="academics.html">Library</a></li>
                            <li><a href="academics.html">Time Schedule</a></li>
                            <li><a href="academics.html">Apply For Admissions</a></li>
                            <li><a href="academics.html">Pay My Tuition</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape">
            <img src="../public/all/website/assets/images/shape-1.png" alt="Image">
        </div>
    </div>
</div>


<div class="copyright-area">
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="social-content">
                        <ul>
                            <li><span>Follow Us On</span></li>
                            <li>
                                <a href="<?= $row['facebook_link'] ?>" target="_blank"><i class="ri-facebook-fill"></i></a>
                            </li>
                            <li>
                                <a href="<?= $row['twitter_link'] ?>" target="_blank"><i class="ri-twitter-fill"></i></a>
                            </li>
                            <li>
                                <a href="<?= $row['instagram_link'] ?>" target="_blank"><i class="ri-instagram-line"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="copy">
                        <p>© <?= date('Y') ?> Developed by <a href="#" target="_blank">CSE
                                SOCIETY</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
    <i class="ri-arrow-up-s-line"></i>
</div>