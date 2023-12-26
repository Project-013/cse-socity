<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = "UPDATE `forum` SET `status` = 'approved' WHERE `ForumID` = $id;";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=forum";
    header("Location: $redirect_url");

}
?>