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
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/loginSignUp.css">
  <title>CodingHour || loginSignUp</title>
  
</head>
<body>

<!--================================================== Navbar=============================================================== -->
<nav>
    <div class="container nav_container">
      <a class="home_button" href="index.php"><h3>CodingHour</h3></a>
      <ul class="nav_menu">
        <li><a href="#">Login</a></li>
        <li><a href="#">Certification</a></li>
        <li><a href="paymentStatus.php">Payment Status</a></li>
        <li><a href="#">Register</a></li>
      </ul>
      <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
      <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>  

<!-- ===================================================Navbar============================================================ -->

    <div class="cont">
        <div class="form login">
            <h2>Welcome</h2>
            <form id="stuLogForm">
             <label>
                <span>Email</span>
                <input type="email" placeholder="user email" name="stuLemail" id="stuLemail" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" placeholder="user password" name="stuLpass" id="stuLpass" />
            </label>
          </form>
            <p class="forgot-pass" ><a href="#">Forgot password?</a></p>
            <small style="margin-bottom:.3rem" id="statusLogMsg"></small>
            <button type="button" class="submit" onclick="checkStuLogin()">Login</button>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just Login.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Login</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <form id="stuRegForm">
                <label>
                    <span>Name</span>
                    <input type="name" placeholder="Full Name" name="stuname" id="stuname"/>
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" placeholder="please enter your email" name="stuemail" id="stuemail"/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" placeholder="please enter  password" name="stupass" id="stupass"/>
                </label>
                <small id="statusMsg3"></small>
              </form>
                <button type="button" class="submit"  onclick="addStu()" id="Rsignup">Sign Up</button>
                
            </div>
        </div>
    </div>

<!-- ==========================================================Footer=================================================================== -->


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
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
 
    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
     <script src="js/main.js"></script>
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
<!-- Admin Ajax Request -->
<!-- <script type="text/javascript" src="js/adminajaxrequest.js"></script> -->
</body>
</html>