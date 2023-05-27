<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Final Score</title>;
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style/finalStyle.css" />
  </head>
  <body>
    <!-- optional animation -->

    <div class="snowflakes" aria-hidden="true">
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-lg"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-lg"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-lg"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-sm"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-lg"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-sm"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-lg"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-sm"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-lg"
          style="color: #f3f7f6"
        ></i>
      </div>
      <div class="snowflake">
        <i
          class="fa-regular fa-snowflake fa-beat fa-"
          style="color: #f3f7f6"
        ></i>
      </div>
    </div>

    <!-- Animation end -->
    <div class="ph">
      <h1>PHP Practice Quiz</h1>
    </div>
    <div class="text-container">
      <h1>congratulation</h1>
    </div>
    <div class="succ">
      <h3>You have completed this test succesfully</h3>
      <br />
    </div>

    <div class="result">
      <h1> Result</h1>
      <div class="pp">
        <p>Your <strong>Score</strong> is <b><?php echo $_SESSION['score'];?></b></p>
        <?php unset($_SESSION['score']);?>
      </div>
    </div>
  </body>
</html>
