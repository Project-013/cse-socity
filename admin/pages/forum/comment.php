<?php
$message = '';

?>


<div class="container">
  <div class="table-responsive">

  <table class="table  border border-top-0 text-dark" style="font-size: 13px;">
    <h4 class="fw-normal heading_color mt-3">Forum comments</h4>

    <thead class=" text-dark">
      <tr>
        <th scope="col text-dark">Comment</th>
        <th scope="col">Author</th>
        <th scope="col">Forum</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody class="text-secondary bg-light">

      <?php
      $sql = "SELECT * FROM `comments` NATURAL JOIN `user` ";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $id  = $row['CommentID'];
        $comment    = $row['comment'];
        $author    = $row['name'];
        $ForumID    = $row['ForumID'];


        $dlt_url = 'forum/delete.php?CommentID=' . $id;
        $forum_url = '/cse-socity/website/forum-post.php?id=' . $ForumID;

      ?>
        <tr class=" text-dark">
          <td>
            <?php echo $comment ?>
          </td>
          <td>
            <?php echo $author ?>
          </td>
          <td>
            <a href="<?php echo $forum_url ?>" class="btn btn-sm btn-outline-dark" target="_blank">View</a>
          </td>

          <td class="d-flex ">
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