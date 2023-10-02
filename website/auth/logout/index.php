<?php
    session_start();
    session_destroy();
    $redirect_url = "/cse-socity/website/";
    header("Location: $redirect_url");
?>