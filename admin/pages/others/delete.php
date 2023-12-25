<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $type  = $_GET['type'];
    $sql =  "DELETE FROM `$type` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=others";
    header("Location: $redirect_url");
}
