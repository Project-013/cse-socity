<?php
?>


<div class="container">
  <div class="table-responsive my-4 bg-light shadow p-3 rounded">
    <table class="table  border border-top-0 text-dark " style="font-size: 13px;">
      <div class="d-flex justify-content-between">
        <h4 class="fw-normal heading_color">Students</h4>
        <div>
          <a class="btn btn-sm btn-outline-dark" href="index.php?page=student-action">Add new</a>
        </div>

      </div>

      <thead class=" text-dark">
        <tr>
          <th scope="col text-dark">Student ID</th>
          <th scope="col">Name</th>
          <th scope="col">Birthday</th>
          <th scope="col">Program</th>
          <th scope="col">session</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody class="text-secondary bg-light">

        <?php
        $sql = "SELECT * FROM `student` ORDER BY  `StudentID` DESC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $dlt_url = 'student/delete.php?StudentID='.$row['StudentID'];
          $update_url = 'index.php?page=student-action&StudentID='.$row['StudentID'];

        ?>
          <tr class=" text-dark">
            <td>
              <?php echo $row['StudentID'] ?>
            </td>
            <td>
              <?php echo $row['Name'] ?>
            </td>
            <td>
              <?php echo $row['Birthday'] ?>
            </td>

            <td>
              <?php echo $row['Program'] ?>
            </td>
            <td>
              <?php echo $row['session'] ?>
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
  </div>



</div>