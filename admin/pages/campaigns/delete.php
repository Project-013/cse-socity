<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['CampaignID'])) {
    $CampaignID  = $_GET['CampaignID'];
    $sql = "DELETE FROM `campaigns` WHERE `CampaignID` = $CampaignID";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=campaigns";
    header("Location: $redirect_url");

}
