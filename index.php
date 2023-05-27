<?php
include('./dbConnection.php');   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="shortcut icon" type="image/png" href="images/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/style.css" />
    <!-- SwiperJS -->
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="css/exploreStyle.css">
<style>
  nav {
     background: var(--color-bg);
     /* background: #000; */
     
      }
      .nav_menu a {
        color: white;
      }
      nav button {
        color: white;
      }
</style>
    <title>CodingHour | Let's Crack the Code</title>
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <a class="home_button" href="index.php"><h3>CodingHour</h3></a>
        <ul class="nav_menu">
          <li><a href="courses.php">Learn</a></li>
          <?php
          session_start();
          if(isset($_SESSION['is_login'])){ 
            $stuEmail=$_SESSION['stuLogEmail'];
          echo'<li><a href="Student/studentProfile.php">MyProfile</a></li>';
          echo '<li><a href="logout.php">Logout</a></li>';
        }
        else{
          echo'<li><a href="#explore">Register</a></li>';
          echo '<li><a href="#explore">Login</a></li>';
        }
        ?>
        <li><a href="aboutUs.php">About Us</a></li>
        <?php
        if(isset($_SESSION['is_login'])){   
        echo '<li><a href="Discussion_Forum/discussionForum.php"><i style="font-size:24px" class="fas">&#xf086;</i></a></li>';
      }?>
      </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav> 

  <!-- ====================================================Discussion Forum=============================================== -->





    <!-- =====================================================header=========================================================== -->

   <header>
   <div class="header_text-box">
    <h1 class="heading-primary">
      <span class="heading-primary--main"
        >काक चेष्टा बको ध्यानं, श्वान निद्रा तथैव च ।</span
      >
      <span class="heading-primary--sub"
        >अल्पहारी गृह त्यागी, विद्यार्थी पंच लक्षणं ॥</span
      >
    </h1>
    <?php 
    
    if(!isset($_SESSION['is_login'])){
      echo '<a href="#explore" class="btn btn-primary" >Explore</a>
      ';
    }
    else{
      echo '<a href="Student/studentProfile.php" class="btn btn-primary">MyProfile</a>
      ';
    }
    ?>
    </div>
