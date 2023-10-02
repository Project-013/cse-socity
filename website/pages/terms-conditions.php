<?php
    $q = mysqli_query($conn,  "SELECT * FROM summeries where id=1 ");
    $row = mysqli_fetch_assoc($q)
?>
<?php include 'sections/breadcrumb.php'; ?>

<div class="privacy-policy-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="privacy-content pr-20">
                    <h2>Terms Conditions</h2>

                    <?= $row['term_condition'] ?>

                </div>
            </div>
        </div>
    </div>
</div>