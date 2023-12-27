<?php
session_start();
include '../database/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'header-link.php'; ?>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php include 'navbar.php'; ?>
    <section class="container ptb-100">
        <h2 class=" "> Find<span class="text-info"> Result</span></h2>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="" method="GET">
                    <div class="form-group ">
                        <label for="CourseCode">Enter Your Student ID</label>
                        <input type="search" class="form-control " id="StudentID" name="StudentID" placeholder=" " required value="<?php if (isset($_GET['StudentID'])) {
                                                                                                                                        echo $_GET['StudentID'];
                                                                                                                                    } ?>">
                </form>
            </div>
        </div>

        <?php
        if (isset($_GET['StudentID'])) {
            $sql = "SELECT * FROM `results` WHERE `StudentID`=" . $_GET['StudentID'];
            $result1 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result1)
        ?>
            <div class="row my-5">
                <div class="col-md-8 mx-auto p-3 " id="sectionToPrint">
                    <div >




                        <table class="table  border border-top-0 text-dark " style="font-size: 13px;">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="">Student Name: <span class="fw-normal"><?php echo $row1['Name'] ?></span> </h6>
                                    <h6 class="">Student ID: <span class="fw-normal"><?php echo $row1['StudentID'] ?></span> </h6>
                                    <h6 class="">Program: <span class="fw-normal"><?php echo $row1['Program'] ?></span> </h6>
                                </div>

                            </div>

                            <thead class=" text-dark">
                                <tr>
                                    <th scope="col">Course Code</th>
                                    <th scope="col"> Course Title</th>
                                    <th scope="col">Credit</th>
                                    <th scope="col">Letter Grade</th>
                                    <th scope="col">Grade Point</th>
                                </tr>
                            </thead>

                            <tbody class="text-secondary bg-light">


                                <?php

                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                    <tr class=" text-dark">



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
                                            <?php echo $row['LetterGrade'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['GradePoint'] ?>
                                        </td>




                                    </tr>

                                <?php
                                }



                                ?>


                            </tbody>
                        </table>

                        <button class="btn btn-sm btn-dark" onclick="downloadPDF()">Download Result</button>



                    </div>

                </div>
            </div>

        <?php
        }

        ?>




    </section>
    <script>
        function downloadPDF() {
            // Get the element to be printed
            const element = document.getElementById('sectionToPrint');

            // Use html2pdf library to create a PDF
            html2pdf(element);
        }
    </script>
    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>
</body>


</html>