<?php 
session_start();

include '../database/database.php'; ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'header-link.php'; ?>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>

    <?php
    @$page = $_GET['page'];
    if ($page != '') {

        if ($page == 'about-us') {
            include 'pages/about-us.php';
        } else if ($page == 'faqs') {
            include 'pages/faqs.php';
        } else if ($page == 'privacy-policy') {
            include 'pages/privacy-policy.php';
        } else if ($page == 'terms-conditions') {
            include 'pages/terms-conditions.php';
        } else if ($page == 'contact-us') {
            include 'pages/contact-us.php';
        } else if ($page == 'event') {
            include 'pages/event.php';
        } else if ($page == 'event-details') {
            include 'pages/event-details.php';
        } else if ($page == 'news') {
            include 'pages/news.php';
        } else if ($page == 'news-details') {
            include 'pages/news-details.php';
        } else if ($page == 'gallery') {
            include 'pages/gallery.php';
        } else if ($page == 'testimonial') {
            include 'pages/testimonial.php';
        } else if ($page == 'service') {
            include 'pages/service.php';
        } else if ($page == 'service-details') {
            include 'pages/service-details.php';
        } else if ($page == 'faculty-member') {
            include 'pages/faculty-member.php';
        } else if ($page == 'faculty-member-details') {
            include 'pages/faculty-member-details.php';
        } else if ($page == 'executive-member') {
            include 'pages/executive-member.php';
        } else if ($page == 'executive-member-details') {
            include 'pages/executive-member-details.php';
        } else if ($page == 'alumni') {
            include 'pages/alumni.php';
        } else if ($page == 'alumni-details') {
            include 'pages/alumni-details.php';
        } else if ($page == 'login') {
            include 'auth/login/index.php';
        } else if ($page == 'registration') {
            include 'auth/registration/index.php';
        } else if ($page == 'find-members') {
            include 'pages/members.php';
        } else if ($page == 'campaigns') {
            include 'pages/campaigns.php';
        }
    } else {
        include 'pages/welcome.php';
    }
    ?>

    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>