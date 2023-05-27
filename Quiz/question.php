<?php
include 'dbConnection.php';
session_start();
$number=$_GET['n'];
// Query for the Question
$query="SELECT * FROM questions WHERE question_number=$number";

// Get the question
$result=mysqli_query($conn,$query);
$question=mysqli_fetch_assoc($result);

// Get Choices
$query="SELECT * FROM options WHERE question_number=$number";
$choices= mysqli_query($conn,$query);

// Get Total Question
$query="SELECT * FROM questions";
$total_questions=mysqli_num_rows(mysqli_query($conn,$query));

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz Question || CodingHour</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="style/questionStyle.css" />
  </head>
  <body>
    <div class="quiz">
      <div class="header">
        <h1>PHP Practice Quiz</h1>
      </div>
      <div class="container">
        <div class="container-head">
          <h1>Question <?php echo $number;?> of <?php echo $total_questions;?></h1>
        </div>
        <div class="container-body">
          <h3><?php echo $question['question_text']; ?></h3>
          <form method="POST" action="process.php">
          <div class="option">
            <div class="opt">
              <?php while($row=mysqli_fetch_assoc($choices)){?>
                <input type="radio" id="opt<?php echo $row['id'];?>" name="choice" value="<?php echo $row['id']; ?>" />
              <label for="opt<?php echo $row['id'];?>"><?php echo $row['choice'];?></label><br />
              <?php }?>
            </div>
            <input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="submit" class="submit" value="Submit"></input>
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
