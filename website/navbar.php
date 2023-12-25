<?php
$q = mysqli_query($conn,  "SELECT * FROM shop_infos where id=1 ");
$row = mysqli_fetch_assoc($q)
?>
<?php $current_page = isset($_GET['page']) ? $_GET['page'] : ""; ?>
<div class="navbar-area nav-bg-2">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.php">
                        <img src="<?= $row ? '../admin/pages/' . $row['logo'] : '' ?>" class="main-logo" lt="logo">
                        <img src="<?= $row ? '../admin/pages/' . $row['logo'] : '' ?>" class="white-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.php">
                    <img src="<?= $row ? '../admin/pages/' . $row['logo'] : '' ?>" class="main-logo" alt="logo">
                    <img src="<?= $row ? '../admin/pages/' . $row['logo'] : '' ?>" class="white-logo" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?php echo $current_page == '' ? 'active' : '' ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=service" class="nav-link <?php echo $current_page == 'service' ? 'active' : ''  ?>">Service</a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?page=news" class="nav-link <?php echo $current_page == 'news' ? 'active' : ''  ?>">News</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=event" class="nav-link <?php echo $current_page == 'event' ? 'active' : ''  ?>">Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=gallery" class="nav-link <?php echo $current_page == 'gallery' ? 'active' : ''  ?>">Gallery</a>
                        </li>



                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Others
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="campaigns.php" class="nav-link <?php echo $current_page == 'campaigns' ? 'active' : ''  ?>">Campaigns</a>
                                </li>
                                <li class="nav-item">
                                    <a href="blood-donor.php" class="nav-link ">Find blood donor </a>
                                </li>
                                <li class="nav-item">
                                    <a href="members.php" class="nav-link">Find members </a>
                                </li>
                                <li class="nav-item">
                                    <a href="publications.php" class="nav-link">Research & Publications</a>
                                </li>
                                <li class="nav-item">
                                    <a href="projects.php" class="nav-link">Projects</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle  <?php echo $current_page == 'testimonial' || $current_page == 'about-us' || $current_page == 'faqs' || $current_page == 'privacy-policy' || $current_page == 'terms-condiitons' ? 'active' : ''  ?>">
                                Pages
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="index.php?page=about-us" class="nav-link <?php echo $current_page == 'about-us' ? 'active' : ''  ?>">About
                                        Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=faqs" class="nav-link  <?php echo $current_page == 'faqs' ? 'active' : ''  ?>">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=testimonial" class="nav-link  <?php echo $current_page == 'testimonial' ? 'active' : ''  ?>">Testimonial</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=privacy-policy" class="nav-link  <?php echo $current_page == 'privacy-policy' ? 'active' : ''  ?>">Privacy
                                        Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=terms-conditions" class="nav-link  <?php echo $current_page == 'terms-conditions' ? 'active' : ''  ?>">Terms
                                        And Conditions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=contact-us" class="nav-link <?php echo $current_page == 'contact-us' ? 'active' : ''  ?>">Contact
                                Us</a>
                        </li>
                    </ul>
                    <div class="others-options">
                        <?php
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                            $user_type = $_SESSION["user_type"];
                            $UserID = $_SESSION["UserID"];

                        ?>

                            <span class="dropdown text-light">
                                <button class="dropdown-toggle btn btn-muted" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                                if ($_SESSION['img'] != "") {
                                                ?>
                                                    <img src="/cse-socity/website/img/<?php echo $_SESSION['img']  ?>" alt="nothing found" width="50" height="50" class="d- mx-auto rounded-circle">
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fa fa-user-circle fa-2x text-primary mb-2" aria-hidden="true"></i>

                                                <?php
                                                }
                                                ?>

                                </button>
                                <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="">
                                    <li>

                                        <a class="dropdown-item pointer" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item pointer" href="settings.php"><i class="fa fa-gear" aria-hidden="true"></i> Settings </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <a class="dropdown-item pointer" href="logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                    </li>

                                </ul>
                            </span>
                        <?php

                        } else {
                        ?>
                            <a class="btn btn-sm btn-outline-secondary mx-1" href="login.php">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>

                                Login</a>
                            <a class="btn btn-sm btn-outline-secondary  mx-1" href="index.php?page=registration">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>

                                Registration</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
            <div class="modal-body">
                <a href="index.html">
                    <img src="public/all/website/assets/images/logo.png" class="main-logo" alt="logo">
                    <img src="public/all/website/assets/images/white-logo.png" class="white-logo" alt="logo">
                </a>
                <div class="sidebar-content">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <div class="sidebar-btn">
                        <a href="contact.html" class="default-btn">Let’s Talk</a>
                    </div>
                </div>
                <div class="sidebar-contact-info">
                    <h3>Contact Information</h3>
                    <ul class="info-list">
                        <li><i class="ri-phone-fill"></i> <a href="tel:9901234567">+990-123-4567</a></li>
                        <li><i class="ri-mail-line"></i><a
                                href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#6109040d0d0e2112000f144f020e0c"><span
                                    class="__cf_email__"
                                    data-cfemail="c5ada0a9a9aa85b6a4abb0eba6aaa8">[email&#160;protected]</span></a>
                        </li>
                        <li><i class="ri-map-pin-line"></i> 413 North Las Vegas, NV 89032</li>
                    </ul>
                </div>
                <ul class="sidebar-social-list">
                    <li>
                        <a href="https://www.facebook.com/" target="_blank"><i class="flaticon-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/?lang=en" target="_blank"><i class="flaticon-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="https://instagram.com/?lang=en" target="_blank"><i class="flaticon-instagram"></i></a>
                    </li>
                </ul>
                <div class="contact-form">
                    <h3>Ready to Get Started?</h3>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required
                                        data-error="Please enter your name" placeholder="Your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required
                                        data-error="Please enter your email" placeholder="Your email address">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" required
                                        data-error="Please enter your phone number" placeholder="Your phone number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" cols="30" rows="6" required
                                        data-error="Please enter your message"
                                        placeholder="Write your message..."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">Send Message<span></span></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->