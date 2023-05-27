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
    <link rel="stylesheet" href="css/style.css" />
    <!-- SwiperJS -->
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="css/aboutUs.css">
<style>
  nav {
     background: var(--color-bg1);
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

    <!-- ==========================================================NavBar================================================================= -->
  
    <nav>
      <div class="container nav_container">
        <a class="home_button" href="index.php"><h3>CodingHour</h3></a>
        <ul class="nav_menu">
          <li><a href="loginSignUp.php">Login</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="paymentStatus.php">Payment Status</a></li>
          <li><a href="loginSignUp.php">Register</a></li>
        </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
  
    <!-- =========================================================End of NavBar========================================================= -->
  
   <!-- =======================================================Achievement Section====================================================== -->

    <section class="about_achievements">
      <div class="container about_achievements-container">
        <div class="about__achievements-left">
          <img src="images/aboutImages/achievements.svg" />
        </div>
        <div class="about__achievements-right">
          <h1>Acheivements</h1>
          <p>
            We are proud to present our achievement in developing an E-learning Distributed Management System using PHP and MySQL. Our system incorporates essential features such as practice quizzes, notes, and PDF integration, revolutionizing the way students learn. By implementing interactive practice quizzes, students can assess their understanding of various subjects. The organized notes feature allows for efficient access and retrieval of study materials.
          </p>
          <div class="achievements_cards">
            <article class="achievement_card">
              <span class="achievement_icon">
                <i class="bi bi-camera-video"></i>
              </span>
              <h3>10+</h3>
              <p>Courses</p>
            </article>

            <article class="achievement_card">
              <span class="achievement_icon">
                <i class="bi bi-people"></i>
              </span>
              <h3>10+</h3>
              <p>Students</p>
            </article>

            <article class="achievement_card">
              <span class="achievement_icon">
                <i class="bi bi-award"></i>
              </span>
              <h3>5+</h3>
              <p>Teachers</p>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section class="team">
      <h2>Meet Our Team</h2>
      <div class="container team__container">
        <article class="team__member">
          <div class="team__member-image">
            <img src="images/aboutImages/tm1.jpg   " />
          </div>
          <div class="team__member-info">
            <h4>Narendra Singh Jethi</h4>
            <p>Tutor</p>
          </div>
          <div class="team__member-socials">
            <a href="https://instagram.com/_narendrajethi?igshid=MzRlODBiNWFlZA==">
              <i class="uil uil-instagram"></i
            ></a>
            <a href="https://github.com/narendrajethi220"><i class="uil uil-github"></i></a>
            <a href="https://www.linkedin.com/in/narendra-singh-jethi-4b701b195/"><i class="uil uil-linkedin"></i></a>
          </div>
        </article>

        <article class="team__member">
          <div class="team__member-image">
            <img src="images/aboutImages/tm2.jpg   " />
          </div>
          <div class="team__member-info">
            <h4>Binay Singh</h4>
            <p>Tutor</p>
          </div>
          <div class="team__member-socials">
            <a href="https://www.instagram.com/binay_kholiya/">
              <i class="uil uil-instagram"></i
            ></a>
            <a href="https://github.com/binaysingh007"><i class="uil uil-github"></i></a>
            <a href="https://www.linkedin.com/in/binay-singh-oo7/"><i class="uil uil-linkedin"></i></a>
          </div>
        </article>
        <article class="team__member">
          <div class="team__member-image">
            <img src="images/aboutImages/tm3.jpg   " />
          </div>
          <div class="team__member-info">
            <h4>Ishwar Singh Bhandari</h4>
            <p>Tutor</p>
          </div>
          <div class="team__member-socials">
            <a href="https://www.instagram.com/ishwar__singh__bhandari/">
              <i class="uil uil-instagram"></i
            ></a>
            <a href="https://github.com/IshwarSinghBhandari"><i class="uil uil-github"></i></a>
            <a href="https://www.linkedin.com/in/ishwar-singh-bhandari-29b209212/"><i class="uil uil-linkedin"></i></a>
          </div>
        </article>
        
      </div>
    </section>

    <!-- ============================================================Achiements Section======================================================== -->
  
    <!-- =======================================================================Footer========================================================= -->
    
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
<script src="js/main.js"></script>
  </body>
</html>
