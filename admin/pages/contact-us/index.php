<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Contact List</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Contact List</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Contact List</b></h3>

            </div>
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name & Subject</th>
                                <th>contact Info</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $q = mysqli_query($conn,  "SELECT * FROM contact_us ");
                        if (mysqli_num_rows($q) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($q)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <h5>
                                        <b>
                                            name: <?= $row['name'] ?><br>
                                            sub: <?= $row['subject'] ?>
                                        </b>
                                    </h5>
                                </td>
                                <td>
                                    <small>phone:<?= $row['phone'] ?><br>
                                        email: <?= $row['email'] ?></small>
                                </td>
                                <td>
                                    <small>
                                        <?= $row['message'] ?>
                                    </small>
                                </td>
                            </tr>
                            <?php $i++;} } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>