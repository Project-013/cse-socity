<?php
    include '../database/database.php';

    session_start();

    $redirect_url = "/cse-socity/website/";

    $user_id= $_SESSION["UserID"];

    $sql = "DELETE FROM user WHERE `user`.`UserID` =".$user_id;
    $query = mysqli_query($conn, $sql);

    session_destroy();
    header("Location: $redirect_url");
