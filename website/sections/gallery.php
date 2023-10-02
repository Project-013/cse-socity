<?php if ($current_page == "gallery") { ?>
<div class="student-life-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php 
                        $q = mysqli_query($conn,  "SELECT * FROM gallery");
                        if (mysqli_num_rows($q) > 0) {
                            while ($row = mysqli_fetch_assoc($q)) {
                                $imageArray = explode(',', $row['images']);
                                $imageCount = count($imageArray);
                                 ?>
            <?php foreach ($imageArray as $image): ?>
            <div class="col-lg-4">
                <div class="student-life-card">
                    <img src="<?= '../admin/pages/'.$image ?>" alt="Image"
                        style="width:100%;height:200px;object-fit:cover">
                </div>
            </div>
            <?php endforeach ?>
            <?php }} ?>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="campus-life-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis
            </p>
        </div>
        <div class="campus-slider2 owl-carousel owl-theme">
            <?php 
                        $q = mysqli_query($conn,  "SELECT * FROM gallery");
                        if (mysqli_num_rows($q) > 0) {
                            while ($row = mysqli_fetch_assoc($q)) {
                                $imageArray = explode(',', $row['images']);
                                $imageCount = count($imageArray);
                                 ?>
            <?php foreach ($imageArray as $image): ?>
            <div class="single-campus-card style-3">
                <div class="img">
                    <img src="<?= '../admin/pages/'.$image ?>" alt="Image"
                        style="width:100%;height:200px;object-fit:cover">
                </div>
            </div>
            <?php endforeach ?>
            <?php }} ?>
        </div>
    </div>
</div>
<?php } ?>