<?php
$message = '';

if (isset($_POST['notice'])) {
  $notice =  $_POST['notice'];
  $title =  $_POST['title'];

  $sql = "INSERT INTO `notice` (`notice`,`title`) VALUES ('$notice','$title')";

  if (isset($_GET['NoticeID'])) {
    $UpdateNoticeID = $_GET['NoticeID'];

    $sql = "UPDATE `notice` SET `notice`='$notice', `title`='$title' WHERE `NoticeID`='$UpdateNoticeID'";
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
  if (isset($_GET['NoticeID'])) {
    $UpdateNoticeID = $_GET['NoticeID'];

    $sql2 = "SELECT * FROM `notice` WHERE `NoticeID`=$UpdateNoticeID";
    $result2 = mysqli_query($conn, $sql2);

    $row2 = mysqli_fetch_assoc($result2);
  }


  ?>
  <div class="row justify-content-center g-3 my-2 " id="Form">
    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
      <h5 class="heading_color mb-4"><?php if (isset($UpdateNoticeID)) {
                                        echo "Updete";
                                      } else echo "Add" ?> Notice</h5>
      <form action="" method="POST">
      <div class="form-group">
          <label for="notice">Title</label>
          <input type="text" class="form-control " id="title" name="title" placeholder=" " value="<?php if (isset($row2['title'])) {
                                                                                                echo $row2['title'];
                                                                                              } ?>">
        </div>
        <div class="form-group">
          <label for="notice">Notice</label>
          <textarea class="form-control " id="notice" name="notice" rows="3" required><?php if (isset($row2['notice'])) {
                                                                                        echo $row2['notice'];
                                                                                      } ?></textarea>
        </div>
 


        <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold"><?php if (isset($UpdateNoticeID)) {
                                                                                            echo "Updete";
                                                                                          } else echo "Add" ?> </button>
      </form>

    </div>
  </div>
</div>