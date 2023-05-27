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
  
  if(($_REQUEST['course_name']== "") || ($_REQUEST['course_desc']== "") || ($_REQUEST['course_author']== "") || ($_REQUEST['course_duration']== "") || ($_REQUEST['course_original_price']== "") || ($_REQUEST['course_price']== "") ){
    
    $msg='<div id="warning">All Fields are Required</div>';    
  }
   else{
   $course_name=$_REQUEST['course_name'];
   $course_desc=$_REQUEST['course_desc'];
   $course_author=$_REQUEST['course_author'];
   $course_duration=$_REQUEST['course_duration'];
   $course_original_price=$_REQUEST['course_original_price'];
   $course_price=$_REQUEST['course_price'];
  
   //==========================  Image Uploading
  
   $course_image= $_FILES['course_img']['name'];
   $course_image_temp=$_FILES['course_img']['tmp_name'];
   $img_folder='../images/courseImg/'.$course_image;
   move_uploaded_file ($course_image_temp,$img_folder);

   
  // ============================  Image Uploading  
 
  $sql="INSERT INTO course (course_name,course_desc,course_author,course_img,course_duration,course_price,course_original_price) VALUES ('$course_name' , '$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')";
   
   if($conn->query($sql)== TRUE){
    $msg='<div id="success">Course Added Successfully</div>';
   }
   else{
    $msg='<div id="danger">Unable to Add Course</div>';
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
            <a href="feedback.php">
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
        <h1>Add New Course</h1>
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
         <?php if(isset($msg)){
          echo $msg;
         }
         ?>
           <!--====================================================== Error Message ============================================================-->
          
             <div class="form-group">
            <label class="form-display" for="course_name">Course Name</label>
            <input
              type="text"
              class="form-control"
              id="course_name"
              name="course_name"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="course_desc"
              >Course Description</label
            >
            <textarea
              class="form-control"
              id="course_desc"
              name="course_desc"
            ></textarea>
            <div class="form-group">
              <label class="form-display" for="course_author">Author</label>
              <input
                type="text"
                class="form-control"
                id="course_author"
                name="course_author"
              />
            </div>
          </div>
          <div class="form-group">
            <label class="form-display" for="course_duration"
              >Course Duration</label
            >
            <input
              type="text"
              class="form-control"
              id="course_duration"
              name="course_duration"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="course_original_price"
              >Course Original Price</label
            >
            <input
              type="text"
              class="form-control"
              id="course_original_price"
              name="course_original_price"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="course_price"
              >Course Selling Price</label
            >
            <input
              type="text"
              class="form-control"
              id="course_price"
              name="course_price"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="course_img">Course Image</label>
            <input
              type="file"
              class="form-control-file"
              id="course_img"
              name="course_img"
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
            <a href="courses.php" class="btn btn-close">Close</a>
          </div>
         
        </form>
      </div>
    </div>
  </body>
</html>
