<?php
    session_start();
    if(isset($_SESSION['UserID'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $active_status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE user SET active_status = '{$active_status}' WHERE user_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../user.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>