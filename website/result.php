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
                <form action="" method="GET" class="d-flex">
                    <div class="form-floating">
                        <input type="text" class="form-control " id="StudentID" name="StudentID" placeholder=" " required value="<?php if (isset($_GET['StudentID'])) {
                                                                                                                                        echo $_GET['StudentID'];
                                                                                                                                    } ?>">
                        <label for="CourseCode">Student ID</label>
                    </div>
                    <div class="form-floating  mx-2">
                        <input type="date" class="form-control " id="Birthday" name="Birthday" placeholder=" " required value="<?php if (isset($_GET['Birthday'])) {
                                                                                                                                    echo $_GET['Birthday'];
                                                                                                                                } ?>">
                        <label for="CourseCode">Date of birth</label>
                    </div>
                    <div class=""> <button class="btn btn-success btn-sm d-block" type="submit">FETCH RESULTS</button></div>

                </form>
            </div>
        </div>

        <?php
        if (isset($_GET['StudentID'])) {

            $StudentID = $_GET['StudentID'];
            $Birthday = $_GET['Birthday'];

            $sql = "SELECT * FROM `results` NATURAL JOIN `student` WHERE `StudentID`='$StudentID' AND `Birthday` = '$Birthday'";
            $result1 = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_assoc($result1);
            $total = mysqli_num_rows($result1);

            $sql_total_credit = "SELECT SUM(Ecr) AS total_credit_hours FROM `results` NATURAL JOIN `student` WHERE `StudentID`='$StudentID' AND `Birthday` = '$Birthday'";
            $result_total_credit = mysqli_query($conn, $sql_total_credit);
            $row_total_credit = mysqli_fetch_assoc($result_total_credit);

            $sql_total_grade = "SELECT SUM(Ecr*GradePoint) AS total_grade FROM `results` NATURAL JOIN `student` WHERE `StudentID`='$StudentID' AND `Birthday` = '$Birthday'";
            $result_total_grade = mysqli_query($conn, $sql_total_grade);
            $row_total_grade = mysqli_fetch_assoc($result_total_grade);


            $cgpa = $row_total_grade['total_grade'] / $row_total_credit['total_credit_hours'];


            if ($total) {
        ?>
                <div class="row my-5">
                    <div class="col-md-9 mx-auto p-3">
                        <div id="sectionToPrint">
                            <table class="table  border border-top-0 text-dark small">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="">Student Name: <span class="fw-normal"><?php echo $row1['Name'] ?></span> </h6>
                                            <h6 class="">Student ID: <span class="fw-normal"><?php echo $row1['StudentID'] ?></span> </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="">Program: <span class="fw-normal"><?php echo $row1['Program'] ?></span> </h6>
                                            <h6 class="">CGPA: <span class="fw-normal"><?php echo number_format($cgpa, 2) ?></span> </h6>
                                        </div>
                                    </div>
                                </div>

                                <thead class=" text-dark">
                                    <tr>
                                        <th scope="col">Course Code</th>
                                        <th scope="col"> Course Title</th>
                                        <th scope="col">Ecr</th>
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
                                                <?php echo $row['Ecr'] ?>
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


                        </div>
                    </div>
                    <div><button class="btn btn-sm btn-dark mx-auto d-block" onclick="downloadPDF()">Download Result</button></div>

                </div>

            <?php
            } else {
            ?>
                <div class="alert alert-danger my-5" role="alert">
                    Not Found!
                </div>
        <?php
            }
        }

        ?>




    </section>
    <script>
        function downloadPDF() {
            // Get the element to be printed
            const element = document.getElementById('sectionToPrint');
            var opt = {
                margin: 0.25,
                filename: 'result.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf()
                .set(opt)
                .from(element)
                .outputPdf('blob')
                .then((pdf) => {
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(pdf);
                    link.download = 'downloaded.pdf';
                    link.click();
                });


            // html2pdf().set(opt).from(element).save();


        }
    </script>
    <?php include 'footer.php'; ?>
    <?php include 'footer-link.php'; ?>

</body>


</html>