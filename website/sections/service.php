<div class="academics-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php if ($current_page == "") { ?>
            <div class="section-title">
                <h2>Service</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis
                </p>
            </div>
            <?php } ?>
            <div class="col-lg-12">
                <div class="academics-left-content">
                    <div class="row justify-content-center">
                        <?php
                            if ($current_page == "") { 
                                $q = mysqli_query($conn, "SELECT * FROM service LIMIT 3");
                            }
                            else{
                                $q = mysqli_query($conn, "SELECT * FROM service ");
                            }
                            if (mysqli_num_rows($q) > 0) {
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-academics-card3">
                                <img src="<?= $row ? '../admin/pages/'.$row['logo'] : ''?>" width="70px" height="70px"
                                    alt="">
                                <a href="academics-details.html">
                                    <h3><?= $row['title'] ?></h3>
                                </a>
                                <p><?= $row['short_details'] ?></p>
                                <a href="index.php?page=service-details&id=<?= $row['id']; ?>"
                                    class="read-more-btn">Read More<i class="flaticon-next"></i></a>
                            </div>
                        </div>
                        <?php }} ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>