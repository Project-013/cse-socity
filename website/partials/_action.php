<?php
session_start();
include '../../database/database.php';
$UserID = $_SESSION["UserID"];

if (isset($_GET['ForumID'])) {
    $ForumID =  $_GET['ForumID'];
    $redirect =  $_GET['redirect'];
    $type =  $_GET['type'];

    $sql_isLiked = "SELECT * FROM `react` WHERE `ForumID`='$ForumID' AND `UserID`= '$UserID'";
    $r1 = mysqli_query($conn, $sql_isLiked);
    $isLiked = mysqli_num_rows($r1);


    $sql = "INSERT INTO `react` (`ForumID`, `UserID`,`type`) VALUES ('$ForumID','$UserID','$type')";


    if ($isLiked) {
        $sql = "DELETE FROM `react` WHERE `ForumID`='$ForumID' AND `UserID`= '$UserID'";
        $row_react = mysqli_fetch_assoc($r1);
        $react_type = $row_react['type'];
        if($react_type!=$type){
            $sql = "UPDATE `react` SET `type` = '$type' WHERE `ForumID`='$ForumID' AND `UserID`= '$UserID'";
        }
    }
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $redirect_url = "/cse-socity/website/forum.php#forum".$ForumID;
        if($redirect=='post'){
            $redirect_url = "/cse-socity/website/forum-post.php?id=".$ForumID;
        }
        header("Location: $redirect_url");
    }
}
if (isset($_GET['CommentID'])) {
    $CommentID =  $_GET['CommentID'];
    $forum =  $_GET['forum'];
    $type =  $_GET['type'];



    $sql_isLiked = "SELECT * FROM `react` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
    $r1 = mysqli_query($conn, $sql_isLiked);
    $isLiked = mysqli_num_rows($r1);
    $sql = "INSERT INTO `react` (`CommentID`, `UserID`,`type`) VALUES ('$CommentID','$UserID','$type')";


    if ($isLiked) {
        $sql = "DELETE FROM `react` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
        $row_react = mysqli_fetch_assoc($r1);
        $react_type = $row_react['type'];
        if($react_type!=$type){
            $sql = "UPDATE `react` SET `type` = '$type' WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
        }
    }
    $result = mysqli_query($conn, $sql);

    if ($result) {

            $redirect_url = "/cse-socity/website/forum-post.php?id=".$forum;
        header("Location: $redirect_url");
    }
}
