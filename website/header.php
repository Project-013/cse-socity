<?php
    $q = mysqli_query($conn,  "SELECT * FROM shop_infos where id=1 ");
    $row = mysqli_fetch_assoc($q)
?>
<?php $current_page = isset($_GET['page']) ? $_GET['page'] : ""; ?>
<div class="top-header-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="header-left-content">
                    <p><a href="<?= $row['facebook_link'] ?>" target="__blank" class="text-white"><i
                                class="flaticon-facebook p-2"></i></a>
                        <a href="<?= $row['instagram_link'] ?>" target="__blank" class="text-white"><i
                                class="flaticon-instagram p-2"></i></a>
                        <a href="<?= $row['twitter_link'] ?>" target="__blank" class="text-white"><i
                                class="flaticon-twitter p-2"></i></a>
                        <a href="<?= $row['linkedin'] ?>" target="__blank" class="text-white"><i
                                class="flaticon-linkedin p-2"></i></a>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header-right-content">
                    <div class="list">
                        <ul>
                            <li><a href="index.php?page=executive-member">Executive</a></li>
                            <li><a href="index.php?page=faculty-member">Faculty</a></li>
                            <li><a href="index.php?page=alumni">Alumni</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>