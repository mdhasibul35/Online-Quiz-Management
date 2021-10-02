<?php
    include_once 'database.php';

    session_start();
    if(isset($_SESSION["email"]))
	  {
		session_destroy();
    }

    $ref=@$_GET['q'];
    if(isset($_POST['submit']))
	{
        $con=mysqli_connect("localhost","root","","xm2");
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = stripslashes($email);
        $email = addslashes($email);
        $password = stripslashes($password);
        $password = addslashes($password);

        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);

        $result = mysqli_query($con,"SELECT email FROM superadmin WHERE email = '$email' and password = '$password'") or die('Error');
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            session_start();
            if(isset($_SESSION['email']))
            {
                session_unset();
            }
            $_SESSION["name"] ='Admin';
            $_SESSION["key"] ='admin';
            $_SESSION["email"] = $email;
            header("location:superdashboard.php?q=0");
        }
        else
        {
          echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
          header("location:Entry_page.php");
          
           
        }
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Teacher Login | Online Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/e0f8b74985.js" crossorigin="anonymous"></script>
      <style>
         body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
        				.panel{
					margin-left:3%;
					padding:5%;
				    background-color:pink;
					text-align:center;

				}
        </style>
	</head>

	<body>
  <a href="landing-page.php">
  <button class="btn btn-outline-primary float-right first" style="margin-left: 94%;
      margin-top: 0.5%;">Home</button></a>

		<section>
    <span class="panel">
			<h1> Admin <br>Panel</h1>
			</span>

    <div class="container">
   

      <div class="user signinbox">
        <div class="imgBx">
          <img src="./signin.jpeg" alt="signin.jpg">
        </div>
        <div class="formBx">
          <form method="post" action="superadmin.php" enctype="multipart/form-data">
            <h1>Sign in</h1>
            <input type="email" name="email">
            <input type="password" name="password"placeholder="password" class="form-control">
            <button class="btn btn-primary btn-block" name="submit">Login</button>
            
          </form>
        </div>
      </div>





    
  </section>

  <script>
    function toggleForm() {
      container = document.querySelector('.container');
      section = document.querySelector('section');
      container.classList.toggle('active');
      section.classList.toggle('active');
    }
  </script>
		



		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>

<!-- <section class="login first grey">
			<div class="container">
				<div class="box-wrapper">
					<div class="box box-border">
						<div class="box-body">
						<center> <h5 style="font-family: Noto Sans;">Login to </h5><h4 style="font-family: Noto Sans;">Admin Page</h4></center><br>
							<form method="post" action="admin.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Enter Your Email Id:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Enter Your Password:
										<a href="javascript:void(0)" class="pull-right">Forgot Password?</a>
									</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
                                 <div class="form-group text-center">
                                    <span class="text-muted">Don't have an account?</span> <a href="registerteacher.php">Register</a> Here..
                                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section> -->