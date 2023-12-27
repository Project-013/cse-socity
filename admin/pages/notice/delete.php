<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['NoticeID'])) {
    $NoticeID  = $_GET['NoticeID'];
    $sql = "DELETE FROM `notice` WHERE `NoticeID` = $NoticeID";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=notice";
    header("Location: $redirect_url");

}
