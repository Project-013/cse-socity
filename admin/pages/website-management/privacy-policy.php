<?php
    if(isset($_POST['submit']))
    {
        // $id = $_POST["id"];
        // $privacy_policy = $_POST["privacy_policy"];
        extract($_POST);
        if ($privacy_policy == '') 
        {
            $_SESSION['error'] = 'Field is required';
        } 
        else 
        {
            $result = mysqli_query($conn, "SELECT id FROM summeries");
            if (mysqli_num_rows($result) > 0) {
              // If a row already exists, update the existing row
              $row = mysqli_fetch_assoc($result);
              $id = $row["id"];
              $sql = "UPDATE summeries SET privacy_policy='$privacy_policy' WHERE id=$id";
              $run = mysqli_query($conn, $sql);
              if($run)
              {
                  $_SESSION['success'] = 'Data Updated Successfully';
              }
            } else {
              // If no row exists, insert a new row
              $sql = "INSERT INTO summeries (privacy_policy) VALUES ('$privacy_policy')";
              $run =  mysqli_query($conn, $sql);
              if($run)
                {
                    $_SESSION['success'] = 'Data Inserted Successfully';
                }
            }
        }
    }

    $result = mysqli_query($conn, "SELECT * FROM summeries WHERE id = 1");
    $row = mysqli_fetch_assoc($result);
   
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Privacy & Policy</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Privacy & Policy</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Privacy & Policy</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Details<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="privacy_policy" rows="6" id="editor1"
                                            placeholder="text here.."><?= $row ? $row['privacy_policy'] : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button name="submit" type="submit" class="btn w-100 btn-outline-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>