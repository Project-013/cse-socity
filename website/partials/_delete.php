<?php
session_start();
include '../../database/database.php';

if (isset($_GET['remove_img'])) {
    $forum  = $_GET['forum'];
    $sql = "UPDATE `forum` SET `post_img` = '' WHERE `ForumID`='$forum'";

    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/website/forum.php";
    header("Location: $redirect_url");

}

if (isset($_GET['ForumID'])) {
    $ForumID  = $_GET['ForumID'];
    $sql = "DELETE FROM `forum` WHERE `ForumID` = $ForumID";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/website/forum.php";
    header("Location: $redirect_url");

}
if (isset($_GET['CommentID'])) {
    $CommentID  = $_GET['CommentID'];
    $forum  = $_GET['forum'];
    $sql = "DELETE FROM `comments` WHERE `CommentID` = $CommentID";
    $result = mysqli_query($conn, $sql);
    $redirect_url = "/cse-socity/website/forum-post.php?id=".$forum;
    header("Location: $redirect_url");
}
