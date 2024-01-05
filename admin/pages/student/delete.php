<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['StudentID'])) {
    $StudentID  = $_GET['StudentID'];
    $sql = "DELETE FROM `student` WHERE `StudentID` = $StudentID";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=student";
    header("Location: $redirect_url");

}
