<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = "UPDATE `projects` SET `status` = 'approved' WHERE `projects`.`ProjectID` = $id;";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=projects";
    header("Location: $redirect_url");

}
?>