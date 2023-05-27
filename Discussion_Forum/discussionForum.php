<?php
if(!isset($_SESSION)){
  session_start();
}
include 'Connection/dbConnection.php';
if(isset($_SESSION['is_login'])){ 
  $stuEmail=$_SESSION['stuLogEmail'];
}
else{
  echo "<script>location.href='./index.php';</script>";
}
$sql="SELECT stu_name FROM students WHERE stu_email='$stuEmail'";
$result=$conn->query($sql);
if($result->num_rows>0){
  $row=$result->fetch_assoc();
  $stuName=$row['stu_name'];
}
?>
<?php
if(isset($_REQUEST['postSubmit']))

$msg=$_POST['content'];
$time = date('Y-m-d H:i:s');
if(!empty($msg)){
$sql="INSERT INTO posts(user_name,user_email,user_msg,time) VALUES('$stuName','$stuEmail','$msg','$time')";
if ($conn->query($sql) === FALSE) {
  echo "Error: ".mysqli_error($conn);
} 
}



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Style/discussionForumStyle.css" />
  </head>
  <body>
    <nav>
      <div class="nav_container">
       
        <ul class="nav_menu">
          <li><a href="../Student/stuFeedback.php">My Profile</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <header>
        <h1>
          Discussion Forum - <span> <a href="">CodingHour</a> </span>
        </h1>
      </header>

      <section>
        <h2 style="color: var(--color-quote)">Create Post</h2>
        <form method="POST">
          <label for="title" style="color: var(--color-quote)">Name</label>
          <input type="text" id="title" name="title" value="<?php echo $stuName?>" readonly/>
          <br />
          <label for="Email" style="color: var(--color-quote)">Email</label>
          <input type="text" id="Email" name="Email" value="<?php echo $stuEmail?>" readonly/>
          <br />
          <label for="content" style="color: var(--color-quote)">Message</label>
          <textarea
            id="content"
            name="content"
            rows="6"
            cols="40"
            placeholder="Enter your Message here"
            required
          ></textarea>

          <input type="submit" name="postSubmit" value="Post" />
        </form>
        <hr id="line" />
        <h2 style="color: var(--color-quote)">Latest Posts</h2>
  
        
        <div id="post-list">
          <?php
          set_include_path(get_include_path() . PATH_SEPARATOR . '/Posts/get_posts.php');
          include 'Posts/get_posts.php'; ?>
        </div>
         
          
      </section>
    </div>
  </body>
</html>
