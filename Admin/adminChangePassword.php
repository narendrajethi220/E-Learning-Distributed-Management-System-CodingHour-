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

// ===============================================================================================================Password Update
$adminEmail=$_SESSION['adminLogEmail'];
if(isset($_REQUEST['adminPassUpdatebtn'])){
    if(($_REQUEST['adminPass']=="")){
        $passmsg='<div id="warning">All Fields are Required</div>';
    }
    else{
        $sql="SELECT * FROM admin WHERE admin_email='$adminEmail'";
        $result=$conn->query($sql);
        if($result->num_rows==1){
            $adminPass=$_REQUEST['adminPass'];
            $sql="UPDATE admin SET admin_pass ='$adminPass' WHERE admin_email='$adminEmail'";
         
          if($conn->query($sql)==TRUE){
            $passmsg='<div id="success">Updated Successfully</div>'; 
          } 
          else{
             $passmsg='<div id="danger">Unable to Update</div>';
          } 

        }
    }
}

?>
<!--========================================================================== Password Update -->

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
            <a href="sellReport.php">
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
            <a href="adminChangePassword.php" class="link-active">
              <i class="fas fa-key"></i>
              <span class="sidebar-item link-active">Password</span>
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

      <!---============================================================Update Password ==========================================================-->

      <div class="course-add">
        <h1>Update Password</h1>
        <form action="" method="POST" enctype="multipart/form-data">

           <!--====================================================== Error Message ============================================================-->
        <?php
        if(isset($_REQUEST['view'])){
          $sql="SELECT * FROM admin WHERE admin_id={$_REQUEST['id']}";
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
            <label class="form-display" for="inputemail"
              >Email</label
            >
            <input
              type="email"
              class="form-control"
              id="inputemail"
              value="<?php echo $adminEmail ?>"
              readonly />
          </div>
            <div class="form-group">
              <label class="form-display" for="inputnewpassword">New Password</label>
              <input
                type="text"
                class="form-control"
                id="inputnewpassword"
                placeholder="Enter New Password"
                name="adminPass"
              />
            </div>
         
          <div class="text-center">
            <button
              type="submit"
              class="btn btn-submit"
              id="requpdate"
              name="adminPassUpdatebtn"
            >
             Reset
            </button>
            <a href="adminDashboard.php" class="btn btn-close">Close</a>
          </div>
         
        </form>
      </div>
    </div>
  </body>
</html>
