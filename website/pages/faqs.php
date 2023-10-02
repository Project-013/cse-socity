<?php include 'sections/breadcrumb.php'; ?>
<?php
    $q = mysqli_query($conn,  "SELECT * FROM about_us where id=1 ");
    $row = mysqli_fetch_assoc($q)
?>
<div class="faq-area ptb-100">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="faq-image pr-20">
                    <img src="<?= $row ? '../admin/pages/'.$row['image'] : ''?>" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-left-content pl-20">
                    <div class="faq-title">
                        <h2>Need To Ask Some Questions Or Check Questions</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority in
                            injected humour, randomised words don't look believable</p>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <?php
                            $q = mysqli_query($conn,  "SELECT * FROM faqs ");
                            if (mysqli_num_rows($q) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($q)) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne-<?= $row['id'] ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne-<?= $row['id'] ?>" aria-expanded="true"
                                    aria-controls="collapseOne-<?= $row['id'] ?>">
                                    <?= $i ?> <?= $row['question'] ?>
                                </button>
                            </h2>
                            <div id="collapseOne-<?= $row['id'] ?>" class="accordion-collapse collapse faqs"
                                aria-labelledby="headingOne-<?= $row['id'] ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?= $row['answer'] ?>
                                </div>
                            </div>
                        </div>
                        <?php $i++;} } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $('.faqs[data-key="0"]').addClass('show');

    // Add click event handler to all buttons
    $('.faqs').click(function() {
        $('.faqs').removeClass('show');
        $(this).addClass('show');
    });
});
</script>