<?php
include('./dbConnection.php');

$ORDER_ID="";
if(isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"]!=""){
  $ORDER_ID=$_POST["ORDER_ID"];
}

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
    <link rel="stylesheet" href="css/contact.css" />
    <link rel="stylesheet" href="css/payment.css" />
    <title>paymentStatus || CodingHour | Let's Crack the Code</title>
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <a class="home_button" href="index.php"><h3>CodingHour</h3></a>
        <ul class="nav_menu">
          <li><a href="#">Login</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="paymentStatus.php">Payment Status</a></li>
          <li><a href="#">Register</a></li>
        </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
    <!--============================================= End of NavBar============================== -->
    <!--============================================= Payment Status============================ -->
    <div class="status">
      <h2 class="status-header">Payment Status</h2>
      <form method="POST" action="">
        <div class="status_form">
          <label class="status-subheader">Order ID :</label>
          <div class="status-orderID">
            <input
              type="text"
              id="ORDER_ID"
              name="ORDER_ID"
              autocomplete="off"
              value="<?php echo $ORDER_ID?>"
            />
          </div>
          <div>
            <input type="submit" class="btn-View" value="View" onclick="" />
          </div>
        </div>
      </form>
    </div>
    
    <!-- ============================== Receipt =-->
    
    <div class="receipt-container">
    <?php
      if (isset($_POST['ORDER_ID']))
      { 
        $sql = "SELECT order_id FROM courseorder";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
          if($_POST["ORDER_ID"] == $row["order_id"]){ ?>
            <div class="payment-receipt">
              <div class="colauto">
                <h3 class="text-center">Payment Receipt</h3>
                <table class="table-bordered">
                  <tbody>
                      <tr >
                        <td><label>Order ID:</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["order_id"] ?></td>
                      </tr>
                      <tr >
                        <td><label>Status:</label></td>
                        <td>Success</td>
                      </tr>
                      <tr>
                        <td></td>
                          <td><button class="btn-print" onclick="javascript:window.print();">Print Receipt</button></td>
                      </tr>
                    </tbody>
                  </table>      
                </div>
              </div>
      <?php
      } } } ?>

    </div>  


    <!--============================================= End of Payment Status============================ -->
    <!-- ============================================Contact Form================================ -->
    <section class="contact">
      <div class="container contact_container">
        <aside class="contact_aside">
          <div class="aside_image">
            <img src="images/contactus.svg" />
          </div>
          <h2>Contact Us</h2>
          <p>
We are dedicated to supporting your learning journey and ensuring a seamless e-learning experience. Our team of experts is here to assist you every step of the way. Whether you need assistance with course selection, technical support, or general inquiries, we are just a click away.
          </p>
          <ul class="contact_details">
            <li>
              <i class="uil uil-phone-times"></i>
              <h5>+91 123 456 7890</h5>
            </li>
            <li>
              <i class="uil uil-envelope-alt"></i>
              <h5>support@codinghour.com</h5>
            </li>
            <li>
              <i class="uil uil-location-point"></i>
              <h5>Remote Location</h5>
            </li>
          </ul>
          <ul class="contact_socials">
            <li>
              <a href="https://facebook.com"
                ><i class="uil uil-facebook-f"></i
              ></a>
            </li>
            <li>
              <a href="https://instagram.com"
                ><i class="uil uil-instagram"></i
              ></a>
            </li>
            <li>
              <a href="https://twitter.com"><i class="uil uil-twitter"></i></a>
            </li>
            <li>
              <a href="https://linkedin.com"
                ><i class="uil uil-linkedin-alt"></i
              ></a>
            </li>
          </ul>
        </aside>
        <form class="contact_form">
          <div class="form_name">
            <input
              type="text"
              name="First Name"
              placeholder="First Name"
              required
            />
            <input
              type="text"
              name="Last Name"
              placeholder="Last Name"
              required
            />
          </div>
          <input
            type="email"
            name="Email Address"
            placeholder="Your Email Address"
            required
          />
          <textarea
            name="Message"
            rows="7"
            placeholder="Message"
            required
          ></textarea>
          <button type="submit" class="btn">Send Message</button>
        </form>
      </div>
    </section>
    <!-- ====================================Contact Form=========================== -->
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
          >Copyright &copy; CodingHour || <a href="#">Admin_Login</a></small
        >
      </div>
    </footer>
    <!-- ==============================End of Footer====================================== -->
    <script src="js/main.js"></script>
  </body>
</html>