</header>

     <!-- ========================================================Popup Login SignUp Form for student =======================================-->
     
    <div id="explore" class="overlay">
      <div class="wrapper">
        <a href="#" class="close">&times;</a>
        <div class="column details">
          <div class="signin">
            <h2 class="stu-form-header"><span class="span-header">Student</span> Sign in</h2>
            <form id="stuLogForm">
            <input type="email" placeholder="Username" name="stuLemail" id="stuLemail" />
            <input type="password" placeholder="password" name="stuLpass" id="stuLpass" />
            </form>
            <a href="#"> Forgot Password</a>
            <small style="margin-bottom:.3rem" id="statusLogMsg"></small>
            <button class="form-submit" onclick="checkStuLogin()">Log in</button>
            
            <span class="form-span"
              >You Don't have account yet?
              <button id="signup">Create it Know</button></span
            >
          </div>
         
            <div class="signup">
             
            <h2 class= "stu-form-header"><span class="span-header">Student</span> Sign Up</h2>
            <form id="stuRegForm">
            <input type="name" placeholder="Full Name" name="stuname" id="stuname"/>
            <small id="statusMsg1"></small>
            <input type="email" placeholder="email" name="stuemail" id="stuemail"/>
            <small id="statusMsg2"></small>
            <input type="password" placeholder="password" name="stupass" id="stupass"/>
            <small id="statusMsg3"></small>
              </form>
            <div>
            <span id="successMsg"></span>
            <button class="form-submit" onclick="addStu()" id="Rsignup">Sign up</button>
            </div>
            

            <span class="form-span"
              >Already have an Account!
              <button id="signin">Sign In</button></span
            >
          </div>
        </div>

        <div class="column content">
          <div class="signin">
            <h1>Welcome Back</h1>
            <p>
              To keep Connected with us please login with your personal
              information
            </p>
          </div>

          <div class="signup">
            <h1>Hello Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
      $(".signup").hide();

      $("#signin, #signup").on("click", function () {
        $(".signin,.signup").toggle();
      });
    </script>
     <!-- ========================================================EndstudLoginModal Login SignUp Form for student =======================================-->
    <!-- ================================================================Categories===========================================   -->
    
    <section class="categories">
      <div class="container categories_container">
        <div class="categories_left">
        <h1>Categories</h1>
        <p>
          "Explore a wide range of subjects including Programming, Blockchain, Graphic Design, Marketing, Finance, Artificial Intelligence, Data Science. Discover new skills and expand your knowledge with our diverse selection of courses."
        </p>
      <a href="courses.html" class="btn">Learn More</a>
    </div>
      <div class="categories_right">
        <article class="category">
          <span class="category_icon"><i class="uil uil-java-script"></i></span>
          <h5>Languages</h5>
          <p>
          Languages that enables interactive and dynamic features.
          </p>
        </article>
        <article class="category">
          <span class="category_icon"
            ><i class="uil uil-bitcoin-circle"></i
          ></span>
          <h5>Blockchain</h5>
          <p>
            Blockchain is a decentralized, distributed digital ledger technology.
          </p>
        </article>
        <article class="category">
          <span class="category_icon"><i class="uil uil-palette"></i></span>
          <h5>Graphic Design</h5>
          <p>
            Graphic design is the art and technique of visual communication.
          </p>
        </article>
        <article class="category">
          <span class="category_icon"><i class="uil uil-usd-circle"></i></span>
          <h5>Finance</h5>
          <p>
            Finance deals with the management of money and assets.
          </p>
        </article>
        <article class="category">
          <span class="category_icon"><i class="uil uil-megaphone"></i></span>
          <h5>Marketing</h5>
          <p>
            Marketing is the process of promoting and selling products or services.
          </p>
        </article>
        <article class="category">
          <span class="category_icon"
            ><i class="uil uil-puzzle-piece"></i
          ></span>
          <h5>Reasoning</h5>
          <p>
            Reasoning is thinking through problems and making logical conclusions.
          </p>
        </article>
      </div>
    </section>

    <!-- ====================================================End of Categories============================================== -->
    
    <section class="courses">
      <h2>Our Popular Courses</h2>
      <div class="container courses_container">

        <!--==================================== Fetching top courses from Databases==================================================== -->
        
        <?php  
         $sql="SELECT * FROM course LIMIT 6";
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

    <!-- <===============================================END OF COURSES========================================================> -->
    
    <section class="faqs">
      <h2>Frequently Asked Question</h2>
      <div class="container faqs_container">
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>How do I know the right courses for me?</h4>
            <p>Consider your interests, strengths, and career goals.
              Research and compare course offerings and seek advice from our Mentors or academic advisors.</p>
          </div>
        </article>

        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>How do I purchase a course?</h4>
            <p>You can purchase a course by visiting the course page and clicking the "Buy Now" or "Add to Cart" button. You can also use a  coupon code if you have one.</p>
          </div>
        </article>
        
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>Are courses refundable?</h4>
              <p>We offers a 30-day money-back guarantee for most courses. If you're not satisfied with a course, you can request a refund within 30 days of purchasing the course.</p>
          </div>
        </article>
        
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>How long do courses last?</h4>
            <p>Our courses are self-paced, so the length of time it takes to complete a course will vary depending on the student. Most courses are offer lifetime access, so students can complete the course at their own pace.</p>
          </div>
        </article>
        
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>How do I access my purchased courses?</h4>
            <p>You can access your purchased courses by logging into your account and going to the "My Courses" page.</p>
          </div>
        </article>
        
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>How can I see my Payment status?</h4>
            <p>You can see your payment status by visited Payment status link present on the navigation bar, after logging to your account and giving course Id.</p>
          </div>
        </article>
        
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>Can I share my courses with others?</h4>
            <p>No, Our courses are for personal use only and cannot be shared with others. Each course purchase allows only one person to access the course.</p>
          </div>
        </article>
        
        <article class="faq">
          <div class="faq_icon"><i class="uil uil-plus"></i></div>
          <div class="question_answer">
            <h4>Are courses updated?</h4>
            <p>We encourages instructors to update their courses regularly to ensure the content is current and relevant. However, it's ultimately up to the instructor to update the course.</p>
          </div>
        </article>
      </div>
     </section>


<!-- =================================================================End of FAQs============================================================ -->
     
