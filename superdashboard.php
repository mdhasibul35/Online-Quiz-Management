<?php
include_once 'database.php';


session_start();
if (!(isset($_SESSION['email']))) {
    
} else {
    $con = mysqli_connect("localhost", "root", "", "xm2");

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $eid=@$_GET['eid'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Online Quiz System</title>
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!-- Stylesheet -->
    
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <style>
        body{
            background:oldlace;
        }
        .navigation{
            width:120px;
        }




        </style>
</head>

<body>
<div class="navigation">
            <ul class="navbar-nav ms-auto">
                    <li class="nav-item" <?php if (@$_GET['q'] == 0) echo 'class="active"'; ?>>
                        <a class="nav-link" href="superdashboard.php?q=0">
                         <span><i class="fas fa-school"></i></span>   Home
                        </a>
                    </li>

                    <li class="nav-item" <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a class="nav-link" href="superdashboard.php?q=1">
                            Students
                        </a></li>

                  
                        <li class="nav-item" <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a class="nav-link" href="superdashboard.php?q=3">
                        <i class="fas fa-chalkboard-teacher"></i>Faculty
                        </a></li>

                        <li class="nav-item" align="left" <?php if (@$_GET['q'] == 5) echo 'class="active"'; ?>><a class="nav-link" href="superdashboard.php?q=5">Remove Quiz
                        </a>
                        </li>

                        <li class="nav-item" <?php if (@$_GET['q'] == 6) echo 'class="active"'; ?>><a class="nav-link" href="superdashboard.php?q=6">
                            ranking
                        </a></li>
                        
                    <li <?php echo ''; ?>> <a class="btn btn-primary btn-outline-primary nav-link" id="logout" href="landing-page.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Log out <i class="fas fa-sign-out-alt"></i>
                        </a></li>

                </ul>
    </div>
        

    <section class="heading">

        
            <a class="navbar-brand" id="#brand" href="" style="margin-right:-10%;">Online Quiz System</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>
            

    </section>


    <section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (@$_GET['q'] == 0) {
                    
                    echo "<br>";
                    echo "<h1 align='center'>$email</h1>";
                    
                    }
                    ?>

                    <?php
                    if (@$_GET['q'] == 1) {
                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
                        echo  '<div class="panel"><div class="table-responsive"><table class="table table-light table-hover">
                        <tr class="table-active"><th>S.N.</th><th>Name</th><th>Varsity</th><th>Email</th><th>Action</th></tr>';
                        $c = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['name'];
                            $email = $row['email'];
                            $college = $row['college'];
                            // echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $college . '</td><td>' . $email . '</td><td><a title="Delete User" href="update.php?demailsstud=' . $email . '"><i class="far fa-trash-alt"></i></a></td></tr>';
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$name.'</center></td><td><center>'.$college.'</center></td><td><center>'.$email.'</center></td><td><center><a title="Delete User" href="update.php?demailsstud='.$email.'"><i class="far fa-trash-alt"></i></a></td></tr>';
                        }
                        $c = 0;
                        echo '</table></div></div>';
                    }
                    ?>

                    <?php
                    if (@$_GET['q'] == 6




                ) {
                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        $q = mysqli_query($con, "SELECT * FROM rank  ORDER BY score DESC ") or die('Error223');
                        echo  '<div class="panel">
                        <div class="table-responsive">
                    <table class="table table-light table-hover" >
                    <tr class="table-active">
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th></tr>';
                        $c = 0;
                        while ($row = mysqli_fetch_array($q)) {
                            
                            $e = $row['email'];
                            $s = $row['score'];
                            $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
                            while ($row = mysqli_fetch_array($q12)) {
                                $name = $row['name'];
                                $college = $row['college'];
                            }
                            $c++;
                            echo '<tr><th>' . $c . '</th><td>' . $e . '</td><td>' . $s . '</td>';
                        }
                        echo '</table></div></div>';
                    }
                    ?>
                    
                    <?php

                    if (@$_GET['q'] == 3) {
                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        $result = mysqli_query($con, "SELECT * FROM admin") or die('Error');
                        echo  '<div class="panel"><div class="table-responsive"><table class="table table-light table-hover">
                        <tr class="table-active"><th>S.N.</th><th>Email</th><th>action</th></tr>';
                        $c = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            
                            $email = $row['email'];
                            
                            echo '<tr><td>' . $c++ . '</td><td>' . $email. '</td><td><a title="Delete User" href="update.php?demails=' . $email . '"><i class="far fa-trash-alt"></i></a></td></tr>';
                        
                        }
                        $c = 0;
                        echo '</table></div></div>';
                    }
                    ?>

                   

    
                    <?php
                    if (@$_GET['q'] == 5) {

                        // echo $name;

                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        $result = mysqli_query($con, "SELECT * FROM  quiz order by'$email'") or die('Error');
                        echo  '<div class="panel"><div class="table-responsive"><table class="table  table-light table-hover">
                        <tr class="table-active">
                        <th>Quiz No.</th>
                        <th>created by</th>

                        <th>topic</th>
                        <th>Total Questions</th>
                        <th>Total Marks</th>
                        
                        <th>Action</th></tr>';
                        $c = 1;
                        
                        
                        while ($row = mysqli_fetch_array($result)) {
                            


                            $title = $row['title'];
                            $total = $row['total'];
                            $sahi = $row['sahi'];
                            $eid = $row['eid'];
                            $email= $row['email'];

                            
                            echo '<tr><td><center>' . $c++ . '</center></td><td><center>' .$email.'</center></td><td><center>'. $title . '</center></td><td><center>' . $total . '</center></td><td><center>' . $sahi * $total . '</center></td>
                            <td><center><b><a href="update.php?q=rmquizs&eid=' . $eid . '" class="pull-right btn btn-sm btn-outline-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                        }
                        $c = 0;
                        echo '</table></div></div>';
                    }
                    
                    ?>
                    <?
                    

$GLOBALS['trackrepeat']=1;
?>



<?php
                         if (@$_GET['q'] == 7) {
                        if (isset($_POST["submit"])) {
                            $GLOBALS['trackrepeat']=0;
                            $str = $_POST["search"];
                            $sqlsearch="SELECT * from NEWTABLE where title='$str'";
                            $sth = mysqli_query($con, $sqlsearch) or die('Errormaking');
                        
                            echo  '<div class="panel"><div class="table-responsive"><table class="table  table-light table-hover">
                            <tr class="table-active">
                            <th>Subject</th>
                            <th>Student Name</th>
                            <th>email</th>
                            <th>varsity</th>
                            <th>Marks</th>
                            <th>Rank</th></tr>';
                        
                            while ($row = mysqli_fetch_array($sth)) {
                                ?>
                                
                                <?php

                            $title = $row['title'];
                            $name = $row['name'];
                            $emailuser=$row['email'];
                            $varsity = $row['college'];
                            $score = $row['score'];
                            $Rank= $row['Rank'];
                                echo '<tr><td><center>' . $title . '</center></td><td><center>' .$name. '</center></td><td><center>' .$emailuser. '</center></td><td><center>' .$varsity. '</center></td><td><center>' . $score . '</center></td><td><center>' . $Rank. '</center></td>
                                </tr>';

                                ?>
                           
                        <?php 
                            }
                                
                               
                        
                        
                        }
                    }
                        
                        ?>





                </div>
            </div>
    </section>


    <!-- Footer -->





    </div>
    <footer class="white-section" id="footer">
        <div class="container-fluid">
            <i class="social-icon fab fa-facebook-f"></i>
            <i class="social-icon fab fa-twitter"></i>
            <i class="social-icon fab fa-instagram"></i>
            <i class="social-icon fas fa-envelope"></i>
            <p>© Copyright 2021 CSE 4510</p>
        </div>
    </footer>

    <script src="css/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>