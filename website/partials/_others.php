<?php


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
