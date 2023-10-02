<div class="banner-area">
    <div class="hero-slider2 owl-carousel owl-theme">
        <?php
            $q = mysqli_query($conn,  "SELECT * FROM photo_sliders  ");
            if (mysqli_num_rows($q) > 0) {
                while ($row = mysqli_fetch_assoc($q)) { ?>
        <div class="slider-item " style="background-image: url(<?= $row ? '../admin/pages/'.$row['image'] : ''?>)">
            <div class="container-fluid">
                <div class="slider-content">
                    <h1><?= $row['heading_one'] ?></h1>
                    <p><?= $row['small_text'] ?></p>
                    <a href="<?= $row['btn_link'] ?>" class="default-btn btn"><?= $row['btn_title'] ?> <i
                            class="flaticon-next"></i></a>
                </div>
            </div>
        </div>
        <?php }} ?>

        <!-- <div class="slider-item "
            style="background-image: url(../public/all/website/assets/images/banner/banner-img6.jpg)">
            <div class="container-fluid">
                <div class="slider-content">
                    <h1>Explore Your Potential & Talents In Sanu</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper
                        mattis pulvinar dapibus dolor sit amet consec</p>
                    <a href="courses.html" class="default-btn btn">Start a Journey <i class="flaticon-next"></i></a>
                </div>
            </div>
        </div> -->
    </div>
</div>