<?php
if(!isset($_SESSION)){
  session_start();
}
// include('./stu_include/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
  $stuEmail=$_SESSION['stuLogEmail'];
}else{
  echo "<script>location.href='../index.php' </script>";
}
  // $sql="SELECT *FROM students WHERE stu_email='stuEmail'";
  // $result=$conn->query($sql);
  // if($result->num_rows==1){
  //   $row=$result->fetch_assoc();
  //   $stuId=$row['stu_id'];
  //   $stuName=$row['stu_name'];
  //   $stuOcc=$row['stu_occ'];
  //   $stuImg=$row['stu_img'];
  //  }
   
   if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stuName']=="")){
      $passmsg='<div id="warning">All Fields are Required</div>';    
    }
    else{
      $stuName=$_REQUEST["stuName"];
      $stuOcc=$_REQUEST["stuOcc"];
      $stu_image=$_FILES['stuImg']['name'];
      $stu_image_temp=$_FILES['stuImg']['tmp_name'];
      $img_folder='../images/studentsImg/'.$stu_image;
      move_uploaded_file($stu_image_temp,$img_folder);
      $sql="UPDATE students SET stu_name='$stuName',stu_occ='$stuOcc',stu_img='$img_folder' WHERE stu_email='$stuEmail' ";
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
  $sql="SELECT * FROM students WHERE stu_email = '$stuLogEmail'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
  $stu_img=$row['stu_img'];
  $stuId=$row['stu_id'];
  $stuName=$row['stu_name'];
  $stuOcc=$row['stu_occ'];
}
?>
<!--========================================================================== Course Update -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Student Dashboard</title>
    <link rel="stylesheet" href="../css/studentDashboard.css"/>
    <!-- <link rel="stylesheet" href="../css/studentProfile.css"/> -->
    <!-- <link rel="stylesheet" href="../css/adminDashboardStyle.css" /> -->
    <!-- <link rel="stylesheet" href="../css/addCourse.css"/> -->
 
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

    <div class="container">
      <nav>
        <ul>
        <li class="header-title">
            <h1 class="logo">
             <a href="../index.php"> <img src="../Admin/PIC/logo.png" /></a>
              <span class="sidebar-head">CodingHour</span></h1
            >
          </li>
          <li>
            <!-- <div class="profile-pic"> -->
             <img class="profile-pic" src="<?php echo $stu_img ?>" alt="studentImage">
             <!-- </div> -->
          </li>
          <li>
            <a href="studentProfile.php" class="link-active">
              <i class="fas fa-tachometer-alt"></i>
              <span class="sidebar-item link-active">Profile</span>
            </a>
          </li>
          <li>
            <a href="myCourses.php">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item">My Learnings</span>
            </a>
          </li>
          <li>
            <a href="stuFeedback.php">
              <i class="fab fa-accessible-icon"></i>
              <span class="sidebar-item">Feedback</span>
            </a>
          </li>
          <li>
            <a href="stuChangePassword.php">
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
      <div class="course-add">
        <!-- <h1>My Profile</h1> -->
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
        <?php
        if(isset($_REQUEST['view'])){
          $sql="SELECT * FROM students WHERE stu_id={$_REQUEST['id']}";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
        }
        ?>

         <?php if(isset($passmsg)){
          echo $passmsg;
         }
         ?>
        
           <!--====================================================== Error Message ============================================================-->
           <div class="form-group">
            <label class="form-display" for="stuId">Student ID</label>
            <input
              type="text"
              class="form-control"
              id="stuId"
              name="stuId"
              value="<?php if(isset($stuId)) {echo $stuId;} ?>" readonly
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="stuEmail"
              >Email</label
            >
            <input
              type="email"
              class="form-control"
              id="stuEmail"
              name="stuEmail"
              value="<?php echo $stuEmail ?>" readonly
            />
            </div>
            <div class="form-group">
            <label class="form-display" for="stuName">Student Name</label>
            <input
              type="text"
              class="form-control"
              id="stuName"
              name="stuName"
              value="<?php if(isset($stuName)){echo $stuName;} ?>"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="stuOcc"
              >Occupation</label
            >
            <input
              type="text"
              class="form-control"
              id="stuOcc"
              name="stuOcc"
              value="<?php if(isset($stuOcc)){echo $stuOcc;} ?>"
            />
          </div>
          
          <div class="form-group">
            <label class="form-display" for="stuImg">Update Image</label>
            <input
              type="file"
              class="form-control-file"
              id="stuImg"
              name="stuImg"
            />
          </div>
          <div class="text-center">
            <button
              type="submit"
              class="btn btn-submit"
              id="updateStuNameBtn"
              name="updateStuNameBtn"
            >
              Update
            </button>
        </form>
      </div>
<!-- =============================Profile Data --->
      </div>
    <!---============================================================ Update Student Details ==========================================================-->
    
  </body>
</html>
