<?php
include('./dbConnection.php');
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
    <title>Courses || CodingHour | Let's Crack the Code</title>
    <style>
      nav {
        background: var(--color-bg1);
      }
      .nav_menu a {
        color: white;
      }
      body {
        background: var(--color-quote);
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
        <a class="home_button" href="index.php"><h3 class="sub-head">CodingHour</h3></a>
        <ul class="nav_menu">
        <li><a href="Notes/notes.php">Notes</a></li>
          <li><a href="Quiz/exam.php">Quiz</a></li>
          <li><a href="Code Editor/Playground.php">Playground</a></li> 
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
    <!-- ====================================End of Navbar========================= -->
    <!-- ====================================Courses=============================== -->
    <section class="courses">
      <h2>Our Courses</h2>
      <div class="container courses_container">
 
        <?php  
         $sql="SELECT * FROM course";
         $result=$conn->query($sql);
         if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
            $course_id=$row['course_id'];
            echo '  <article class="course">
            <div class="course_image">
               <img src="'.str_replace('..','.',$row['course_img']).'" class="responsive"  />
            </div>
            <div class="course_info">
              <h4>'.$row['course_name'].'</h4>
            <p>'.$row['course_desc'].'</p>
            <a href="../Major/courseDetails.php?course_id='.$course_id.'" class="btn btn-secondary">Enroll Now</a>
            </div>
          </article>';
          }
         }
        ?>
      </div>
    </section>

    <!-- ====================================End of Courses========================== -->
    <!--==================================== Footer================================= -->
    <footer>
      <div class="container footer_container">
        <div class="footer_1">
          <a class="home_button" href="index.html"><h3>CodingHour</h3></a>
          <p>
            "Welcome to CodingHour, your one-stop destination for all things
            coding and technology."
          </p>
        </div>

        <div class="footer_2">
          <h4>Permalinks</h4>
          <ul class="permalinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>

        <div class="footer_3">
          <h4>Primacy</h4>
          <ul class="privacy">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Refund Policy</a></li>
          </ul>
        </div>

        <div class="footer_4">
          <h4>Contact Us</h4>
          <div>
            <p>+91 123 456 7890</p>
            <p>Remote location</p>
          </div>
          <ul class="footer_socials">
            <li>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"><i class="uil uil-instagram-alt"></i></a>
            </li>
            <li>
              <a href="#"><i class="uil uil-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="uil uil-linkedin-alt"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer_copyright">
        <small
          >Copyright &copy; CodingHour </small
        >
      </div>
    </footer>
    <!--===================================End of Footer================================  -->
    <script src="js/main.js"></script>
  </body>
</html>
