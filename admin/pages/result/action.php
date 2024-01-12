<?php



$gradeRanges = [
    'A+' => "4.00",
    'A' => "3.75",
    'A-' => "3.50",
    'B+' => "3.25",
    'B' => "3.00",
    'B-' => "2.75",
    'C+' => "2.50",
    'C' => "2.25",
    'D' => "2.00",
    'F' => "0.00",
];


if (isset($_POST['StudentID'])) {
    $StudentID =  $_POST['StudentID'];
    $Semester =  $_POST['Semester'];
    $CourseCode =  $_POST['CourseCode'];
    $CourseTitle =  $_POST['CourseTitle'];
    $Credit =  $_POST['Credit'];
    $Ecr =  $_POST['Ecr'];
    // $GradePoint =  $_POST['GradePoint'];
    $LetterGrade =  $_POST['LetterGrade'];
    $GradePoint = $gradeRanges[$LetterGrade];


    $sql = "INSERT INTO `results`(`StudentID`, `Semester`,  `CourseCode`, `CourseTitle`, `Credit`, `Ecr`, `LetterGrade`, `GradePoint`) VALUES ('$StudentID','$Semester','$CourseCode','$CourseTitle','$Credit','$Ecr','$LetterGrade','$GradePoint')";

    if (isset($_GET['ResultID'])) {
        $UpdateResultID = $_GET['ResultID'];

        $sql = "UPDATE `results` SET `StudentID`='$StudentID',`Semester`='$Semester',`CourseCode`='$CourseCode',`CourseTitle`='$CourseTitle',`Credit`='$Credit',`Ecr`='$Ecr',`LetterGrade`='$LetterGrade',`GradePoint`='$GradePoint' WHERE `ResultID`='$UpdateResultID'";
    }



    $result = mysqli_query($conn, $sql);
}


if (isset($_FILES['csv'])) {
    if ($_FILES["csv"]["error"] > 0) {
        echo "Error: " . $_FILES["csv"]["error"];
    } else {
        // Read CSV file
        $tmp_name =  $_FILES['csv']['tmp_name'];
        $handle = fopen($tmp_name, "r");

        // Open the CSV file for reading

        // Check if the file was opened successfully
        if ($handle !== false) {
            // Read each row from the CSV file
            while (($row = fgetcsv($handle)) !== false) {
                // $row is an array containing the fields in the current row
                // Process the data as needed

                if ($row[0] != 'Student ID') {
                    $StudentID =  $row[0];
                    $Semester =  $row[6];
                    $CourseCode =  $row[1];
                    $CourseTitle =  $row[5];
                    $Credit =  $row[2];
                    $Ecr =  $row[3];
                    $LetterGrade =  $row[4];
                    $GradePoint = $gradeRanges[$LetterGrade];
                    $sql = "INSERT INTO `results`(`StudentID`, `Semester`,`CourseCode`, `CourseTitle`, `Credit`, `Ecr`, `LetterGrade`, `GradePoint`) VALUES ('$StudentID','$Semester','$CourseCode','$CourseTitle','$Credit','$Ecr','$LetterGrade','$GradePoint')";
                    $result = mysqli_query($conn, $sql);
                    // echo $sql;
                    // echo "<br>";


                }
            }

            // Close the file when done
            fclose($handle);
        } else {
            // Handle the case when the file cannot be opened
            echo "Error: Unable to open the CSV file.";
        }
    }
}



if (isset($result)) {

?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        Success
    </div>
<?php

}



if (isset($_GET['ResultID'])) {
    $UpdateResultID = $_GET['ResultID'];

    $sql_result = "SELECT * FROM `results` WHERE `ResultID`=$UpdateResultID";
    $result2 = mysqli_query($conn, $sql_result);

    $row3 = mysqli_fetch_assoc($result2);
}


?>


