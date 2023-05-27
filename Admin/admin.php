<?php
if(!isset($_SESSION)){
    session_start();
}

include_once('../dbConnection.php');
    //Admin Login verificaiton
    if(!isset($_SESSION['is_admin_login'])){
    if(isset($_POST['checkLogemail']) && isset($_POST['adminemail']) && isset($_POST['adminpass'])) {
        $adminLemail = $_POST['adminemail'];
        $adminLpass = $_POST['adminpass'];
    
        $sql = "SELECT * FROM admin WHERE admin_email='$adminLemail' AND admin_pass='$adminLpass' ";
        $result = $conn->query($sql);
       $row=$result->num_rows;
       if($row===1){
        $_SESSION['is_admin_login']=true;
        $_SESSION['adminLogEmail']=$adminLemail;
        echo json_encode($row);
        
       }
       else if($row===0){
        echo json_encode($row);
       }

}
    }
?>
