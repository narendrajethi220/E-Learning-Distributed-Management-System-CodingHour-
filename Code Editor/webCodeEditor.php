<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Live Code Editor</title>
    <link rel="stylesheet" href="style/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />

    <link rel="shortcut icon" type="image/png" href="images/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
  </head>

  <body>
    <div class="editor">
      <div class="code-editor">
        <div class="code">
          <div class="html-code">
            <h4><img src="images/html.png" alt="" />HTML</h4>
            <textarea></textarea>
          </div>
          <div class="css-code">
            <h4><img src="images/CSS.png" alt="" />CSS</h4>
            <textarea></textarea>
          </div>
          <div class="js-code">
            <h4><img src="images/js.png" alt="" />JS</h4>
            <textarea spellcheck="false"></textarea>
          </div>
        </div>
        <div class="output">
          <h3 class="out"><i style="" class="bi bi-play-fill"></i> OUTPUT</h3>
          <iframe id="result"></iframe>
        </div>
      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
