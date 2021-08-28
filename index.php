<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/sidenav.css">
  </head>


  <body>
    <div class="navigation">
      <ul>
        <li <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>>
          <a href="#">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Home</span>
          </a>
        </li>
         <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>>
          <a href="#">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Profile</span>
          </a>
        </li>
        <li class="nav-item" <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>>
          <a href="#">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Profile</span>
          </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php?q=4">
          <a href="#">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">essage</span>
          </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php?q=5">
          <a href="#">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Help</span>
          </a>
        </li>
        <li class="nav-item" <?php if (@$_GET['q'] == 6) echo 'class="active"'; ?>><a class="nav-link" href="dashboard.php?q=6">tive"'; ?>>
          <a href="#">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Setting</span>
          </a>
        </li>
		<li <?php echo ''; ?>> <a class="btn btn-primary btn-outline-primary nav-link" id="logout" href="landing-page.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Log out <i class="fas fa-sign-out-alt"></i>
                        </a></li>
		
      </ul>
    </div>

<!-- f -->

  </body>
</html>
