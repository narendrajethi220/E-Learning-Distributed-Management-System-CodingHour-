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


if(isset($_REQUEST['lessonSubmitBtn'])){

  // checking for empty fields
  
  if(($_REQUEST['lesson_name']== "") || ($_REQUEST['lesson_desc']== "") || ($_REQUEST['course_id']== "") || ($_REQUEST['course_name']== "")){
    
    $msg='<div id="warning">All Fields are Required</div>';    
  }
   else{
   $lesson_name=$_REQUEST['lesson_name'];
   $lesson_desc=$_REQUEST['lesson_desc'];
   $course_id=$_REQUEST['course_id'];
   $course_name=$_REQUEST['course_name'];
   $lesson_link=$_FILES['lesson_link']['name'];
   $lesson_link_temp=$_FILES['lesson_link']['tmp_name'];
   $link_folder='../lessonVId/'.$lesson_link;
   move_uploaded_file($lesson_link_temp,$link_folder);

  $sql="INSERT INTO lesson (lesson_name,lesson_desc,lesson_link,course_id,course_name) VALUES ('$lesson_name' , '$lesson_desc','$link_folder','$course_id','$course_name')";
   
   if($conn->query($sql)== TRUE){
    $msg='<div id="success">Lesson Added Successfully</div>';
   }
   else{
    $msg='<div id="danger">Unable to Add Lesson</div>';
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
            <a href="sellReport.php">
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
        <h1>Add New Lesson</h1>
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
         <?php if(isset($msg)){
          echo $msg;
         }
         ?>
           <!--====================================================== Error Message ============================================================-->
           <div class="form-group">
            <label class="form-display" for="course_name">Course ID</label>
            <input
              type="text"
              class="form-control"
              id="course_id"
              name="course_id"
              value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>"readonly>
            
          </div>
             <div class="form-group">
            <label class="form-display" for="course_name">Course Name</label>
            <input
              type="text"
              class="form-control"
              id="course_name"
              name="course_name"
              value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>"readonly>
          </div>
          <div class="form-group">
            <label class="form-display" for="course_name">Lesson Name</label>
            <input
              type="text"
              class="form-control"
              id="lesson_name"
              name="lesson_name">
          </div>

          <div class="form-group">
            <label class="form-display" for="lesson_desc"
              >Lesson Description</label
            >
            <textarea
              class="form-control"
              id="lesson_desc"
              name="lesson_desc"
            >
        </textarea>
          <div class="form-group">
            <label class="form-display" for="lesson_link">Lesson Video Link</label>
            <input
              type="file"
              class="form-control-file"
              id="lesson_link"
              name="lesson_link"
            />
          </div>
          <div class="text-center">
            <button
              type="submit"
              class="btn btn-submit"
              id="lessonSubmitBtn"
              name="lessonSubmitBtn"
            >
              Submit
            </button>
            <a href="lesson.php" class="btn btn-close">Close</a>
          </div>
         
        </form>
      </div>
    </div>
  </body>
</html>
