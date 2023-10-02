<?php include 'sections/breadcrumb.php'; ?>
<?php 
    $result = mysqli_query($conn, 'SELECT * FROM posts WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);
 ?>
<div class="events-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="events-details-left-content pr-20">
                    <div class="events-image">
                        <img src="<?= $row ? '../admin/pages/'.$row['cover_image'] : ''?>"
                            style="object-fit:cover;height:400px;width:100%" alt="Image">
                    </div>
                    <div class="meetings">
                        <h2><?= $row['title'] ?></h2>
                        <?= $row['details'] ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-lecturer pl-20">
                    <div class="row align-items-center">
                        <div class="address">
                            <h4><?= $row['organizer_name'] ?></h4>
                            <div class="list">
                                <ul>
                                    <li><a href="<?= $row['organizer_link'] ?>" target="__blank"
                                            class="text-info"><?= $row['organizer_link'] ?></a></li>
                                    <li><a href="tel:<?= $row['contact_number'] ?>"><?= $row['contact_number'] ?></a>
                                    </li>
                                    <li><a href="<?= $row['contact_email'] ?>"><span class="__cf_email__"
                                                data-cfemail="<?= $row['contact_email'] ?>"><?= $row['contact_email'] ?></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="next-workshop pl-20">
                    <h3>When Will The Next Workshop Be And How Do I Apply?</h3>
                    <div class="list">
                        <ul>
                            <li><span>Date :</span><?= date("d M,Y", strtotime($row['date'])) ?></li>
                            <li><span>Times :</span><?= $row['time_range'] ?></li>
                            <li><span>Location :</span><?= $row['location'] ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="related-post-area">
                    <h3>Related Event</h3>
                    <?php
                            $q = mysqli_query($conn, "SELECT * FROM posts WHERE type='event' AND id!='" . $_GET['id'] . "' LIMIT 3");
                        if (mysqli_num_rows($q) > 0) {
                            while ($row = mysqli_fetch_assoc($q)) { 
                                $details = $row['details'];
                                $cleanDetails = strip_tags($details);
                                $words = str_word_count($cleanDetails, 1);
                                $shortenedWords = array_slice($words, 0, 10);
                                $shortenedDetails = implode(' ', $shortenedWords);?>

                    <div class="related-post-box">
                        <div class="related-post-content">
                            <a href="index.php?page=event-details&id=<?= $row['id'] ?>"><img
                                    src="<?= $row ? '../admin/pages/'.$row['cover_image'] : ''?>"
                                    style="object-fit:cover;height:50px;width:70px" alt="Image"></a>
                            <h4><a href="index.php?page=event-details&id=<?= $row['id'] ?>"><?= $row['title'] ?></a>
                            </h4>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>