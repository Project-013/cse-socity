<?php include 'sections/breadcrumb.php'; ?>

<?php 
    $result = mysqli_query($conn, 'SELECT * FROM posts WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);
 ?>

<div class="news-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-details">
                    <div class="news-simple-card">
                        <img src="<?= $row ? '../admin/pages/'.$row['cover_image'] : ''?>"
                            style="object-fit:cover;height:400px;width:100%" alt="Image">
                        <div class="list">
                            <ul>
                                <li class="ulockd-bp-date-innner text-info">On <a href="#"><span
                                            class="text-thm"><?= date("d", strtotime($row['date'])) ?></span> /
                                        <?= date("M Y", strtotime($row['date'])) ?></a></li>
                            </ul>
                        </div>
                        <h2><?= $row['title'] ?></h2>
                        <?= $row['details'] ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="related-post-area">
                    <h3>Related Post</h3>
                    <?php
                    $q = mysqli_query($conn, "SELECT * FROM posts WHERE type='news' AND id!='" . $_GET['id'] . "' LIMIT 3");


                    if (mysqli_num_rows($q) > 0) {
                        while ($row = mysqli_fetch_assoc($q)) { 
                            $details = $row['details'];
                            $cleanDetails = strip_tags($details);
                            $words = str_word_count($cleanDetails, 1);
                            $shortenedWords = array_slice($words, 0, 8);
                            $shortenedDetails = implode(' ', $shortenedWords);?>

                    <div class="related-post-box">
                        <div class="related-post-content">
                            <a href="index.php?page=news-details&id=<?= $row['id'] ?>"><img
                                    src="<?= $row ? '../admin/pages/'.$row['cover_image'] : ''?>"
                                    style="object-fit:cover;height:70px;width:70px" alt="Image"></a>
                            <h4><a href="index.php?page=news-details&id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h4>
                            <a href="index.php?page=news-details&id=<?= $row['id'] ?>">
                                <p><?= $shortenedDetails ?>...</p>
                            </a>
                        </div>
                    </div>

                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>