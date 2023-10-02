<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Access Feature</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Access
                    Feature
                </li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Access Feature</b></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $admin_id = $_GET['id'];
                    $q = mysqli_query($conn, "SELECT * FROM features");
                    if (mysqli_num_rows($q) > 0) {
                        while ($row = mysqli_fetch_assoc($q)) {
                            $feature_id = $row['id'];
                            $status = 0; // Default status

                            // Check if form is submitted for this feature
                            if (isset($_POST['submit_' . $feature_id])) {
                                $status = $_POST['status_' . $feature_id];
                                

                                // Update the feature status in the database
                                mysqli_query($conn, "UPDATE access_features SET status = $status WHERE feature_id = $feature_id AND admin_id = $admin_id");
                                $_SESSION['success'] = 'Access1 Change Successfully';
                            } else {
                                // Check if the feature is already accessed by the admin
                                $access_query = mysqli_query($conn, "SELECT * FROM access_features WHERE feature_id = $feature_id AND admin_id = $admin_id");
                                
                                if (mysqli_num_rows($access_query) > 0) {
                                    $access_row = mysqli_fetch_assoc($access_query);
                                    $status = $access_row['status'];
                                } else {
                                    // Insert the feature into access_features table for the admin
                                    mysqli_query($conn, "INSERT INTO access_features (admin_id, feature_id, status) VALUES ($admin_id, $feature_id, $status)");
                                    $_SESSION['success'] = 'Access3 Change Successfully';
                                }
                            }
                            ?>
                    <div class="col-sm-2 bordered shadow p-4">
                        <form method="post" action="" class="form-horizontal p-t-20">
                            <div class="col-sm-12">
                                <div class="form-group text-center">
                                    <label class="form-label "><b><?= $row['name'] ?></b></label>
                                    <div class="custom-control custom-radio text-center">
                                        <input type="radio" id="customRadio<?= $feature_id ?>_1"
                                            name="status_<?= $feature_id ?>" value="1" class="form-check-input"
                                            <?php if ($status == 1) echo 'checked'; ?>>
                                        <label class="form-check-label " for="customRadio<?= $feature_id ?>_1"><i
                                                class="ti-check"></i></label>

                                        <input type="radio" id="customRadio<?= $feature_id ?>_0"
                                            name="status_<?= $feature_id ?>" value="0" class="form-check-input"
                                            <?php if ($status == 0) echo 'checked'; ?>>
                                        <label class="form-check-label" for="customRadio<?= $feature_id ?>_0"><i
                                                class=" ti-close"></i></label>
                                    </div>
                                    <!-- <div class="custom-control custom-radio">

                                    </div> -->

                                </div>
                                <div class="form-group row m-b-0">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit_<?= $feature_id ?>"
                                            class="btn btn-success waves-effect waves-light text-white w-100">Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>