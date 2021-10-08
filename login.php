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
		$pass =  $_POST['password'];
		$role =  $_POST['role'];

		$email = stripslashes($email);
		$email = addslashes($email);
		$pass = stripslashes($pass); 
		$pass = addslashes($pass);
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);

        

        if($role=='student') {

            $str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
            $result = mysqli_query($con,$str);
            if((mysqli_num_rows($result))!=1) 
            {
            header("Location: login.php?error=$email.$pass.Username/Password didn't match");
            }
            else
            {
                $_SESSION['logged']=$email;
                $row=mysqli_fetch_array($result);
                $_SESSION['name']=$row[1];
                $_SESSION['id']=$row[0];
                $_SESSION['email']=$row[2];
                $_SESSION['password']=$row[3];
                header('location:welcomev2.php?q=1'); 					
            }


        } else if($role=='teacher') {
            
                $result = mysqli_query($con,"SELECT email FROM teacher WHERE email = '$email' and password = '$pass'") or die('Error');
                $count=mysqli_num_rows($result);
                
                if($count==1)
                {
                    session_start();
                    if(isset($_SESSION['email']))
                    {
                        session_unset();
                    }
                    $_SESSION["name"] = 'teacher';
                    $_SESSION["key"] ='teacher';
                    $_SESSION["email"] = $email;
                    header("location:dashboardv2.php?q=0");
                }
                else
                {
                    header("Location: login.php?error=Username/Password didn't match");
                
                
                }

        }

	}
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <a href="landing-page.php">
    <button class="btn btn-outline-primary float-right first" style="margin-right: 2%;
            margin-top: 0.1%;">Back</button></a>
    <div class="wrapper">
        <div class="title">Login</div>
        <form action="./login.php" method="POST" enctype="multipart/form-data">
            <div class="field">
                <input type="text" name="email" placeholder="Email Address" required>           
            </div>
            <div class="field">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="content">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" value="student" checked>
                    <label class="form-check-label" style="margin-right: 15px;">
                        Student
                    </label>

                    <input class="form-check-input" type="radio" name="role" value="teacher">
                    <label class="form-check-label">
                        Teacher
                    </label>
                </div>
            </div>

            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
                </div>
            <?php } ?>

            <div class="field">
                <input type="submit" name="submit" value="Login">
            </div>
            <div class="signup-link">Not registered yet? <a href="registration.php">Signup now</a></div>
        </form>
    </div>
</body>

</html>