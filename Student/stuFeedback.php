<?php
if(!isset($_SESSION)){
  session_start();
}

include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail=$_SESSION['stuLogEmail'];
  }else{
  echo "<script>location.href='../index.php' </script>";
}

if(isset($stuLogEmail)){
    $sql="SELECT * FROM students WHERE stu_email = '$stuLogEmail'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $stu_img=$row['stu_img'];
    $stuId=$row['stu_id'];
  //   $stuName=$row['stu_name'];
  //   $stuOcc=$row['stu_occ'];
  }

if(isset($_REQUEST['submitFeedbackBtn'])){
    if(($_REQUEST['f_content']=="")){
      $passmsg='<div id="warning">All Fields are Required</div>';    
    }
    else{
       $fcontent=$_REQUEST["f_content"];
       $sql="INSERT INTO feedback (f_content,stu_id) VALUES ('$fcontent', '$stuId')";
      if($conn->query($sql)==TRUE){
        $passmsg='<div id="success">Feedback Submitted Successfully</div>';
      }
      else{
        $passmsg='<div id="danger">Unable to Submit</div>';
      }
      }
    }

?>

<!--========================================================================== Sidebar -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Admin Dashboard</title>
    <link rel="stylesheet" href="../css/studentDashboard.css"/>
    <link rel="stylesheet" href="../css/stuFeedback.css"/>
    
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
            <a href="studentProfile.php" >
              <i class="fas fa-tachometer-alt"></i>
              <span class="sidebar-item ">Profile</span>
            </a>
          </li>
          <li>
            <a href="myCourses.php">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item">My Learnings</span>
            </a>
          </li>
          <li>
            <a href="stuFeedback.php" class="link-active">
              <i class="fab fa-accessible-icon"></i>
              <span class="sidebar-item link-active">Feedback</span>
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
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
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
              value="<?php if(isset($stuId)) {echo $stuId;}?>" readonly> 
          </div>
          <div class="form-group">
            <label class="form-display" for="f_content"
              >Write Feedback</label
            >
            <textarea id="f_area"
              class="form-control"
              id="f_content"
              name="f_content"
            ></textarea>
        </div>
            <button type="submit" class ="btn btn-submit" name="submitFeedbackBtn">Submit</button>
        </form>
        </div>
    
        </div>
 
  </body>
</html>