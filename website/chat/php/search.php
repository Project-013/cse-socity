<?php
    session_start();
    include '../../../database/database.php';

    $outgoing_id = $_SESSION['UserID'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM user WHERE NOT UserID = {$outgoing_id} AND (name LIKE '%{$searchTerm}%' OR name LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>