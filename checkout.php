<?php
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogEmail'])){
  echo "<script>location.href='loginSignUp.php'</script>";
}
else{
  header("Pragma:no-cache");
  header("Cache-Control:no-cache");
  header("Expires: 0");
  $stuEmail = $_SESSION['stuLogEmail'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout </title>
    <link rel="stylesheet" href="css/checkout.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div class="heading">
        <h1>Welcome to E-Learning Checkout Page</h1>
      </div>
      <form method="POST" action="./paymentdone.php">
      <div class="detail">
        <div class="omk">
          <p>Order ID</p>
          <input type="text" id="ORDER_ID" name="ORDER_ID" autocomplete="off" 
          value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly/>
        </div>
        <div class="omk">
          <p>Student Email</p>
          <input id="CUST_ID" name="CUST_ID" type="email"  autocomplete="off" 
          value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" readonly />
        </div>
        <div class="omk">
          <p>Amount</p>
          <input type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['id'])){echo $_POST['id']; }?>" readonly/>
        </div>
        <div class="bu">
        <input value="Check out" type="submit"	class="btn btn-primary" onclick="">
       <a href="./courses.php" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
</form>
      <p class="note">Note: Complete Payment By Clicking Checkout button.</p>
    </div>
  </body>
</html>
<?php 
}
?>