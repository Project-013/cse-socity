<?php
$message = '';

?>


<div class="container">
  <div class="table-responsive">

  <table class="table  border border-top-0 text-dark" style="font-size: 13px;">
    <h4 class="fw-normal heading_color mt-3">Forum posts</h4>

    <thead class=" text-dark">
      <tr>
        <th scope="col text-dark">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Short Description</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody class="text-secondary bg-light">

      <?php
      $sql = "SELECT * FROM `forum` NATURAL JOIN `user` ORDER BY  `ForumID` DESC";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $id  = $row['ForumID'];
        $title    = $row['title'];
        $short_description    = $row['short_description'];
        $description    = $row['description'];
        $author    = $row['name'];
        $status    = $row['status'];


        $dlt_url = 'forum/delete.php?id=' . $id;
        $update_url = 'forum/update.php?id=' . $id;

      ?>
        <tr class=" text-dark">
          <td>
            <?php echo $title ?>
          </td>
          <td>
            <?php echo $author ?>
          </td>
          <td>
            <?php echo $short_description ?>
          </td>
          <td>
            <?php echo $description ?>
          </td>
          <td>
            <?php echo $status ?>
          </td>

     


          <td class="d-flex ">
            <?php
            if($status=="pending"){
              ?>
               <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded text-primary" href="<?php echo $update_url ?>"> <i class="fa fa-check text-primary" aria-hidden="true"></i></a>

              <?php
            }

            ?>
           
            <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded" href="<?php echo $dlt_url ?>">  <i class="fa fa-trash text-primary" aria-hidden="true"></i></a>
          </td>
        </tr>

      <?php
      }



      ?>


    </tbody>
  </table>
  </div>

</div>