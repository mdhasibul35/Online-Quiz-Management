<?php
	require('database.php');
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
		$pass = $_POST['password'];
		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
			$_SESSION['id']=$row[0];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];
			header('location: welcome.php?q=1'); 					
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login | Online Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/e0f8b74985.js" crossorigin="anonymous"></script>
	<style type="text/css">
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
	<a href="landing-page.php">
  <button class="btn btn-outline-primary float-right first" style="margin-left: 94%;
      margin-top: 0.5%;">Home</button></a>

	<body>
		<section>
			<span class="panel">
			<h1> Student <br>Panel</h1>
			</span>
    <div class="container">
		

      <div class="user signinbox">
        <div class="imgBx">
          <img src="./signin.jpeg" alt="signin.jpg">
        </div>
        <div class="formBx">
          <form method="post" action="login.php" enctype="multipart/form-data">
            <h1>Sign in</h1>
            <input type="email" name="email">
            <input type="password" name="password"placeholder="password" class="form-control">
            <button class="btn btn-primary btn-block" name="submit">Login</button>
            <p class="signup">register here <a href="register.php" >register</a> </p>
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