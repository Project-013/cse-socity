<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="../public/all/website/assets/js/jquery.min.js"></script>

<script src="../public/all/website/assets/js/bootstrap.bundle.min.js"></script>

<script src="../public/all/website/assets/js/jquery.meanmenu.js"></script>

<script src="../public/all/website/assets/js/owl.carousel.min.js"></script>

<script src="../public/all/website/assets/js/carousel-thumbs.min.js"></script>

<script src="../public/all/website/assets/js/jquery.magnific-popup.js"></script>

<script src="../public/all/website/assets/js/aos.js"></script>

<script src="../public/all/website/assets/js/odometer.min.js"></script>

<script src="../public/all/website/assets/js/appear.min.js"></script>

<script src="../public/all/website/assets/js/form-validator.min.js"></script>

<script src="../public/all/website/assets/js/contact-form-script.js"></script>

<script src="../public/all/website/assets/js/ajaxchimp.min.js"></script>

<script src="../public/all/website/assets/js/custom.js"></script>
<script src="../public/all/website/assets/js/html2pdf.bundle.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
<?php if (isset($_SESSION['success'])) { ?>
alertify.set('notifier', 'position', 'top-right');
alertify.success('<?= $_SESSION['success'] ?> ');
<?php unset($_SESSION['success']);} ?>
</script>

<script>
<?php if (isset($_SESSION['error'])) { ?>
alertify.set('notifier', 'position', 'top-right');
alertify.error('<?= $_SESSION['error'] ?> ');
<?php unset($_SESSION['error']);} ?>
</script>