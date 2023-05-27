<?php
include 'dbConnection.php';
$query="SELECT * FROM questions";
$total_question=mysqli_num_rows(mysqli_query($conn,$query));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rules For Practice Quiz</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <!-- =========================Information Box================= -->

    <div class="info_box">
      <div class="info_title">
        <span>Rules For this Quiz</span>
      </div>
      <div class="info_list">
        <div class="info">1. Test Your <span>PHP</span> Knowledge.</div>
        <div class="info">2. Type: <span>Multiple Choice</span></div>
        <div class="info">3. Number of Question: <span><?php echo $total_question; ?></span></div>
        <div class="info">
          4. Estimate Time : <span><?php echo $total_question; ?> Minutes</span>
          <div class="info">
            5. You can't exit from the Quiz anytime while playing.
          </div>
          <div class="info">
            6. You'll get points on the basis of your correct answers.
          </div>
        </div>
        <div class="buttons">
          <a href="../index.php" class="quit"
            >Exit Now</a
          >
          <a href="question.php?n=1" class="continue">Start Quiz</a>
        </div>
      </div>
    </div>
  </body>
</html>
