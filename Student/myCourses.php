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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Student Dashboard</title>
    <link rel="stylesheet" href="../css/studentDashboard.css"/>
    <link rel="stylesheet" href="../css/myLearning.css"/>
    
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
            <a href="myCourses.php" class="link-active">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item link-active">My Learnings</span>
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

      
      <!-- ========================================================End of SideBar============================================= -->

      <!-- ========================================================Contents=================================================== -->

      <div class="myCourses">
  <div class="myCoursesSubDiv">
   <div class="SubDivision">
    <h2 class="text-center">All Courses</h2>
    <?php 
   if(isset($stuLogEmail)){
    $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_author, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
     while($row = $result->fetch_assoc()){ ?>
      <div class="courseDetails">
        <h3 class="card-header"><?php echo $row['course_name']; ?></h3>
          <div class="row">
          
              <div class="col-sm-3">
                <img src="<?php echo $row['course_img']; ?>" class="card-img" alt="pic">
              </div>
              <div class="col-sm-6 mb-3">
                <div class="card-body">
                  <p class="card-desc"><?php echo $row['course_desc']; ?></p>
                  <small class="card-text">Duration: <?php echo $row['course_duration']; ?></small><br />
                  <small class="card-text">Instructor: <?php echo $row['course_author']; ?></small><br/>
                  <p class="card-text d-inline">Price:
                     <small  id="card-text-small"><del>&#8377; <?php echo $row['course_original_price']; ?> </del></small> <span class="card-text">&#8377 <?php echo $row['course_price']?> <span></p>
                  <a href="watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-primary float-right">Watch Course</a>
                </div>
              </div>
          
          </div>
          
      </div> 
    <?php
     }
    }
   }
  
    ?>
    <hr/>
   </div>
  </div>
 </div>
    </div>
  </body>
</html>