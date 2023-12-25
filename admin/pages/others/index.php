<?php
$message = '';


?>


<div class="container ">

  <div class="row my-5">
    <div class="col-md-6 ">
      <div class="bg-light p-3 shadow rounded table-responsibe m-2">

        <table class="table  border border-top-0 text-dark" style="font-size: 13px;">
          <div class="d-flex justify-content-between my-3">
            <h4 class="fw-bold">Newsletter</h4>


          </div>

          <thead class=" text-dark">
            <tr>
              <th scope="col text-dark">Email</th>
              <th scope="col text-dark">Action</th>
            </tr>
          </thead>

          <tbody class="text-secondary bg-light">

            <?php
            $sql = "SELECT * FROM `newslatter` ORDER BY  `id` DESC";
            $result = mysqli_query($conn, $sql);
            $emails = "";
            while ($row = mysqli_fetch_assoc($result)) {
              $id  = $row['id'];
              $email  = $row['email'];
              $emails = $emails . $email . ';';
              $dlt_url = 'others/delete.php?id=' . $id . '&type=newslatter';

            ?>
              <tr class=" text-dark">
                <td>
                  <?php echo $email ?>
                </td>


                <td class="d-flex ">
                  <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded" href="<?php echo $dlt_url ?>"> <i class="fa fa-trash text-primary" aria-hidden="true"></i></a>
                </td>
              </tr>

            <?php
            }


            ?>


          </tbody>
        </table>
        <div class="d-flex justify-content-center my-5">
          <a href="mailto: <?php echo $emails ?>" class="btn btn-lg btn-success rounded-pill">Send News</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 ">
      <div class="bg-light p-3 shadow rounded table-responsibe m-2">
        <table class="table  border border-top-0 text-dark " style="font-size: 13px;">
          <h4 class="my-3 fw-bold">Feedback</h4>

          <thead class=" text-dark">
            <tr>
              <th scope="col text-dark">Feedback</th>
              <th scope="col text-dark">Action</th>
            </tr>
          </thead>

          <tbody class="text-secondary bg-light">

            <?php
            $sql = "SELECT * FROM `feedback` ORDER BY  `id` DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $id  = $row['id'];
              $details  = $row['details'];
              $dlt_url = 'others/delete.php?id=' . $id . '&type=feedback';


            ?>
              <tr class=" text-dark">
                <td>
                  <?php echo $details ?>
                </td>


                <td class="d-flex ">
                  <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded" href="<?php echo $dlt_url ?>"> <i class="fa fa-trash text-primary" aria-hidden="true"></i></a>
                </td>
              </tr>

            <?php
            }


            ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>


</div>