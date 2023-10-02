<?php
    if(isset($_POST['submit']))
    {
        // $id = $_POST["id"];
        // $privacy_policy = $_POST["privacy_policy"];
        extract($_POST);
        if ($question == '') 
        {
            $_SESSION['error'] = 'Question is required';
        } 
        elseif($answer == '') {
            $_SESSION['error'] = 'Answer is required';
        }
        else 
        {
            // If no row exists, insert a new row
            $sql = mysqli_query($conn, "UPDATE faqs SET question='$question', answer='$answer' WHERE id='".$_GET['id'] ."'");
            if($sql)
            {
                $_SESSION['success'] = 'Data Updated Successfully';
            }
        }
    }
    $result = mysqli_query($conn, 'SELECT * FROM faqs WHERE id="' . $_GET['id'] . '"');
    $row = mysqli_fetch_assoc($result);
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">FAQs</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">FAQs</li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><b>Update FAQs</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Question<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="question" rows="2"
                                            placeholder="Question here..?"><?= $row['question'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Answer<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="answer" rows="6" id="editor1"
                                            placeholder="Answer here.."><?= $row['answer'] ?></textarea>
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