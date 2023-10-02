<?php include 'sections/breadcrumb.php'; ?>
<?php 
    $result = mysqli_query($conn, 'SELECT * FROM members WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);
 ?>
<div class="courses-details-area pt-100 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="courses-details">
                    <div class="courses-card">
                        <div class="img mt-4">
                            <img src="<?= $row ? '../admin/pages/'.$row['avatar'] : ''?>"
                                style="object-fit:cover;height:300px;width:100%" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="enroll-courses">
                    <div class="list">
                        <ul>
                            <li><span>Name :</span><?= $row['name'] ?></li>
                            <li><span>Email :</span><?= $row['email'] ?></li>
                            <li><span>Semester No. :</span><?= $row['semester_no'] ?><sup>th</sup></li>
                            <li><span>ID :</span><?= $row['registration_id'] ?></li>
                            <li><span>Contact :</span><?= $row['phone'] ?></li>
                            <li><span>Designation :</span><?= $row['designation'] ?></li>
                            <li><span>Address :</span><?= $row['address'] ?></li>
                            <li><span>Language :</span>Bangla/English</li>

                        </ul>
                    </div>
                    <a href="index.php?page=executive-member" class="default-btn btn">Back</a>
                </div>
            </div>
            <div class="col-lg-5 ">
                <div class="description mt-4">
                    <?= $row['details'] ?>
                </div>
            </div>

        </div>
    </div>
</div>