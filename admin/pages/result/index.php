<?php

$StudentID= "";
if(isset($_GET['StudentID']) && $_GET['StudentID']){
  $StudentID = $_GET['StudentID'];
}
?>


<div class="container">
  <div class="table-responsive my-4 bg-light shadow p-3 rounded">
    <table class="table  border border-top-0 text-dark " style="font-size: 13px;">
      <div class="d-flex justify-content-between">
        <h4 class="fw-normal heading_color">Results </h4>
        <div>
          <form action="" method="GET">
            <input type="search" name="page" value="result" id="" class="d-none">
            <input type="search" name="StudentID" id="" value="<?php echo $StudentID ?>">
            <button type="submit">search</button>
          </form>
          <a class="btn btn-sm btn-outline-dark" href="index.php?page=result-action">Add new</a>
        </div>

      </div>

      <thead class=" text-dark">
        <tr>
          <th scope="col text-dark">Student ID</th>
          <th scope="col">Name</th>
          <th scope="col">Program</th>
          <th scope="col">Semester</th>
          <th scope="col">Course Code</th>
          <th scope="col"> Course Title</th>
          <th scope="col">Credit</th>
          <th scope="col">Ecr</th>
          <th scope="col">Letter Grade</th>
          <th scope="col">Grade Point</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody class="text-secondary bg-light">

        <?php

        $sql = "SELECT * FROM `results` NATURAL JOIN `student` ORDER BY  `ResultID` DESC";
        if($StudentID){
          $sql = "SELECT * FROM `results` NATURAL JOIN `student` WHERE `StudentID`='$StudentID' ORDER BY  `ResultID` DESC";

        }
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $dlt_url = 'result/delete.php?ResultID=' . $row['ResultID'];
          $update_url = 'index.php?page=result-action&ResultID=' . $row['ResultID'];

        ?>
          <tr class=" text-dark">
            <td>
              <?php echo $row['StudentID'] ?>
            </td>
            <td>
              <?php echo $row['Name'] ?>
            </td>

            <td>
              <?php echo $row['Program'] ?>
            </td>
            <td>
              <?php echo $row['Semester'] ?>
            </td>
            <td>
              <?php echo $row['CourseCode'] ?>
            </td>
            <td>
              <?php echo $row['CourseTitle'] ?>
            </td>
            <td>
              <?php echo $row['Credit'] ?>
            </td>

            <td>
              <?php echo $row['Ecr'] ?>
            </td>
            <td>
              <?php echo $row['LetterGrade'] ?>
            </td>
            <td>
              <?php echo $row['GradePoint'] ?>
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
