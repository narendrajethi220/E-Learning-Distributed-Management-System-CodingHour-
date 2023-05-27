<?php
if(!isset($_SESSION)){
  session_start();
}
// include('./stu_include/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
  $stuEmail=$_SESSION['stuLogEmail'];
}else{
  echo "<script>location.href='../index.php'";
}

  $sql="SELECT *FROM students WHERE stu_email='stuEmail'";
  $result=$conn->query($sql);
  if($result->num_rows==1){
    $row=$result->fetch_assoc();
    $stuId=$row["stu_id"];
    $stuName=$row["stu_name"];
    $stuOcc=$row["stu_occ"];
    $stuImg=$row["stu_img"];
   }
   
   if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stuName']=="")){
      $passmsg='<div id="warning">All Fields are Required</div>';    
    }
    else{
      $stuName=$_REQUEST["stuName"];
      $stuOcc=$_REQUEST["stuOcc"];
      $stu_image=$_REQUEST['stuImg']['name'];
      $stu_image_temp=$_FILES['stuImg']['tmp_name'];
      $img_folder='../images/studentsImg/'.$stu_image;
      move_uploaded_file($stu_image_temp,$img_folder);
      $sql="UPDATE student SET stu_name='$stuName',stu_occ='$stuOcc'.stu_img='$img_folder' WHERE stu_email='$stuEmail'";
      if($conn->query($sql)==TRUE){
        $passmsg='<div id="success">Updated Successfully</div>';
      }
      else{
        $passmsg='<div id="danger">Unable to Update</div>';
      }
      }
    }
// if(!isset($_SESSION)){
//   session_start();
// }
// include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
  $stuLogEmail=$_SESSION['stuLogEmail'];
}// else{
//   echo "<script>location.href='../index.php'";
// }
if(isset($stuLogEmail)){
  $sql="SELECT stu_img FROM students WHERE stu_email = '$stuLogEmail'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $stu_img=$row['stu_img'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Admin Dashboard</title>
    <link rel="stylesheet" href="../css/studentDashboard.css"/>
    <!-- <link rel="stylesheet" href="../css/adminDashboardStyle.css" /> -->
    <link rel="stylesheet" href="../css/studentProfile.css"/>
    <!-- <link rel="stylesheet" href="../css/adminDashboardStyle.css" />
    <link rel="stylesheet" href="../css/addCourse.css"/> -->
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!--============================================== SideBar====================================================== -->

    <div class="header">
      <a href="#" class="logo">
        <img src="../Admin/PIC/logo.png"/>
        <span class="header-title">CodingHour</span></a
      >
    </div>
    <div class="container">
      <nav>
        <ul>
          <li>
            <!-- <div class="profile-pic"> -->
             <img class="profile-pic" src="<?php echo $stu_img ?>" alt="studentImage">
             <!-- </div> -->
          </li>
          <li>
            <a href="adminDashboard.php" class="link-active">
              <i class="fas fa-tachometer-alt"></i>
              <span class="sidebar-item link-active">Profile</span>
            </a>
          </li>
          <li>
            <a href="courses.php">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item">My Learnings</span>
            </a>
          </li>
            <a href="#">
              <i class="fab fa-accessible-icon"></i>
              <span class="sidebar-item">Feedback</span>
            </a>
          </li>
          <li>
            <a href="adminChangePassword.php">
              <i class="fas fa-key"></i>
              <span class="sidebar-item">Change Password</span>
            </a>
          </li>
          <li>
            <a href="../logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="sidebar-item">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </body>
</html>
