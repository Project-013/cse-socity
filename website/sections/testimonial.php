<div class="courses-area pt-100 pb-70 bg-f4f6f9">
    <div class="container">
        <?php if ($current_page == "") { ?>
        <div class="section-title">
            <h2>Testimonial</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis
            </p>
        </div>
        <?php } ?>
        <div class="courses-slider style-2 owl-carousel owl-theme">
            <?php
                $q = mysqli_query($conn,  "SELECT * FROM testimonial where status = 1 ");
                if (mysqli_num_rows($q) > 0) {
                    while ($row = mysqli_fetch_assoc($q)) { ?>
            <div class="single-courses-card style3">
                <div class="courses-content">
                    <div class="admin-profile">
                        <img src="<?= $row ? '../admin/pages/'.$row['avatar'] : ''?>"
                            style="width:50px;height:50px;object-fit:cover" alt="Image">
                        <p>With <a href="#"><?= $row['name'] ?></a> <em><?= $row['designation'] ?></em></p>
                        <p><?= $row['message'] ?></p>
                    </div>
                    <div class="bottom-content">
                        <ul class="d-flex justify-content-between">
                            <li>
                                <ul>
                                    <?php for($i=0 ; $i<$row['star'] ; $i++){ ?>
                                    <li><i class="ri-star-fill"></i></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>