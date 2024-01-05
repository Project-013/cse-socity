<?php
    session_start();
    // include_once "config.php";
    include '../../../database/database.php';

    $outgoing_id = $_SESSION['UserID'];
    $sql = "SELECT * FROM user WHERE NOT UserID = {$outgoing_id} ORDER BY UserID DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>