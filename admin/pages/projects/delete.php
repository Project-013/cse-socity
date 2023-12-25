<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = "DELETE FROM `projects` WHERE `ProjectID` = $id";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=projects";
    header("Location: $redirect_url");

}
