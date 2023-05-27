
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
  $sql="SELECT * FROM course";
  $result=$conn->query($sql);
  $totalcourse=$result->num_rows;

  $sql="SELECT * FROM students";
  $result=$conn->query($sql);
  $totalstu=$result->num_rows;

  $sql="SELECT * FROM courseorder";
  $result=$conn->query($sql);
  $totalsold=$result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodingHour||Admin Dashboard</title>
    <link rel="stylesheet" href="../css/adminDashboardStyle.css" />
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
            <a href="/index.php" class="logo">
              <img src="./pic/logo.png" />
              <span class="sidebar-head">CodingHour</span></a
            >
          </li>
          <li>
            <a href="adminDashboard.php" class="link-active">
              <i class="fas fa-tachometer-alt"></i>
              <span class="sidebar-item link-active">Dashboard</span>
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
            <a href="paymentStatus.php">
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

      <section class="main">
        <div class="main-top">
          <h1>Dashboard</h1>
        </div>
        <div class="users">
          <div style="background: var(--color-course1)" class="card">
            <h3>Courses</h3>
            <h4>
              <?php echo $totalcourse;?>
            </h4>
            <a href="courses.php">View</a>
          </div>
          <div style="background: var(--color-course2)" class="card">
            <h3>Students</h3>
            <h4>
            <?php echo $totalstu;?>
            </h4>
            <a href="students.php">View</a>
          </div>
          <div style="background: var(--color-course3)" class="card">
            <h3>Sold</h3>
            <h4>
            <?php echo $totalsold;?>
            </h4>
            <a href="sellReport.php">View</a>
          </div>
        </div>
        <section class="course-ordered">
          <div class="orderd-list">
            <h1>Course Ordered</h1>
            <?php
            $sql="SELECT * FROM courseorder";
            $result=$conn->query($sql);
            if($result->num_rows>0){
              echo '<table class="table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Course ID</th>
                  <th>Student Email</th>
                  <th>Order Date</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>';
              while($row=$result->fetch_assoc()){
                echo '<tr>';
                echo '<th scope="row">'.$row["order_id"].'</th>';
                echo '<td>'.$row["course_id"].'</td>';
                echo '<td>'.$row["stu_email"].'</td>';
                echo '<td>'.$row["order_date"].'</td>';
                echo '<td> '.$row["amount"].'</td>';
                echo '<td> <form action="" method="POST">
                <input type="hidden" name="id" value='.$row["co_id"].'>
                <button
                type="submit"
                class="btn btn-secondary"
                name="delete"
                value="Delete"
              >
                <i class="far fa-trash-alt"></i>
              </button>
            </td>';
            echo '</tr>';
              }
              echo '</tbody>
              </table>';
            }
            else{
              echo "0 Result";
            }
            if(isset($_REQUEST['delete'])){
              $sql="DELETE FROM courseorder WHERE co_id={$_REQUEST['id']}";
              if($conn->query($sql)===TRUE){
                echo '<meta http-equiv="refresh" content="0; URL=?deleted"/>';
              }
              else{
                echo "Unable to Delete Date";
              }
            }
            ?>
            
        </div>
        </section>
      </section>
    </div>
    <!-- <script src="js/main.js"></script> -->
  </body>
</html>
