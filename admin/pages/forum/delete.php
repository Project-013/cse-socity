<?php
session_start();
include '../../../database/database.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $sql = "DELETE FROM `forum` WHERE `ForumID` = $id";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=forum";
    header("Location: $redirect_url");

}

if (isset($_GET['CommentID'])) {
    $id  = $_GET['CommentID'];
    $sql = "DELETE FROM `comments` WHERE `CommentID` = $id";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/admin/pages/index.php?page=comment";
    header("Location: $redirect_url");

}
