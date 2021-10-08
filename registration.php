<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $name = addslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
    $con=mysqli_connect("localhost","root","","xm2");
    $fullname =    test_input($_POST['fullName']);
    $username =    test_input($_POST['userName']);
    $institution = test_input($_POST['institution']);
    $email =       test_input($_POST['email']);
    $password1 =   test_input($_POST['password1']);
    $password2 =   test_input($_POST['password2']);
    $role      =   test_input($_POST['role']);

    //  header("location: test.php?email=$email&password=$password1.____.$password2"); 

    if ($password1 != $password2) {
      header("location: registration.php?error=Both passwords should match!"); 
    }

    
    if ($role=='student') {

      $str="SELECT email from user WHERE email='$email'";
		  $result=mysqli_query($con,$str);
		
      if((mysqli_num_rows($result))>0) {

        header("location: registration.php?error=Already registered! Try logging in."); 
        
      } else {

        $str="insert into user set name='$username',email='$email',password='$password1',college='$institution',fullname='$fullname'";
        if((mysqli_query($con,$str)))	
        echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
        header('location:welcomev2.php');
      }

    } else if ($role=='teacher') {
        
      $str="SELECT email from teacher WHERE email='$email'";
		  $result=mysqli_query($con,$str);
		
		  if((mysqli_num_rows($result))>0) {
        header("location: registration.php?error=Already registered! Try logging in."); 
      } else {
        $str="insert into teacher set email='$email', password='$password1',institution='$institution',fullname='$fullname',username='$username'";
        if((mysqli_query($con,$str)))	
        echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
        header('location:login.php');
		  }

    }
  }


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="registration.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="registration.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullName" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="userName" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Instituion</span>
            <input type="text" name="institution" placeholder="Enter your institution name" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password1" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password2" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="role" value="student" id="dot-1">
          <input type="radio" name="role" value="teacher" id="dot-2">
          <span class="gender-title">Role</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender" style="margin-right: 15px;">Student</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Teacher</span>
            </label>
          </div>
        </div>

        <?php 
        
          if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger" style="margin-left: 30px;" role="alert">
          <?=$_GET['error']?>
        </div>

        <?php } ?>

        <div class="button">
          <input type="submit" name="submit" value="submit">
          <div class="signup-link" style="text-align: center; margin-top: 5px; ">Already registered? <a
              href="login.php">Login here</a></div>
        </div>

      </form>
    </div>
  </div>

</body>

</html>