<div class="row justify-content-center g-3 my-2 ">
    <div class="col-md-9 bg-white shadow-lg rounded p-4">
        <h3 class="heading_color mb-4"> <?php if (isset($UpdateResultID)) {
                                            echo "Updete";
                                        } else echo "Add" ?> Result</h3>
        <form action="" method="post" class="row">
            <div class="form-group col-md-4">
                <label for="StudentID">Student ID</label>
                <input type="text" class="form-control form-control-sm" id="StudentID" name="StudentID" placeholder=" " value="<?php if (isset($row3['StudentID'])) {
                                                                                                                                    echo $row3['StudentID'];
                                                                                                                                } ?>" list="StudentList" required>
                <datalist id="StudentList">

                    <?php

                    $sql_student = "SELECT * FROM `student` ORDER BY  `StudentID` DESC";
                    $result_student = mysqli_query($conn, $sql_student);
                    while ($row_student = mysqli_fetch_assoc($result_student)) {
                    ?>
                        <option><?php echo $row_student['StudentID'] ?></option>
                    <?php
                    }
                    ?>
                </datalist>


            </div>
            <div class="form-group col-md-4">
                <label for="Name">Semester</label>
                <input type="text" class="form-control form-control-sm" id="Semester" name="Semester" placeholder=" " value="<?php if (isset($row3['Semester'])) {
                                                                                                                                    echo $row3['Semester'];
                                                                                                                                } ?>" required>
            </div>

            <div class="form-group col-md-4">
                <label for="CourseCode">Course Code</label>
                <input type="text" class="form-control form-control-sm" id="CourseCode" name="CourseCode" placeholder=" " required value="<?php if (isset($row3['CourseCode'])) {
                                                                                                                                                echo $row3['CourseCode'];
                                                                                                                                            } ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="CourseTitle">Course Title</label>
                <input type="text" class="form-control form-control-sm" id="CourseTitle" name="CourseTitle" placeholder=" " required value="<?php if (isset($row3['CourseTitle'])) {
                                                                                                                                                echo $row3['CourseTitle'];
                                                                                                                                            } ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="Credit">Credit</label>
                <input type="text" class="form-control form-control-sm" id="Credit" name="Credit" placeholder=" " required list="CreditList" value="<?php if (isset($row3['Credit'])) {
                                                                                                                                                        echo $row3['Credit'];
                                                                                                                                                    } ?>">
                <datalist id="CreditList">
                    <option>3.00</option>
                    <option>2.00</option>
                    <option>1.50</option>
                    <option>0.00</option>
                </datalist>
            </div>
            <div class="form-group col-md-4">
                <label for="Credit">Ecr</label>
                <input type="text" class="form-control form-control-sm" id="Ecr" name="Ecr" placeholder=" " required list="CreditList" value="<?php if (isset($row3['Ecr'])) {
                                                                                                                                                    echo $row3['Ecr'];
                                                                                                                                                } ?>">
                <datalist id="CreditList">
                    <option>3.00</option>
                    <option>2.00</option>
                    <option>1.50</option>
                    <option>0.00</option>
                </datalist>
            </div>
            <!-- <div class="form-group col-md-4 d-none">
                <label for="GradePoint">Grade Point</label>
                <input type="text" class="form-control form-control-sm" id="GradePoint" name="GradePoint" placeholder=" " required list="PointList" >
                <datalist id="PointList">
                    <option>4.00</option>
                    <option>3.75</option>
                    <option>3.50</option>
                    <option>3.25</option>
                    <option>3.00</option>
                    <option>2.75</option>
                    <option>2.50</option>
                    <option>2.25</option>
                    <option>2.00</option>
                    <option>0.00</option>
                </datalist>
            </div> -->
            <div class="form-group col-md-4 ">
                <label for="LetterGrade">Letter Grade</label>
                <input type="text" class="form-control form-control-sm" id="LetterGrade" list="LetterGradeList" name="LetterGrade" placeholder=" " required value="<?php if (isset($row3['LetterGrade'])) {
                                                                                                                                                                        echo $row3['LetterGrade'];
                                                                                                                                                                    } ?>">
                <datalist id="LetterGradeList">
                    <option>A+</option>
                    <option>A</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B</option>
                    <option>B-</option>
                    <option>C+</option>
                    <option>C</option>
                    <option>D</option>
                    <option>F</option>
                </datalist>
            </div>



            <button type="submit" id="submit" class="btn btn-dark btn-sm my-3  fw-bold">

                <?php if (isset($UpdateResultID)) {
                    echo "Updete";
                } else echo "Add" ?>
            </button>
        </form>

        <h6>or</h6>

        <form action="" method="post" class="my-5" id="csvForm" enctype="multipart/form-data">
            <div class="mb-3">
                <h4 class="mb-3">Upload CSV</h4>
                <input type="file" name="csv" id="csv" accept=".csv">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

