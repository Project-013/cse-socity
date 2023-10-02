<?php
    if(isset($_POST['submit']))
    {
        extract($_POST);
        // If no row exists, insert a new row
        $sql = "INSERT INTO contact_us (name,phone,email,subject,message) VALUES ('$name','$phone', '$email', '$subject', '$message')";
        $run =  mysqli_query($conn, $sql);
        if($run)
        {
            $_SESSION['success'] = 'Data Inserted Successfully';
        }
        
    }
?>
<?php
    $q = mysqli_query($conn,  "SELECT * FROM shop_infos where id=1 ");
    $row = mysqli_fetch_assoc($q)
?>



<?php include 'sections/breadcrumb.php'; ?>


<div class="contact-us-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contacts-form">
                    <h3>Leave a message</h3>
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Your name</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Your email</label>
                                    <input type="email" name="email" id="email" class="form-control" required
                                        data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Your phone</label>
                                    <input type="text" name="phone" id="phone" required
                                        data-error="Please enter your number" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control" required
                                        data-error="Please enter your subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your message</label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                        required data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button name="submit" type="submit" class="default-btn">
                                    <span>Send message</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-and-address">
                    <h2>Let's Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tem incididunt ut
                        labore et dolore magna aliquat enim minim veniam quis nostr exercitation labore et dolore
                        magna aliquat </p>
                    <div class="contact-and-address-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="contact-card">
                                    <div class="icon">
                                        <i class="ri-phone-line"></i>
                                    </div>
                                    <h4>Contact</h4>
                                    <p>Mobile: <a href="<?= $row['phone'] ?>"><?= $row['phone'] ?></a></p>
                                    <p>Mail: <a href="<?= $row['email'] ?>"><span class="__cf_email__"
                                                data-cfemail="<?= $row['email'] ?>"><?= $row['email'] ?></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="contact-card">
                                    <div class="icon">
                                        <i class="ri-map-pin-line"></i>
                                    </div>
                                    <h4>Address</h4>
                                    <p><?= $row['name'] ?></p>
                                    <p><?= $row['address'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-media">
                        <h3>Social Media</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tem incididunt ut
                            labore et dolore magna aliquat enim</p>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/" target="_blank"><i
                                        class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/" target="_blank"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://instagram.com/?lang=en" target="_blank"><i
                                        class="flaticon-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/?lang=en" target="_blank"><i
                                        class="flaticon-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>