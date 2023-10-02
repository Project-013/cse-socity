<style>
.previewIcon {
    width: 38px;
    height: 40px;
    margin-right: 1px;
}
</style>

<?php
    if(isset($_POST['submit']))
    {
        
        
        extract($_POST);
        
        if (mysqli_num_rows(mysqli_query($conn, "select * from admins where name='$name'"))) {
            $_SESSION['error'] = 'name has alerady taken!!!';
        }
        elseif (mysqli_num_rows(mysqli_query($conn, "select * from admins where email='$email'"))) {
            $_SESSION['error'] = 'email has alerady taken!!!';
        }
        elseif ($role_id == '') {
            $_SESSION['error'] = 'role_id is required';
        }
        elseif ($password == '') {
            $_SESSION['error'] = 'password is required';
        }
        elseif ($confirm_password == '') {
            $_SESSION['error'] = 'confirm_password is required';
        }
        // Validate the new password and confirm password match
        elseif ($password !== $confirm_password) {
            $_SESSION['error'] = 'New password and confirm password do not match. Please try again.';
        }
        else 
        {
            

            // Hash the new password
            $newHashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql1 = mysqli_query($conn, "INSERT INTO admins (name, email, role_id, password ) VALUES ('$name', '$email', '$role_id','$newHashedPassword')");
            if($sql1)
            {
                $_SESSION['success'] = 'Data Inserted Successfully';
            }
        }
    }

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">User</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=access-user-list"
                        class="text-danger">User</a>
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
                <h3 class="m-b-0 text-white"><b>Add New User</b></h3>
            </div>
            <div class="card-body">
                <form method="post" action="" class="form-horizontal p-t-20">
                    <div class="col-sm-8 m-auto">
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Select User*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                    <select class="form-control" name="name" id="auto_employee_id">
                                        <option value="">--select--</option>
                                        <?php
                                            $q = mysqli_query($conn, "SELECT * FROM members WHERE status=1");
                                            if (mysqli_num_rows($q) > 0) {
                                                while ($row = mysqli_fetch_assoc($q)) {
                                                    echo '<option value="' . $row['name'] . '" data-email="' . $row['email'] . '">' . $row['name'] . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Email*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-email"></i></span>
                                    <input type="email" name="email" class="form-control" id="auto_email" value=""
                                        placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Select Role*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                    <select type="text" class="form-control" name="role_id" id="exampleInputuname3">
                                        <option value="">--select--</option>
                                        <option value="1">superadmin</option>
                                        <option value="2">admin</option>
                                        <option value="3">executive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Password*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-lock"></i></span>
                                    <input type="password" name="password" class="form-control" id="exampleInputpwd4"
                                        placeholder="Enter pwd">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword5" class="col-sm-3 control-label">Re Password*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti-lock"></i></span>
                                    <input type="password" name="confirm_password" class="form-control"
                                        id="exampleInputpwd5" placeholder="Re Enter pwd">
                                </div>
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
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#employee_id').on('change', function() {
        $('#email').val($(this).find(':selected').data('email'));
    });
});
</script>