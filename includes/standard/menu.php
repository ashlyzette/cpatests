<nav class="myHeader navbar menu_bar navbar-expand-lg">
  <a class="navbar-brand menu_bar" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto menu_bar">
          <li class="nav-item active">
              <a class="menu_font nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="instruction.php">Exam</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="add_questions.php">Add Questions</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
              </div>
          </li>
      </ul>
    <div class = "px-3 py-3 need-validation">
        <?php
            if (isset($_SESSION['user']) && ($_SESSION['user'] != null) ) {
                echo "<div id = 'userHeader'> " . $_SESSION['user'] . "
                        <a class = 'ml-2' href = '#'><i class='fas fa-user-cog'></i></a>
                        <a href = 'includes/standard/logout.php'><i class='fas fa-sign-out-alt'></i></a>
                    </div>";
            } else {
                echo "<div>
                        <a id = 'loginForm' href='login.php'> Sign In or Register Here </a>
                    </div>";
            }
        ?>
    </div>
  </div>
  <!-- Fontawesome kit Dependencies  -->
<script type="text/javascript" src="https://kit.fontawesome.com/0a18e92247.js"></script>
</nav>
<div class="d-flex justify-content-end"> <span id ='err_message'><?php echo $err_message; ?></span> </div>
