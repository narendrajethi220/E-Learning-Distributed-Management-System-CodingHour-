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
    <link rel="stylesheet" href="../css/sellReport.css" />
    
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
    <!--============================================== SideBar====================================================== -->
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
            <a href="adminDashboard.php" >
              <i class="fas fa-tachometer-alt"></i>
              <span class="sidebar-item ">Dashboard</span>
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
            <a href="sellReport.php" class="link-active">
              <i class="fas fa-chart-bar"></i>
              <span class="sidebar-item link-active">Sell Report</span>
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
       
      <!--================================================ End of Sidebar ==================================================================-->
      
      <div  class="sell-list">
        <h2 id="sub-head">Sell Report</h2>
        <form action="" method="POST">
            <div class="input-date">
                <div>
                    <input type="date" id="startdate" name="startdate">
                </div>
                <span id="span"> to </span>
                <div>
                    <input type="date" id="enddate" name="enddate">
                </div>
                <div>
                    <input type="submit" id="btn-submit" name="searchsubmit" value="Search" >
                </div>
            </div>
        </form>
        <?php
        if(isset($_REQUEST['searchsubmit'])){
            $startdate=$_REQUEST['startdate'];
            $enddate=$_REQUEST['enddate'];
            $sql="SELECT * FROM courseorder WHERE order_date 
            BETWEEN '$startdate' AND '$enddate'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
            echo '<p id="para">Details </p>
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Order ID </th>
            <th scope="col">Course ID</th>
            <th scope="col">Student Email</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Order Date</th>
            <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>';
            
            while($row=$result->fetch_assoc()){
                echo '<tr>
                <th scope="row">'.$row["order_id"].'</th>
                <td>'.$row["course_id"].'</td>
                <td>'.$row["stu_email"].'</td>
                <td>'.$row["status"].'</td>
                <td>'.$row["order_date"].'</td>
                <td>'.$row["amount"].'</td>
                </tr>';
            }
             echo '<tr>
           <td><form class="print"><input id="btn-danger"
           type="submit" value="Print" onClick="window.print()"></form></td>
           </tr></tbody>
           </table>';
           }
            else{
              echo "<div class='alert alert-warning'>No Records Found !</div>";
            }
        }
        ?>
        </div>
    </div>