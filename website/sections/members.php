<?php if ($current_page == "faculty-member") { ?>
<div class="courses-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-left-content">
                    <div class="row">
                        <?php
                            $results_per_page = 6; // Number of news items to display per page
                            $current_page = isset($_GET['page_number']) ? $_GET['page_number'] : 1; // Get the current page number from the URL
                            $offset = ($current_page - 1) * $results_per_page; // Calculate the offset

                           
                            $q = mysqli_query($conn, "SELECT * FROM members WHERE type='faculty' and status=1 LIMIT $results_per_page OFFSET
                            $offset");
                            
                        if (mysqli_num_rows($q) > 0) {
                        while ($row = mysqli_fetch_assoc($q)) {
                        $details = $row['short_details'];
                        $cleanDetails = strip_tags($details);
                        $words = str_word_count($cleanDetails, 1);
                        $shortenedWords = array_slice($words, 0, 15);
                        $shortenedDetails = implode(' ', $shortenedWords);
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-courses-card style4">
                                <div class="courses-img">
                                    <a href="index.php?page=faculty-member-details&id=<?= $row['id'] ?>"><img
                                            src="<?= $row ? '../admin/pages/'.$row['avatar'] : ''?>"
                                            style="object-fit:cover;height:273px;width:100%" alt="Image"></a>
                                </div>
                                <div class="courses-content">
                                    <div class="bottom-content">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <ul>
                                                    <li><i class="flaticon-graduation"></i><?= $row['name'] ?></li>
                                                    <li><img width="30" height="30"
                                                            src="https://img.icons8.com/arcade/30/men-age-group-4.png"
                                                            alt="men-age-group-4" /><?= $row['designation'] ?></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="index.php?page=faculty-member-details&id=<?= $row['id'] ?>">
                                        <h3><?= $shortenedDetails ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>

                    <div class="paginations">
                        <ul>
                            <?php
                                $total_results = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM members WHERE type='faculty'"));
                                $total_pages = ceil($total_results / $results_per_page); // Calculate total number of pages

                                // Set the previous and next page numbers
                                $prev_page = ($current_page > 1) ? $current_page - 1 : 1;
                                $next_page = ($current_page < $total_pages) ? $current_page + 1 : $total_pages;

                                // Display the previous page button
                                echo '<li><a href="index.php?page=faculty-member&page_number=' . $prev_page . '" aria-label="Previous">
                                    <i class="flaticon-back"></i>
                                </a></li>';

                                // Display the page numbers
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo '<li><a href="index.php?page=faculty-member&page_number=' . $i . '"' . (($current_page == $i) ? ' class="active"' : '') . '>' . $i . '</a></li>';
                                }

                                // Display the next page button
                                echo '<li><a href="index.php?page=faculty-member&page_number=' . $next_page . '" aria-label="Next">
                                    <i class="flaticon-next"></i>
                                </a></li>';
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($current_page == "executive-member") { ?>
<div class="courses-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-left-content">
                    <div class="row">
                        <?php
                            $results_per_page = 6; // Number of news items to display per page
                            $current_page = isset($_GET['page_number']) ? $_GET['page_number'] : 1; // Get the current page number from the URL
                            $offset = ($current_page - 1) * $results_per_page; // Calculate the offset

                           
                            $q = mysqli_query($conn, "SELECT * FROM members WHERE type='executive' and status=1 LIMIT $results_per_page OFFSET
                            $offset");

                        if (mysqli_num_rows($q) > 0) {
                        while ($row = mysqli_fetch_assoc($q)) {
                        $details = $row['short_details'];
                        $cleanDetails = strip_tags($details);
                        $words = str_word_count($cleanDetails, 1);
                        $shortenedWords = array_slice($words, 0, 15);
                        $shortenedDetails = implode(' ', $shortenedWords);
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-courses-card style4">
                                <div class="courses-img">
                                    <a href="index.php?page=executive-member-details&id=<?= $row['id'] ?>"><img
                                            src="<?= $row ? '../admin/pages/'.$row['avatar'] : ''?>"
                                            style="object-fit:cover;height:273px;width:100%" alt="Image"></a>
                                </div>
                                <div class="courses-content">
                                    <div class="bottom-content">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <ul>
                                                    <li><i class="flaticon-graduation"></i><?= $row['name'] ?></li>
                                                    <li><img width="30" height="30"
                                                            src="https://img.icons8.com/arcade/30/men-age-group-4.png"
                                                            alt="men-age-group-4" /><?= $row['designation'] ?></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="index.php?page=executive-member-details&id=<?= $row['id'] ?>">
                                        <h3><?= $shortenedDetails ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>

                    <div class="paginations">
                        <ul>
                            <?php
                                $total_results = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM members WHERE type='executive'"));
                                $total_pages = ceil($total_results / $results_per_page); // Calculate total number of pages

                                // Set the previous and next page numbers
                                $prev_page = ($current_page > 1) ? $current_page - 1 : 1;
                                $next_page = ($current_page < $total_pages) ? $current_page + 1 : $total_pages;

                                // Display the previous page button
                                echo '<li><a href="index.php?page=executive-member&page_number=' . $prev_page . '" aria-label="Previous">
                                    <i class="flaticon-back"></i>
                                </a></li>';

                                // Display the page numbers
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo '<li><a href="index.php?page=executive-member&page_number=' . $i . '"' . (($current_page == $i) ? ' class="active"' : '') . '>' . $i . '</a></li>';
                                }

                                // Display the next page button
                                echo '<li><a href="index.php?page=executive-member&page_number=' . $next_page . '" aria-label="Next">
                                    <i class="flaticon-next"></i>
                                </a></li>';
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($current_page == "alumni") { ?>
<div class="courses-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-left-content">
                    <div class="row">
                        <?php
                            $results_per_page = 6; // Number of news items to display per page
                            $current_page = isset($_GET['page_number']) ? $_GET['page_number'] : 1; // Get the current page number from the URL
                            $offset = ($current_page - 1) * $results_per_page; // Calculate the offset

                           
                            $q = mysqli_query($conn, "SELECT * FROM members WHERE type='alumni' and status=1 LIMIT $results_per_page OFFSET
                            $offset");

                        if (mysqli_num_rows($q) > 0) {
                        while ($row = mysqli_fetch_assoc($q)) {
                        $details = $row['short_details'];
                        $cleanDetails = strip_tags($details);
                        $words = str_word_count($cleanDetails, 1);
                        $shortenedWords = array_slice($words, 0, 15);
                        $shortenedDetails = implode(' ', $shortenedWords);
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-courses-card style4">
                                <div class="courses-img">
                                    <a href="index.php?page=alumni-details&id=<?= $row['id'] ?>"><img
                                            src="<?= $row ? '../admin/pages/'.$row['avatar'] : ''?>"
                                            style="object-fit:cover;height:273px;width:100%" alt="Image"></a>
                                </div>
                                <div class="courses-content">
                                    <div class="bottom-content">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <ul>
                                                    <li><i class="flaticon-graduation"></i><?= $row['name'] ?></li>
                                                    <li><img width="30" height="30"
                                                            src="https://img.icons8.com/arcade/30/men-age-group-4.png"
                                                            alt="men-age-group-4" /><?= $row['designation'] ?></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="index.php?page=alumni-details&id=<?= $row['id'] ?>">
                                        <h3><?= $shortenedDetails ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>

                    <div class="paginations">
                        <ul>
                            <?php
                                $total_results = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM members WHERE type='alumni'"));
                                $total_pages = ceil($total_results / $results_per_page); // Calculate total number of pages

                                // Set the previous and next page numbers
                                $prev_page = ($current_page > 1) ? $current_page - 1 : 1;
                                $next_page = ($current_page < $total_pages) ? $current_page + 1 : $total_pages;

                                // Display the previous page button
                                echo '<li><a href="index.php?page=alumni-member&page_number=' . $prev_page . '" aria-label="Previous">
                                    <i class="flaticon-back"></i>
                                </a></li>';

                                // Display the page numbers
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo '<li><a href="index.php?page=alumni-member&page_number=' . $i . '"' . (($current_page == $i) ? ' class="active"' : '') . '>' . $i . '</a></li>';
                                }

                                // Display the next page button
                                echo '<li><a href="index.php?page=alumni-member&page_number=' . $next_page . '" aria-label="Next">
                                    <i class="flaticon-next"></i>
                                </a></li>';
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>