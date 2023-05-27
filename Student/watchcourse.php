<?php
if(!isset($_SESSION)){
    session_start();
}
include('../dbConnection.php');
if(isset($_SESSION['is_login'])){
    $stuEmail=$_SESSION['stuLogEmail'];
}else{
    echo "<script> location.href='../index.php'l </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Watch Video || CodingHour </title>
  <link rel="stylesheet" type="text/css" href="Style/style.css">
  

</head>
<body>

    <div class="nav">
        <h2>Welcome to <span> <a href="../index.php">CodingHour </a></span></h2>
        <a class="myCourse"href="./myCourses.php"> My Courses</a>
    </div>
    <div id="courseName">
        <?php 
        if(isset($_GET['course_id'])){
            $course_id=$_GET['course_id'];
            $sql="SELECT course_name FROM course WHERE course_id='$course_id'";
            $result=$conn->query($sql);
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                echo '<h2> '.$row['course_name'].'</h2>';
                echo '<hr>';
            }   
            }
        ?>
    </div>
   
    <div class="container">
        
        <div class="player-container">
            <video  id="videoPlayer" src="" controls controlsList="nodownload"></video>
    </div>
        <div class="lesson">
            <h2>Lesson</h2>
            <hr id="lessonhr">
        <ol id="playlist">
            <?php 
            if(isset($_GET['course_id'])){
                $course_id=$_GET['course_id'];
                $sql="SELECT * FROM lesson WHERE course_id='$course_id'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                     echo '<li class="videoURL" movieurl='.$row['lesson_link'].' style="cursor:pointer;">'.$row['lesson_name'].' </li>';
                     echo '<hr>';
                    }
                }
            }
            ?>
            </ol>
        </div>
        </div>
        <hr>
        <h2 id="sub-head">Course Description</h2>
        <div class="lesson-desc">
        <?php 
            if(isset($_GET['course_id'])){
                $course_id=$_GET['course_id'];
                $sql="SELECT lesson_desc FROM lesson WHERE course_id='$course_id'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                     echo '<p>'.$row['lesson_desc'].' </p>';
                    }
                }
            }
            ?>
        </div>
       

<!--     
        <script type="text/javascript"> let headID = document.getElementsByTagName("head")[0]; let newCss = document.createElement('link'); newCss.rel = 'stylesheet'; newCss.type = 'text/css'; newCss.href = "https://botmake.io/embed/bot1459217.css"; let newScript = document.createElement('script'); newScript.src = "https://botmake.io/embed/bot1459217.js"; newScript.type = 'text/javascript'; headID.appendChild(newScript); headID.appendChild(newCss); </script>

  -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="JS/custom.js"></script>
</body>
</html>