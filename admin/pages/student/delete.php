<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['ResultID'])) {
    $ResultID  = $_GET['ResultID'];
    $sql = "DELETE FROM `results` WHERE `ResultID` = $ResultID";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=result";
    header("Location: $redirect_url");

}
