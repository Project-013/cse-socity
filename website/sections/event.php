<?php if ($current_page == "event") { ?>
<div class="events-area pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $results_per_page = 6; // Number of news items to display per page
            $current_page = isset($_GET['page_number']) ? $_GET['page_number'] : 1; // Get the current page number from the URL
            $offset = ($current_page - 1) * $results_per_page; // Calculate the offset

            // Retrieve news items for the current page using LIMIT and OFFSET
            $q = mysqli_query($conn, "SELECT * FROM posts WHERE type='event' LIMIT $results_per_page OFFSET $offset");
            
            if (mysqli_num_rows($q) > 0) {
                while ($row = mysqli_fetch_assoc($q)) { 
                    $details = $row['details'];
                    $cleanDetails = strip_tags($details);
                    $words = str_word_count($cleanDetails, 1);
                    $shortenedWords = array_slice($words, 0, 15);
                    $shortenedDetails = implode(' ', $shortenedWords);
                    ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-events-card style-4">
                    <div class="events-image">
                        <a href="index.php?page=event-details&id=<?= $row['id'] ?>"><img
                                src="<?= $row ? '../admin/pages/'.$row['cover_image'] : ''?>"
                                style="object-fit:cover;height:273px;width:100%" alt="Image"></a>
                        <div class="date">
                            <span><?= date("d", strtotime($row['date'])) ?></span>
                            <p><?= date("M", strtotime($row['date'])) ?></p>
                        </div>
                    </div>
                    <div class="events-content">
                        <div class="admin">
                            <p><a href="index.php?page=event-details&id=<?= $row['id'] ?>"><i
                                        class="flaticon-student-with-graduation-cap"></i><?= $row['location'] ?></a></p>
                        </div>
                        <a href="index.php?page=event-details&id=<?= $row['id'] ?>">
                            <h3><?= $row['title'] ?></h3>
                        </a>
                    </div>
                </div>
            </div>
            <?php }} ?>

        </div>

        <div class="paginations">
            <ul>
                <?php
                    $total_results = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM posts WHERE type='event'"));
                    $total_pages = ceil($total_results / $results_per_page); // Calculate total number of pages

                    // Set the previous and next page numbers
                    $prev_page = ($current_page > 1) ? $current_page - 1 : 1;
                    $next_page = ($current_page < $total_pages) ? $current_page + 1 : $total_pages;

                    // Display the previous page button
                    echo '<li><a href="index.php?page=event&page_number=' . $prev_page . '" aria-label="Previous">
                        <i class="flaticon-back"></i>
                    </a></li>';

                    // Display the page numbers
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<li><a href="index.php?page=event&page_number=' . $i . '"' . (($current_page == $i) ? ' class="active"' : '') . '>' . $i . '</a></li>';
                    }

                    // Display the next page button
                    echo '<li><a href="index.php?page=event&page_number=' . $next_page . '" aria-label="Next">
                        <i class="flaticon-next"></i>
                    </a></li>';
                ?>
            </ul>
        </div>

    </div>
</div>
<?php } else{?>
<div class="events-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Events</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis
            </p>
        </div>
        <div class="events-slider mb-20 owl-carousel owl-theme">
            <?php
            $results_per_page = 6; // Number of news items to display per page
            $current_page = isset($_GET['page_number']) ? $_GET['page_number'] : 1; // Get the current page number from the URL
            $offset = ($current_page - 1) * $results_per_page; // Calculate the offset

            // Retrieve news items for the current page using LIMIT and OFFSET
            $q = mysqli_query($conn, "SELECT * FROM posts WHERE type='event' LIMIT $results_per_page OFFSET $offset");
            
            if (mysqli_num_rows($q) > 0) {
                while ($row = mysqli_fetch_assoc($q)) { 
                    $details = $row['details'];
                    $cleanDetails = strip_tags($details);
                    $words = str_word_count($cleanDetails, 1);
                    $shortenedWords = array_slice($words, 0, 15);
                    $shortenedDetails = implode(' ', $shortenedWords);
                    ?>
            <div class="single-events-card style2">
                <div class="events-image">
                    <a href="index.php?page=event-details&id=<?= $row['id'] ?>"><img
                            src="<?= $row ? '../admin/pages/'.$row['cover_image'] : ''?>"
                            style="object-fit:cover;height:273px;width:100%" alt="Image"></a>
                </div>
                <div class="events-content">
                    <a href="index.php?page=event-details&id=<?= $row['id'] ?>">
                        <h3><?= $row['title'] ?></h3>
                    </a>
                    <div class="admin-and-date">
                        <ul class="d-flex justify-content-between">
                            <li>
                                <p><a href="index.php?page=event-details&id=<?= $row['id'] ?>"><i
                                            class="flaticon-student-with-graduation-cap"></i><?= $row['location'] ?>
                                    </a></a></p>
                            </li>
                            <li>
                                <p><a href="index.php?page=event-details&id=<?= $row['id'] ?>"><i
                                            class="flaticon-clock"></i><?= date("M d,Y", strtotime($row['date'])) ?></a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }} ?>

        </div>
    </div>
</div>
<?php } ?>