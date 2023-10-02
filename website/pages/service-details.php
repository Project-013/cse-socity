<?php include 'sections/breadcrumb.php'; ?>
<?php 
    $result = mysqli_query($conn, 'SELECT * FROM service WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);
 ?>

<div class="news-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news-details">
                    <div class="news-simple-card">
                        <img class="img-responsive img-whp" src="<?= $row ? '../admin/pages/'.$row['logo'] : ''?>"
                            style="width:100%;height:400px ;object-fit:cover" alt="">
                        <h2><?= $row['title'] ?></h2>
                        <?= $row['details'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>