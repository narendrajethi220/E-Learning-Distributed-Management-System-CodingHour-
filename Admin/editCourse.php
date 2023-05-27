<?php
if(!isset($_SESSION)){
  session_start();
}
include('../dbConnection.php');
if(isset($_SESSION['is_admin_login'])){
  $adminEmail=$_SESSION['adminLogEmail'];
}else{
  echo "<script>location.href='../index.php';</script>";
}

// ===============================================================================================================Course Update

if(isset($_REQUEST['requpdate'])){

  // checking for empty fields
  
  if(($_REQUEST['course_id']=="" || $_REQUEST['course_name']== "") || ($_REQUEST['course_desc']== "") || ($_REQUEST['course_author']== "") || ($_REQUEST['course_duration']== "") || ($_REQUEST['course_original_price']== "") || ($_REQUEST['course_price']== "") ){
    
    $msg='<div id="warning">All Fields are Required</div>';    
  }
   else{
    $cid=$_REQUEST['course_id'];
   $cname=$_REQUEST['course_name'];
   $cdesc=$_REQUEST['course_desc'];
   $cauthor=$_REQUEST['course_author'];
   $cduration=$_REQUEST['course_duration'];
   $coriginalprice=$_REQUEST['course_original_price'];
   $cprice=$_REQUEST['course_price'];
  
   //==========================  uploaded image link
  
  //  $cimage= '../images/courseImg/'. $_FILES['course_img']['name'];
   $course_image= $_FILES['course_img']['name'];
   $course_image_temp=$_FILES['course_img']['tmp_name'];
   $img_folder='../images/courseImg/'.$course_image;
   move_uploaded_file ($course_image_temp,$img_folder);
  // ============================  Image Uploaded  
 
  $sql="UPDATE course SET course_id='$cid',
  course_name='$cname',
  course_desc='$cdesc',
  course_author='$cauthor',
  course_duration='$cduration',
  course_original_price='$coriginalprice',
  course_price='$cprice',
  course_img='$img_folder'
  WHERE course_id='$cid'";
   
   if($conn->query($sql)== TRUE){
    $msg='<div id="success">Updated Successfully</div>';
   }
   else{
    $msg='<div id="danger">Unable to Update</div>';
   }
}
}
?>
<!--========================================================================== Course Update -->

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
            <a href="courses.php" class="link-active">
              <i class="fas fa-chalkboard-teacher"></i>
              <span class="sidebar-item link-active">Courses</span>
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
        <h1>Update Course Details</h1>
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
        <?php
        if(isset($_REQUEST['view'])){
          $sql="SELECT * FROM course WHERE course_id={$_REQUEST['id']}";
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
            <label class="form-display" for="course_id">Course ID</label>
            <input
              type="text"
              class="form-control"
              id="course_id"
              name="course_id"
              value="<?php if(isset($row['course_id'])){echo $row['course_id'];} ?>" readonly
            />
          </div>
            <div class="form-group">
            <label class="form-display" for="course_name">Course Name</label>
            <input
              type="text"
              class="form-control"
              id="course_name"
              name="course_name"
              value="<?php if(isset($row['course_name'])){echo $row['course_name'];} ?>"
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
            >
            <?php if(isset($row['course_desc'])){echo $row['course_desc'];} ?>
          </textarea>
            <div class="form-group">
              <label class="form-display" for="course_author">Author</label>
              <input
                type="text"
                class="form-control"
                id="course_author"
                name="course_author"
                value="<?php if(isset($row['course_author'])){echo $row['course_author'];} ?>"
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
              value="<?php if(isset($row['course_duration'])){echo $row['course_duration'];} ?>"
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
              value="<?php if(isset($row['course_original_price'])){echo $row['course_original_price'];} ?>"
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
              value="<?php if(isset($row['course_price'])){echo $row['course_price'];} ?>"
            />
          </div>
          <div class="form-group">
            <label class="form-display" for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img'])){echo $row['course_img'];} ?>" alt="" class="img-thumbnail" >
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
              id="requpdate"
              name="requpdate"
            >
              Update
            </button>
            <a href="courses.php" class="btn btn-close">Close</a>
          </div>
         
        </form>
      </div>
    </div>
  </body>
</html>
