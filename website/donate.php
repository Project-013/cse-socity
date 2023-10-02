<?php
session_start();
include '../database/database.php';


if (isset($_POST["amount"])) {
    $amount = $_POST["amount"];
    $CampaignID = $_POST["CampaignID"];
    $sql = "SELECT * FROM `campaigns` WHERE `CampaignID` =" . $CampaignID;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $raised    = $row['raised'];
    $total_amount = $amount + $raised;

    $sql_update = "UPDATE `campaigns` SET `raised` = '$total_amount' WHERE `CampaignID` = '$CampaignID'";
    $result_update = mysqli_query($conn, $sql_update);
    if ($result_update) {
        $redirect_url = "/cse-socity/website/campaigns.php";
        header("Location: $redirect_url");
    }
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
    <section class="container ptb-100 ">
        <?php
        if (isset($_GET["id"])) {

        ?>
            <div class="row">

                <div class="col-sm-4 mx-auto">
                    <h5>Donate Now</h5>
                    <form method="post" action="">
                        <div class="form-floating  text-muted my-2">
                            <input type="number" min="10" class="form-control form-control-sm _form_data" id="amount" name="amount" placeholder=" " required>
                            <label for="loginEmail">Enter Amount</label>
                        </div>
                        <div class="form-floating  text-muted my-2">
                            <input type="text" min="10" class="form-control form-control-sm _form_data" id="CardNumber" name="CardNumber" placeholder=" " required>
                            <label for="CardNumber">Card Number</label>
                        </div>
                        <div class="form-floating  text-muted my-2">
                            <input type="text" min="10" class="form-control form-control-sm _form_data" id="ExpirationMonth" name="ExpirationMonth" placeholder=" " required>
                            <label for="ExpirationMonth">Expiration Month</label>
                        </div>
                        <div class="form-floating  text-muted my-2">
                            <input type="text" min="10" class="form-control form-control-sm _form_data" id="ExpirationYear" name="ExpirationYear" placeholder=" " required>
                            <label for="ExpirationYear">Expiration Year</label>
                        </div>
                        <div class="form-floating  text-muted my-2">
                            <input type="text" min="10" class="form-control form-control-sm _form_data" id="CVV" name="ExpirationYear" placeholder=" " required>
                            <label for="CVV">CVV</label>
                        </div>
                        <input type="text" class="form-control form-control-sm _form_data d-none" name="CampaignID" id="CampaignID" value="<?php echo $_GET['id'] ?>">
                        <button type="submit" id="submit" class="btn btn-primary btn-sm my-3 w-100">Donate</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>


    </section>



    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>