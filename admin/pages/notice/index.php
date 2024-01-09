<?php
$message = '';

if (isset($_POST['notice'])) {
  $notice =  $_POST['notice'];
  $title =  $_POST['title'];
  $img = "";
  if (isset($_FILES['img']['name'])) {
    $img =  $_FILES['img']['name'];
    $tmp_img_name =  $_FILES['img']['tmp_name'];
    $path = "img/";
    if (!is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($tmp_img_name, $path . "/" . $img);
  }
  $pdf = "";
  if (isset($_FILES['pdf']['name'])) {
    $pdf =  $_FILES['pdf']['name'];
    $tmp_pdf_name =  $_FILES['pdf']['tmp_name'];
    $path = "pdf/";
    if (!is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($tmp_pdf_name, $path . "/" . $pdf);
  }

  $sql = "INSERT INTO `notice` (`notice`,`title`,`img`,`pdf`) VALUES ('$notice','$title','$img','$pdf')";

  if (isset($_GET['NoticeID'])) {
    $UpdateNoticeID = $_GET['NoticeID'];
    $sql2 = "SELECT * FROM `notice` WHERE `NoticeID`=$UpdateNoticeID";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    if (!$_FILES['img']['name']) {
      $img = $row2['img'];
    }
    if (!$_FILES['pdf']['name']) {
      $pdf = $row2['pdf'];
    }

    $sql = "UPDATE `notice` SET `notice`='$notice', `title`='$title',`pdf`='$pdf', `img`='$img' WHERE `NoticeID`='$UpdateNoticeID'";
  }
  $result = mysqli_query($conn, $sql);
}

?>


<div class="container  my-5">
  <table class="table border border-top-0 text-dark" style="font-size: 13px;">
    <div class="d-flex justify-content-between">

      <h4 class="fw-normal heading_color">Notice Board</h4>
      <div>
        <a href="#form" class="btn btn-sm btn-outline-dark">add new</a>
      </div>
    </div>

    <thead class=" text-dark">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Notice</th>
        <th scope="col">Image</th>
        <th scope="col">PDF</th>
        <th scope="col">Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody class="text-secondary bg-light">

      <?php
      $sql = "SELECT * FROM `notice` ORDER BY  `NoticeID` DESC";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $NoticeID  = $row['NoticeID'];
        $dlt_url = 'notice/delete.php?NoticeID=' . $NoticeID;
        $update_url = 'index.php?page=notice&NoticeID=' . $NoticeID . '#form';

      ?>
        <tr class=" text-dark">
          <td>
            <?php echo $row['title'] ?>
          </td>
          <td>
            <?php echo $row['notice'] ?>
          </td>
          <td>
            <img class="pointer " style="max-width:100px" src="img/<?php echo $row['img'] ?>" />
          </td>
          <td>
            <a class="pointer " style="max-width:100px" target="_blank" href="pdf/<?php echo $row['pdf'] ?>">View PDF<a />
          </td>

          <td>
            <?php echo $row['timestamp'] ?>
          </td>


          <td class="d-flex ">
            <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded" href="<?php echo $update_url ?>"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
            <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded" href="<?php echo $dlt_url ?>"> <i class="fa fa-trash text-primary" aria-hidden="true"></i></a>
          </td>
        </tr>

      <?php
      }


      ?>


    </tbody>
  </table>
  <?php



  ?>
  <div class="row justify-content-center g-3 my-2 " id="Form">
    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
      <h5 class="heading_color mb-4"><?php if (isset($UpdateNoticeID)) {
                                        echo "Updete";
                                      } else echo "Add" ?> Notice</h5>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="notice">Title</label>
          <input type="text" class="form-control " id="title" name="title" placeholder=" " value="<?php if (isset($row2['title'])) {
                                                                                                    echo $row2['title'];
                                                                                                  } ?>">
        </div>
        <div class="form-group">
          <label for="notice">Notice</label>
          <textarea class="form-control " id="editor1" name="notice" rows="3"><?php if (isset($row2['notice'])) {
                                                                                echo $row2['notice'];
                                                                              } ?></textarea>
        </div>

        <div class="form-group">
          <label for="pdf">Upload PDF (optional)</label>
          <input type="file" name="pdf" class="form-control-file" accept=".pdf" id="pdf" />
        </div>
        <div class="card">
          <div class="card-body">
            <label for="pdf">Upload Image (optional)</label>

            <input type="file" class="dropify" name="img" accept=".png, .jpg, .jpeg" id="input-file-now-custom-1" data-default-file="" data-height="100" />

          </div>
        </div>


        <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold"><?php if (isset($UpdateNoticeID)) {
                                                                                            echo "Updete";
                                                                                          } else echo "Add" ?> </button>
      </form>

    </div>
  </div>
</div>