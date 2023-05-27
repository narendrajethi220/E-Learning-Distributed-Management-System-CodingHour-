<?php
include_once('../dbConnection.php');

// Checking Email if Already Exist
if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
    $stuemail = $_POST['stuemail'];
    $sql="SELECT stu_email FROM students WHERE stu_email='".$stuemail."'";
    $result = $conn->query(($sql));
    $row = $result->num_rows;
       echo json_encode($row);
}

// Insert Student
if (isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])) {

    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $sql = "INSERT into students(stu_name,stu_email,stu_pass)Values('$stuname','$stuemail','$stupass')";

    if ($conn->query($sql) == true) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}
?>