<style>
.img-wrapper {
    border: 1px solid;
    padding: 0;
    border-radius: 6px;
    overflow: hidden;
    height: 310px;
}

.img-wrapper input {
    background: ;
    width: 100%;
    padding: 2px;
    border-bottom: 1px solid;
}

.img-wrapper .preview {
    width: 100% !important;
    height: 100% !important;
}

.border-image {
    border: 1px solid #e7515a !important;
}

#drop-zone {
    max-width: 450px;
    height: 225px;
    border: 2px dotted blue;
    display: flex;
    justify-content: center;
    align-items: center;
}

#drop-zone img {
    object-fit: cover;
    width: 100%;
    height: 100%;
    display: none;
}

.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    max-width: 100%;
    /* padding: 25px; */
    border: 1px solid;
    border-radius: 3px;
    transition: .2s;
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    widows: 100%;
    cursor: pointer;
    opacity: 0
}
</style>

<?php
    if(isset($_POST['submit']))
    {
        
        
        extract($_POST);
        
      
        // Retrieve uploaded images
        $uploadedImages = $_FILES['images'];

        // Define the upload directory
        $uploadDirectory = 'uploads/gallery/';

        // Array to store the uploaded image paths
        $imagePaths = array();

        // Loop through the uploaded images
        foreach ($uploadedImages['tmp_name'] as $key => $tmp_name) {
            $imageFileName = $uploadedImages['name'][$key];
            $imageFilePath = $uploadDirectory . $imageFileName;

            // Move the uploaded image to the destination directory
            move_uploaded_file($tmp_name, $imageFilePath);

            // Add the image path to the array
            $imagePaths[] = $imageFilePath;
        }

        // Convert the image paths to a comma-separated string
        $imageString = implode(',', $imagePaths);

        $sql1 = mysqli_query($conn, "INSERT INTO gallery (images) VALUES ('$imageString')");
        if($sql1)
        {
            $_SESSION['success'] = 'Images uploaded successfully!';
        }
           
        
    }

   
?>




<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Gallery</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="index.php?page=gallery-list" class="text-danger">Gallery</a>
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
                <h3 class="m-b-0 text-white"><b>Add New Gallery</b></h3>
            </div>
            <div class="card-body">
                <form class="" method="POST" enctype="multipart/form-data">
                    <!-- <input type="hidden" name="id" value=""> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group d-flex flex-column">
                                    <div class="input-group-prepend w-100">
                                        <span class="input-group-text w-100" id="basic-addon5">Upload More
                                            more_</span>
                                    </div>
                                    <div class="file-drop-area">
                                        <span class="choose-file-button">Choose Files</span>
                                        <span class="file-message">or drag and drop files here</span>
                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif"
                                            name="images[]" multiple>
                                    </div>

                                    <div id="divImageMediaPreview"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <button name="submit" type="submit" class="btn w-100 btn-success">Add New
                                gallery</button>
                        </div>



                    </div>

                </form>
            </div>
        </div>
    </div>
</div>