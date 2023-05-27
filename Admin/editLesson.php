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


if(isset($_REQUEST['lessonUpdateBtn'])){

  // checking for empty fields
  
  if(($_REQUEST['lesson_id']== "")||($_REQUEST['lesson_name']== "") || ($_REQUEST['lesson_desc']== "") || ($_REQUEST['course_id']== "") || ($_REQUEST['course_name']== "")){
    
    $msg='<div id="warning">All Fields are Required</div>';    
  }
   else{
   $lid=$_REQUEST['lesson_id']; 
   $lname=$_REQUEST['lesson_name'];
   $ldesc=$_REQUEST['lesson_desc'];
   $cid=$_REQUEST['course_id'];
   $cname=$_REQUEST['course_name'];
   $lvideo='../lessonVId/'. $_FILES['lesson_link']['name'];
   
  $sql="UPDATE lesson SET 
  lesson_id='$lid',
  lesson_name='$lname',
  lesson_desc='$ldesc',
  course_id='$cid',
  course_name='$cname',
  lesson_link='$lvideo'
  WHERE lesson_id='$lid'";

   if($conn->query($sql)== TRUE){
    $msg='<div id="success">Lesson Updated Successfully</div>';
   }
   else{
    $msg='<div id="danger">Unable to Update Lesson</div>';
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
    <link rel="stylesheet" href="../css/adminDashboardStyle.css" /
    >
    <!-- <link rel="stylesheet" href="../css/studentDashboard.css" /
    > -->
    
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
            <a href="lesson.php" class="link-active">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item link-active">Lessons</span>
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
        <h1>Update Lesson</h1>
       
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
           <?php
        if(isset($_REQUEST['view'])){
          $sql="SELECT * FROM lesson WHERE lesson_id={$_REQUEST['id']}";
          $result=$conn->query($sql);
          $row=$result->fetch_assoc();
        }
        ?>
        <?php if(isset($msg)){
          echo $msg;
         }
         ?>
           <!--====================================================== Error Message ============================================================-->
           <div class="form-group">
            <label class="form-display" for="lesson_id">Lesson ID</label>
            <input
              type="text"
              class="form-control"
              id="lesson_id"
              name="lesson_id"
              value="<?php if(isset($row['lesson_id'])){echo $row['lesson_id'];}?>" readonly/>
            
          </div>
          <div class="form-group">
            <label class="form-display" for="course_id">Course ID</label>
            <input
              type="text"
              class="form-control"
              id="course_id"
              name="course_id"
              value="<?php if(isset($row['course_id'])){echo $row ['course_id'];}?>" readonly/>
          </div>
             <div class="form-group">
            <label class="form-display" for="course_name">Course Name</label>
            <input
              type="text"
              class="form-control"
              id="course_name"
              name="course_name"
              value="<?php if(isset($row['course_name'])){echo $row ['course_name'];}?>" readonly/>
          </div>
          <div class="form-group">
            <label class="form-display" for="lesson_name">Lesson Name</label>
            <input
              type="text"
              class="form-control"
              id="lesson_name"
              name="lesson_name"
              value="<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];}?>"
              />
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
              <?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];}?>
        </textarea>
          <div class="form-group">
            <label class="form-display" for="lesson_link">Lesson Video Link</label>
            <div class="embed-responsive-item-16by9">
             <iframe width="560" height="315" class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link'];}?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls></iframe>

            </div>
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
              id="lessonUpdateBtn"
              name="lessonUpdateBtn"
            >
              Update
            </button>
            <a href="lesson.php" class="btn btn-close">Close</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
