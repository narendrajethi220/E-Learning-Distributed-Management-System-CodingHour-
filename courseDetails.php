<?php

include('./dbConnection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="shortcut icon" type="image/png" href="images/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/courseDetails.css" />
    
    <title>Courses || CodingHour | Let's Crack the Code</title>
    <style>
      nav {
        background: var(--color-bg1);
      }
      .nav_menu a {
        color: white;
      }
      body {
        background: #1f2641;
      }
      nav button {
        color: white;

      }
      .courses {
        /* border: 2px solid black; */
        margin: auto;
        margin-top: 0.5rem;
      }
      .nav_menu a {
        color: white;
      }
      .window-scroll {
        background: #424890;
        box-shadow: 0 1 rem 2rem rgba(0, 0, 0, 0.5);
      }

      .courses h2 {
        color: white;
      }

      .course:hover {
        color: white;
      }
    </style>
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <a class="home_button" href="index.php"><h3>CodingHour</h3></a>
        <ul class="nav_menu">
          <li><a href="./Notes/notes.php">Notes</a></li>
          <li><a href="./Quiz/exam.php">Quiz</a></li>
          <li><a href="paymentStatus.php">Payment Status</a></li>
          <li><a href="./Code Editor/Playground.php">Playground</a></li>
        </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
<!--======================================= End of Navbar -->
<!--================ Main Content======= -->
<div class="course-container">
  <?php
    if(isset($_GET['course_id'])){
      $course_id=$_GET['course_id'];
      $_SESSION['course_id']=$course_id;
      $sql="SELECT * FROM course WHERE course_id='$course_id'";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();
    } 
    
  ?>

    <img src="<?php echo str_replace('..','.',$row['course_img']); ?>" alt="Course Image" id="course-img"/>

      <h1 id="course-title"><?php echo $row['course_name']?></h1>
      <p class="course-description">
        <?php echo $row['course_desc']?>
      </p>
      <p class="course-duration"><span class="duration">Duration:</span>
        <?php echo $row['course_duration']?>
      </p>
      <form action="checkout.php" method="POST">
      <p class="price"><span class="original-price">Rs.<?php echo $row['course_original_price']?></span>Rs.<?php echo $row['course_price']?></p>
      <input type="hidden" name="id" value="<?php echo $row['course_price']?>">
      <button type="submit" class="buy-now-btn" name="buy">Buy Now</button>
      </form>
      <h2>Course Lessons</h2>
      <ul class="lesson-list">
      <?php
      $sql="SELECT * FROM lesson";
      $result=$conn->query($sql);
      if($result->num_rows>0){
        $num=0;
        while($row=$result->fetch_assoc()){
          if($course_id==$row['course_id']){
            $num++;
         echo '<li class="lesson"><span id="lesno">Lesson '.$num.':</span> '.$row['lesson_name'].'</li>';
        }
      }
      }
      ?>
       </ul>
    </div>

    <!--==================================== Footer================================= -->
   
    <!--===================================End of Footer================================  -->
    <script src="js/main.js"></script>
  </body>
</html>
