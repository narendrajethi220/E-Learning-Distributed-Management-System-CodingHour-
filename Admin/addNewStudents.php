<?php

// only go if admin is signed in 
if(!isset($_SESSION)){
  session_start();
}
include('../dbConnection.php');
if(isset($_SESSION['is_admin_login'])){
  $adminEmail=$_SESSION['adminLogEmail'];
}else{
  echo "<script>location.href='../index.php';</script>";
}


if(isset($_REQUEST['courseSubmitBtn'])){

  // checking for empty fields
  
  if(($_REQUEST['stu_name']== "") || ($_REQUEST['stu_email']== "") || ($_REQUEST['stu_pass']== "") || ($_REQUEST['stu_occ']== "") ){
    
    $msg='<div id="warning">All Fields are Required</div>';    
  }
   else{
   $stu_name=$_REQUEST['stu_name'];
   $stu_email=$_REQUEST['stu_email'];
   $stu_pass=$_REQUEST['stu_pass'];
   $stu_occ=$_REQUEST['stu_occ'];
  
   //==========================  Image Uploading
  
   $stu_image= $_FILES['stu_img']['name'];
   $stu_image_temp=$_FILES['stu_img']['tmp_name'];
   $img_folder='../images/studentsImg/'.$stu_image;
    move_uploaded_file($stu_image_temp,$img_folder);
   
  // ============================  Image Uploading  
 
  $sql="INSERT INTO students (stu_name,stu_email,stu_pass,stu_occ,stu_img) VALUES ('$stu_name','$stu_email','$stu_pass','$stu_occ','$img_folder')";
   
   if($conn->query($sql)== TRUE){
    $msg='<div id="success">Student Added Successfully</div>';
   }
   else{
    $msg='<div id="danger">Unable to Add Student</div>';
   }
 
}



}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Admin Dashboard</title>
    <link rel="stylesheet" href="../css/adminDashboardStyle.css" />
    <link rel="stylesheet" href="../css/addCourse.css" />
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
    <!--================================================================SideBar================================================================ -->
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="#" class="logo">
              <img src="./pic/logo.png" />
              <span class="sidebar-head">CodingHour</span></a
            >
          </li>
          <li>
            <a href="adminDashboard.php">
              <i class="fas fa-tachometer-alt"></i>
              <span class="sidebar-item">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="courses.php">
              <i class="fas fa-chalkboard-teacher"></i>
              <span class="sidebar-item">Courses</span>
            </a>
          </li>
          <li>
            <a href="lesson.php">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item">Lessons</span>
            </a>
          </li>
          <li>
            <a href="students.php">
              <i class="fas fa-users"></i>
              <span class="sidebar-item">Students</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-chart-bar"></i>
              <span class="sidebar-item">Sell Report</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-table"></i>
              <span class="sidebar-item">Payment</span>
            </a>
          </li>
          <li>
            <a href="feedback.php"">
              <i class="fab fa-accessible-icon"></i>
              <span class="sidebar-item">Feedback</span>
            </a>
          </li>
          <li>
            <a href="adminChangePassword.php">
              <i class="fas fa-key"></i>
              <span class="sidebar-item">Password</span>
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

      <!---============================================================ Add Course ==========================================================-->

      <div class="course-add">
        <h1>Add New Student</h1>
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
         <?php if(isset($msg)){
          echo $msg;
         }
         ?>
           <!--====================================================== Error Message ============================================================-->
          
             <div class="form-group">
            <label class="form-display" for="stu_name">Student Name</label>
            <input
              type="text"
              class="form-control"
              id="stu_name"
              name="stu_name"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="stu_email"
              >Email</label
            >
            <input
              type="text"
              class="form-control"
              id="stu_email"
              name="stu_email"
            />
            <div class="form-group">
              <label class="form-display" for="stu_pass">Password</label>
              <input
                type="text"
                class="form-control"
                id="stu_pass"
                name="stu_pass"
              />
            </div>
          </div>
          <div class="form-group">
            <label class="form-display" for="stu_occ"
              >Occupation</label
            >
            <input
              type="text"
              class="form-control"
              id="stu_occ"
              name="stu_occ"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="course_img">Student Image</label>
            <input
              type="file"
              class="form-control-file"
              id="stu_img"
              name="stu_img"
            />
          </div>
          <div class="text-center">
            <button
              type="submit"
              class="btn btn-submit"
              id="courseSubmitBtn"
              name="courseSubmitBtn"
            >
              Submit
            </button>
            <a href="students.php" class="btn btn-close">Close</a>
          </div>
         
        </form>
      </div>
    </div>
  </body>
</html>
