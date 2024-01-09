<?php
$user_type = $_SESSION["user_type"];

if (isset($_POST['updateTitle'])) {
    $title =  $_POST['updateTitle'];
    $description =  $_POST['description'];
    $CampaignID =  $_POST['CampaignID'];


    $sql = "UPDATE `campaigns` SET `title` = '$title', `description`='$description' WHERE `CampaignID` =$CampaignID";
    $result = mysqli_query($conn, $sql);
}

$CampaignID  = $_GET['p'];

$existsql = "SELECT * FROM `campaigns` WHERE `CampaignID` = '$CampaignID'";

$result = mysqli_query($conn, $existsql);
$row = mysqli_fetch_assoc($result);
$title =  $row['title'];
$description =  $row['description'];
// $action_url = $root_url . "/admin/campaigns/_config.php";

?>


<div class="row justify-content-center g-3 my-2 ">
    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
        <h3 class="heading_color mb-4">Update campaigns</h3>
        <form action="" method="post">
            <input type="text" class="form-control _form_data d-none" id="CampaignID" name="CampaignID" value="<?php echo $CampaignID ?>" placeholder=" " required>

            <div class="form-group">
                <label for="updateTitle">Enter title</label>
                <input type="text" class="form-control _form_data" id="updateTitle" name="updateTitle" value="<?php echo $title ?>" placeholder=" " required>
            </div>
            <div class="form-group my-2">
                <label for="address">Description</label>
                <textarea class="form-control _form_data" id="description" name="description" placeholder=" " rows="3"><?php echo $description ?></textarea>
            </div>

            <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Update campaigns</button>
        </form>

    </div>
</div>