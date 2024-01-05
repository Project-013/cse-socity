<div class="card">
    <div class="card-body">
        <?php



        if (isset($_SESSION["UserID"]) && $Forum_UserID == $_SESSION["UserID"]) {
            $UserID = $_SESSION["UserID"];
            $update_url = "/cse-socity/website/forum.php?ForumID=" . $ForumID;
            $dlt_url = "/cse-socity/website/partials/_delete.php?ForumID=" . $ForumID;

        ?>
            <span class="d-flex justify-content-end">
                <a href="<?php echo $update_url ?>" class="btn btn-sm btn-primary me-1"> UPDATE</a>
                <a href="<?php echo $dlt_url ?>" class="btn btn-sm btn-danger "> DELETE</a>

            </span>

        <?php
        }

        ?>
        <h4 class="card-title text-success"><?php echo $title ?></h4>
        <h6 class=" text-muted"><?php echo $row['name'] ?></h6>
        <hr>

        <p class="card-text"></b><?php echo $description ?></p>
    </div>
    <div class="card-footer bg-white">

    </div>

</div>