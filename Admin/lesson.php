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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Admin Dashboard</title>
    <link rel="stylesheet" href="../css/adminDashboardStyle.css" />
    <link rel="stylesheet" href="../css/lesson.css" />
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
            <a href="lesson.php"  class="link-active">
              <i class="fas fa-book-open"></i>
              <span class="sidebar-item  link-active">Lessons</span>
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

      <!--======================================================================= End of Side Bar -->


      <div class="course-list">
        
      <div class="status">
      <form>
        <div class="status_form">
          <label for="checkid" class="status-subheader">Enter Course ID :</label>
          <div class="status-orderID">
            <input
              type="text"
              name="checkid"
              placeholder="Please type the Course ID"
            />
          </div>
          <div>
            <input type="submit" class="btn-View" value="Search" />
          </div>
        </div>
      </form>
<?php 
$sql="SELECT course_id FROM course";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['course_id']){
$sql="SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if(($row['course_id'])==$_REQUEST['checkid']){
  $_SESSION['course_id']=$row['course_id'];
  $_SESSION['course_name']=$row['course_name'];
  ?>

<h1 class="course-detail"><span class="course_det">Course ID:  </span><?php if(isset($row['course_id'])){
echo $row['course_id'];
 }?> <span class="course_det">Course Name: </span><?php if(isset($row['course_name'])){
  echo $row['course_name'];
   }?> </h1>
    
<?php
 $sql="SELECT * FROM lesson WHERE course_id={$_REQUEST['checkid']}";
 $result=$conn->query($sql);
echo '<table class="table">
          <thead>
            <tr>
              <th>Lesson ID</th>
              <th>Lesson Name</th>
              <th>Lesson Link</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>';
            while($row=$result->fetch_assoc()){
            echo '<tr>';
              echo '<th>'.$row['lesson_id'].'</th>';
              echo '<td>'.$row['lesson_name'].'</td>';
              echo '<td>'.$row['lesson_link'].'</td>';
              echo'<td>';
                echo'
                <form action="editLesson.php" method="POST" style="display:inline">
                <input type="hidden" name="id" value='.$row["lesson_id"].'>
                <button
                  type="submit"
                  class="btn btn-info"
                  name="view"
                  value="view"
                >
                  <i class="fas fa-pen pen"> </i>
                </button>
                </form>

              <form action="" method="POST" style="display:inline">
              <input type="hidden" name="id" value='.$row["lesson_id"].'>
                <button
                  type="submit"
                  class="btn btn-secondary"
                  name="delete"
                  value="Delete"
                >
                  <i class="far fa-trash-alt del"></i>
                </button>
                </form>
              </td>
            </tr>';
             }
          echo '</tbody>
        </table>';
  }
         else{
        echo "Course Not Found!"; 
         }
      if(isset($_REQUEST['delete'])==TRUE){
        $sql="DELETE FROM lesson WHERE lesson_id={$_REQUEST['id']}";
        if($conn->query($sql)==TRUE){
          echo '<meta http-equiv="refresh" content="0; URL=?deleted" />';
        }
        else{
          echo "Unable to Delete Data";
        }
      }

  }
 }
 
?>
    </div>
      </div>
      <?php 
      if(isset($_SESSION['course_id'])){
        echo '<div>
        <a class="btn btn-danger box" href="addLesson.php"
          ><i class="fas fa-plus fa-2x"></i
        ></a>
      </div>';
      }
      ?>
    </div>
    
<!--================================= php for showing course table -->

    <!-- ==================================================End Of Sidebar=================================================================== -->

  </body>
</html>
