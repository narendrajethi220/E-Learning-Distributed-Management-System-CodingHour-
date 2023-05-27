<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../dbConnection.php');
    //Student Login verificaiton
    if(!isset($_SESSION['is_login'])){
    if(isset($_POST['checkLogemail']) && isset($_POST['stuLemail']) && isset($_POST['stuLpass'])) {
        $stuLemail = $_POST['stuLemail'];
        $stuLpass = $_POST['stuLpass'];
    
        $sql = "SELECT * FROM students WHERE stu_email='$stuLemail' AND stu_pass='$stuLpass' ";
        $result = $conn->query($sql);
       $row=$result->num_rows;
       if($row===1){
        $_SESSION['is_login']=true;
        $_SESSION['stuLogEmail']=$stuLemail;
        echo json_encode($row);
        
       }
       else if($row===0){
        echo json_encode($row);
       }

}
    }
?>
