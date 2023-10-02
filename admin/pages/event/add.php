<style>
.previewIcon {
    width: 38px;
    height: 40px;
    margin-right: 1px;
}
</style>

<?php
    // function generateSlug($str) {
    //     $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $str), '-'));
    //     return $slug;
    //   }
    
    if(isset($_POST['submit']))
    {
        
        
        extract($_POST);
        
      
        if ($title == '') {
            $_SESSION['error'] = 'Title is required';
        }
        elseif ($date == '') {
            $_SESSION['error'] = 'Date is required';
        }
        elseif ($location == '') {
            $_SESSION['error'] = 'location is required';
        }
        elseif ($time_range == '') {
            $_SESSION['error'] = 'time_range is required';
        }
        elseif ($contact_email == '') {
            $_SESSION['error'] = 'contact_email is required';
        }
        elseif ($contact_number == '') {
            $_SESSION['error'] = 'contact_number is required';
        }
        elseif ($organizer_name == '') {
            $_SESSION['error'] = 'organizer_name is required';
        } else {
            // Generate a slug from the title manually
            $slug = strtolower(str_replace(' ', '-', $title));

            // Remove any non-alphanumeric characters from the slug
            $slug = preg_replace('/[^A-Za-z0-9-]/', '', $slug);
    
            if ($_FILES["cover_image"]["name"]) {
        
                // Upload new cover_image file
                $cover_image = "uploads/event/"  . ($_FILES["cover_image"]["name"]);
                if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $cover_image)) {
                    // Save data to database
                    $sql = mysqli_query($conn, "INSERT INTO posts (cover_image, title, location, tag, date, time_range, contact_email, contact_number, organizer_name,  organizer_link, details, slug, type) VALUES ('$cover_image', '$title', '$location', '$tag','$date', '$time_range', '$contact_email', '$contact_number', '$organizer_name', '$organizer_link','$details', '$slug', 'event')");
                    if($sql)
                    {
                        $_SESSION['success'] = 'Data Inserted Successfully';
                    }     
                }
            }
            else 
            {
                $sql1 = mysqli_query($conn, "INSERT INTO posts (title, tag, date, time_range, contact_email, contact_number, organizer_name,  organizer_link, details, slug, type) VALUES ('$title', '$tag','$date', '$time_range', '$contact_email', '$contact_number', '$organizer_name', '$organizer_link','$details', '$slug', 'event')");
                if($sql1)
                {
                    $_SESSION['success'] = 'Data Inserted Successfully';
                }
            }
        }
    }

   
?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Event</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=event-list" class="text-danger">Event</a>
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
                <h3 class="m-b-0 text-white"><b>Add New Event</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <label for="">Upload cover_image</label> -->
                                        <input type="file" class="dropify" name="cover_image"
                                            id="input-file-now-custom-1" data-default-file="" data-height="300" />
                                        <!-- <input type="hidden" name="old_image"
                                            value=""> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Title<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="title" class="form-control"
                                            id="validationCustomUsername" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Tag<span
                                                    class="text-danger"></span></span>
                                        </div>
                                        <input type="text" name="tag" class="form-control" id="validationCustomUsername"
                                            placeholder="Tag">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Location<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="location" class="form-control"
                                            id="validationCustomUsername" placeholder="Location">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Date<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="date" class="form-control" placeholder="2017-06-04"
                                            id="mdate">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Time Range<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="time_range" class="form-control"
                                            id="validationCustomUsername" placeholder="Time Range">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Contact Number<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="contact_number" class="form-control"
                                            id="validationCustomUsername" placeholder="+0881111..">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Contact Email<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="email" name="contact_email" class="form-control"
                                            id="validationCustomUsername" placeholder="demo@gmail.com..">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Organizer Name<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="organizer_name" class="form-control"
                                            id="validationCustomUsername" placeholder="Organizer Name">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">Organizer Link<span
                                                    class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="organizer_link" class="form-control"
                                            id="validationCustomUsername" placeholder="Organizer Link">
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><span class="text-danger"></span></label>
                                                <textarea class="form-control" name="details" rows="6" id="editor3"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Dropzone</h4>
                                            <h6 class="card-subtitle">For multiple file upload put class
                                                <code>.dropzone</code> to form.</h6>
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-12 mt-2">
                                    <button name="submit" type="submit" class="btn w-100 btn-outline-success">Add New
                                        Event</button>
                                </div>
                            </div>
                        </div>



                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
imgInp1.onchange = evt => {
    const [file] = imgInp1.files;
    if (file) {
        preview1.src = URL.createObjectURL(file)
    }
}
</script>