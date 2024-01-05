<?php



if (isset($_POST['StudentID'])) {
    $StudentID =  $_POST['StudentID'];
    $Name =  $_POST['Name'];
    $Program =  $_POST['Program'];
    $session =  $_POST['session'];



    $sql = "INSERT INTO `student`(`StudentID`, `Name`, `Program`, `session`) VALUES ('$StudentID','$Name',' $Program','$session')";

    if (isset($_GET['StudentID'])) {
        $UpdateStudentID = $_GET['StudentID'];

        $sql = "UPDATE `student` SET `StudentID`='$StudentID',`Name`='$Name',`Program`='$Program',`session`='$session' WHERE `StudentID`=$UpdateStudentID";
    }



    $result = mysqli_query($conn, $sql);
}


if (isset($result)) {

?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        Success
    </div>
<?php

}



if (isset($_GET['StudentID'])) {
    $UpdateStudentID = $_GET['StudentID'];

    $sql_result = "SELECT * FROM `student` WHERE `StudentID`=$UpdateStudentID";
    $result2 = mysqli_query($conn, $sql_result);

    $row3 = mysqli_fetch_assoc($result2);
}


?>


<div class="row justify-content-center g-3 my-2 ">
    <div class="col-md-7 bg-white shadow-lg rounded p-4">
        <h3 class="heading_color mb-4"> <?php if (isset($UpdateResultID)) {
                                            echo "Updete";
                                        } else echo "Add New" ?> Student</h3>
        <form action="" method="post" class="row">
            <div class="form-group col-md-6">
                <label for="StudentID">Student ID</label>
                <input type="text" class="form-control form-control-sm" id="StudentID" name="StudentID" placeholder=" " 
                
                value="<?php if (isset($row3['StudentID'])) {
                                                                                                                                    echo $row3['StudentID'];
                                                                                                                                } ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="Name">Name</label>
                <input type="text" class="form-control form-control-sm" id="Name" name="Name" placeholder=" " value="<?php if (isset($row3['Name'])) {
                                                                                                                            echo $row3['Name'];
                                                                                                                        } ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="Program">Program</label>
                <input type="text" class="form-control form-control-sm" id="Program" name="Program" placeholder=" " required value="BSc. (Engg.) in CSE">
            </div>
            <div class="form-group col-md-6">
                <label for="session">Session</label>
                <input type="text" class="form-control form-control-sm" id="session" name="session" placeholder=" " required value="<?php if (isset($row3['session'])) {
                                                                                                                                                echo $row3['session'];
                                                                                                                                            } ?>">
            </div>
           



            <button type="submit" id="submit" class="btn btn-dark btn-sm my-3  fw-bold">

                <?php if (isset($UpdateResultID)) {
                    echo "Updete";
                } else echo "Add" ?>
            </button>
        </form>
        <!-- 
        <h6>or</h6>

        <form action="" method="post" class="my-5">
            <div class="mb-3">
                <h4 class="mb-3">Upload CSV</h4>
                <input type="file" name="csv" id="csv" accept=".csv">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form> -->
    </div>

</div>