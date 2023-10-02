<?php
    $q = mysqli_query($conn,  "SELECT * FROM about_us where id=1 ");
    $row = mysqli_fetch_assoc($q)
?>
<?php $current_page = isset($_GET['page']) ? $_GET['page'] : ""; ?>

<div class="campus-information-area pb-70 <?php echo $current_page == 'about-us' ? 'mt-5' : ''  ?> ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="campus-image">
                    <img src="<?= $row ? '../admin/pages/'.$row['image'] : ''?>"
                        style="width:600px;height:600px;object-fit:fill" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="campus-content style-2">
                    <div class="campus-title">
                        <h2>Campus Information</h2>
                        <?= $row ? $row['home_page_description'] : ''?>
                    </div>
                    <?php if($current_page != 'about-us') { ?>
                    <a href="index.php?page=about-us" class="default-btn btn">View More<i class="flaticon-next"></i></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>