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

if(isset($_REQUEST['stuPassUpdateBtn'])){
    if(($_REQUEST['stuNewPass']=="")){
      $passmsg='<div id="warning">All Fields are Required</div>';    
    }
    else{
      $sql="SELECT * FROM students WHERE stu_email='$stuLogEmail'";
      $result =$conn->query($sql);
      if($result->num_rows==1){
        $stuPass=$_REQUEST['stuNewPass'];
        $sql="UPDATE students SET stu_pass='$stuPass' WHERE stu_email='$stuLogEmail'";
      if($conn->query($sql)==TRUE){
        $passmsg='<div id="success">Password Updated Successfully</div>';
      }
      else{
        $passmsg='<div id="danger">Failed to Update</div>';
      }
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
            <a href="stuFeedback.php" >
              <i class="fab fa-accessible-icon"></i>
              <span class="sidebar-item ">Feedback</span>
            </a>
          </li>
          <li>
            <a href="stuChangePassword.php" class="link-active">
              <i class="fas fa-key"></i>
              <span class="sidebar-item link-active">Change Password</span>
            </a>
          </li>
          <li>
            <a href="../logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="sidebar-item ">Logout</span>
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
            <label class="form-display" for="inputemail"
              >Email</label
            >
            <input
              type="email"
              class="form-control"
              id="inputemail"
              value="<?php echo $stuLogEmail ?>"
              readonly />
          </div>
            <div class="form-group">
              <label class="form-display" for="stuNewPass">New Password</label>
              <input
                type="text"
                class="form-control"
                id="stuNewPass"
                placeholder="Enter New Password"
                name="stuNewPass"
              />
            </div>
         
          <div class="text-center">
          <button
              type="submit"
              class="btn btn-submit"
              id="requpdate"
              name="stuPassUpdateBtn"
            >
             Update
            </button>
            <button
              type="reset"
              class="btn btn-close"
            >
             Reset
            </button>
          </div>
        </form>
      </div>
  </body>
</html>