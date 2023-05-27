<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Posts</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Style/myPostsStyle.css" />
  </head>
  <body>
    <!-- =========================================================Navbar======================================================== -->

    <nav>
      <div class="nav_container">
        <a class="home_button" href="../index.php"
          ><h3 class="sub-head">CodingHour</h3></a
        >
        <ul class="nav_menu">
          <li><a href="discussionForum.php">Home</a></li>
          <li><a href="#">My Profile</a></li>
        </ul>
      </div>
    </nav>

    <!--================================================== End Of NavBar ===================================================-->

    <section>
      <h2 style="color: var(--color-quote)">My Posts</h2>
      <table class="table">
        <thead>
          <tr id="sub-head2">
            <th>Posts</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <ul>
                <li class="latest_post">
                  <h3>Post Title</h3>
                  <p>Post Content</p>
                  <p>Posted by: User123</p>
                </li>
              </ul>
            </td>

            <td>
              <button
                type="submit"
                class="btn btn-info"
                name="view"
                value="view"
              >
                <i class="fas fa-pen pen"> </i>
              </button>
              <button
                type="submit"
                class="btn btn-secondary"
                name="delete"
                value="Delete"
              >
                <i class="far fa-trash-alt del"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td>
              <ul>
                <li class="latest_post">
                  <h3>Post Title</h3>
                  <p>Post Content</p>
                  <p>Posted by: User123</p>
                </li>
              </ul>
            </td>

            <td>
              <button
                type="submit"
                class="btn btn-info"
                name="view"
                value="view"
              >
                <i class="fas fa-pen pen"> </i>
              </button>
              <button
                type="submit"
                class="btn btn-secondary"
                name="delete"
                value="Delete"
              >
                <i class="far fa-trash-alt del"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </body>
</html>
