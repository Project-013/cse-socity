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
                    $q = mysqli_query($conn,  "SELECT * FROM features ");
                    if (mysqli_num_rows($q) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($q)) { ?>
                    <div class="col-sm-2">
                        <form method="post" action="" class="form-horizontal p-t-20">
                            <div class="col-sm-8 m-auto">
                                <div class="form-group">
                                    <label class="form-label"><?= $row['name'] ?></label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio<?= $i ?>" name="status" value="1"
                                            class="form-check-input">
                                        <label class="form-check-label" for="customRadio<?= $i ?>">access</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio<?= $i + 1 ?>" name="status" value="0"
                                            class="form-check-input">
                                        <label class="form-check-label" for="customRadio<?= $i + 1 ?>">no access</label>
                                    </div>
                                </div>
                                <div class="form-group row m-b-0">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" name="submit"
                                            class="btn btn-success waves-effect waves-light text-white">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                            $i += 2;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>