<section class="container testimonials_container mySwiper">
  <h2>Student's Testimoniols</h2>
  <div class="swiper-wrapper">
    <article class="testimonial swiper-slide">
      <div class="avatar">
       <img src="images/avatar1.jpg"/>
      </div>
      <div class="testimonial_info">
        <h5>Diana Ayi</h5>
        <small>Student</small>
        <div class="testimonial_body">
          <p>"I have taken several courses on this online education website and have been extremely impressed with the quality of the content and the expertise of the instructors"</p>
        </div>
      </div>
    </article>

    <article class="testimonial swiper-slide">
      <div class="avatar">
       <img src="images/avatar2.jpg"/>
      </div>
      <div class="testimonial_info">
        <h5>Ethan</h5>
        <small>Software Engineer</small>
        <div class="testimonial_body">
          <p>"This online education website has been a game changer for me. The flexibility to learn at my own pace and on my own schedule has allowed me to pursue my education while still working full-time."</p>
        </div>
      </div>
    </article>
    
    <article class="testimonial swiper-slide">
      <div class="avatar">
       <img src="images/avatar3.jpg"/>
      </div>
      <div class="testimonial_info">
        <h5>Liam</h5>
        <small>Graphic Designer</small>
        <div class="testimonial_body">
          <p>"I have taken multiple courses on this online education website and have found them to be incredibly informative and well-structured. The interactive elements and quizzes really helped me to retain the information."</p>
        </div>
      </div>
    </article>
    
    <article class="testimonial swiper-slide">
      <div class="avatar">
       <img src="images/avatar4.jpg"/>
      </div>
      <div class="testimonial_info">
        <h5>Olivia</h5>
        <small>Teacher</small>
        <div class="testimonial_body">
          <p>"I'm very impressed with the quality of the content and the support provided by the instructors. The flexibility of the platform has made it easy for me to learn while balancing my work and personal life."</p>
        </div>
      </div>
    </article>
    
    <article class="testimonial swiper-slide">
      <div class="avatar">
       <img src="images/avatar5.jpg"/>
      </div>
      <div class="testimonial_info">
        <h5>Noah</h5> 
        <small>Web Developer</small>
        <div class="testimonial_body">
          <p>"I have been very pleased with my experience on this online education website. The instructors are knowledgeable and the course material is well-organized. I have learned a lot and feel much more prepared for my career."</p>
        </div>
      </div>
    </article>
  </div>
  <div class="swiper-pagination"></div>
</section>

  <!--===============================================End Of Testimonials-==================================================-->

<!--================================================= Admin Login========================================================== -->
 
<div id="adminPopup" class="overlay">
  <div class="wrapper">
    <a href="index.php" class="close">&times;</a>
    <div class="column details">
      <div class="signin">
        <h2 class="stu-form-header"><span class="admin-span-header">Admin</span> Login in</h2>
        <form id="adminForm">
        <input type="email" placeholder="Username" name="adminemail" id="adminemail"/>
        <input type="password" placeholder="password" name="adminpass" id="adminpass" />
        </form>
        <a href="#"> Forgot Password</a>
        <small style="margin-bottom:.3rem" id="adminStatusLogMsg"></small>
        <button class="admin-form-submit" onclick="checkAdminLogin()">Sign in</button>
        <!-- <span class="form-span"
          >You Don't have account yet?
          <button id="signup">Create it Know</button></span
        > -->
        
      </div>
    </div>
    <div class="column content">
      <div class="signin">
        <h1>Welcome Back</h1>
        <p>
          To keep Connected with us please login with your personal
          information
        </p>
      </div>
    </div>
  </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<!-- <script>
  $(".signup").hide();

  $("#signin, #signup").on("click", function () {
    $(".signin,.signup").toggle();
  });
</script>  -->


<!--================================================= End of Admin Login========================================================== -->

   <!-- =============================================Footer================================================================ -->
<footer>
  <div class="container footer_container">
    <div class="footer_1">
      <a class="home_button" href="index.html"><h3>CodingHour</h3></a>
      <p>"Welcome to CodingHour, your one-stop destination for all things coding and technology."</p>
    </div>

     <div class="footer_2">
      <h4>Permalinks</h4>
      <ul class="permalinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutUs.php">About</a></li>
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
        <p>+91 123 456 7890 </p>
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
    <small>Copyright &copy; CodingHour || <a href="#adminPopup">Admin_Login</a></small>
   </div>
</footer>



<!-- <!-=====================================================- End of Footer=========================================================== -->
<!---=====================================================- Popup Login Sign Up ========================================================-->


<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="js/main.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      600:{
        slidesPerView: 2,
      }
    }
  }); 
</script>
<script type="text/javascript" src="js/ajaxrequest.js"></script>
<!-- Admin Ajax Request -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
  </body>
</html>
