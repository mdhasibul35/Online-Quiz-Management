<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sidebar Menu with sub-menu | CodingNepal</title>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./css/admindashboard.css">
</head>


<body>
    <div class="btn navBtn">
        <i class="fas fa-bars"></i>
    </div>

    <nav class="sidebar">
        <div class="text">
            OQMS
        </div>

        <ul>
            <br>
            <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>>
                <a href="admin-dashboard.php?q=1">Students</a>
            </li>
            <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>>
                <a href="admin-dashboard.php?q=3">Faculty</a>
            </li>
            <li <?php if (@$_GET['q'] == 5) echo 'class="active"'; ?>>
                <a href="admin-dashboard.php?q=5">Remove Quiz</a>
            </li>
            <li <?php if (@$_GET['q'] == 6) echo 'class="active"'; ?>>
                <a href="admin-dashboard.php?q=6">ranking</a></li>
            <li <?php echo ''; ?>>
                <a id="logout" href="landing-page.php">Log out
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>

    </nav>


    <div class="container main-body">


        <?php
            if (@$_GET['q'] == 1) {

                echo '<h3>Students</h3>';
                echo '<hr>';

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
            if (@$_GET['q'] == 6) {

                echo '<h3>Rankings</h3>';
                echo '<hr>';

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

                echo '<h3>Teachers</h3>';
                echo '<hr>';

                $con = mysqli_connect("localhost", "root", "", "xm2");
                $result = mysqli_query($con, "SELECT * FROM teacher") or die('Error');
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

                echo '<h3>Quizzes</h3>';
                echo '<hr>';

                $con = mysqli_connect("localhost", "root", "", "xm2");
                $result = mysqli_query($con, "SELECT * FROM  quiz order by date") or die('Error');
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

        <?$GLOBALS['trackrepeat']=1;?>



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

                        $title = $row['title'];
                        $name = $row['name'];
                        $emailuser=$row['email'];
                        $varsity = $row['college'];
                        $score = $row['score'];
                        $Rank= $row['Rank'];
                        echo '<tr><td><center>' . $title . '</center></td><td><center>' .$name. '</center></td><td><center>' .$emailuser. '</center></td><td><center>' .$varsity. '</center></td><td><center>' . $score . '</center></td><td><center>' . $Rank. '</center></td>
                        </tr>';

                    }
                            
                }
            }
            
        ?>

        

    </div>









    <!-- Footer -->

    <footer class="white-section" id="footer">
        <div class="container-fluid">
            <i class="social-icon fab fa-facebook-f"></i>
            <i class="social-icon fab fa-twitter"></i>
            <i class="social-icon fab fa-instagram"></i>
            <i class="social-icon fas fa-envelope"></i>
            <p>© Copyright 2021 CSE 4510</p>
        </div>
    </footer>


    <script>
        $('.btn').click(function () {
            $(this).toggleClass("click");
            $('.sidebar').toggleClass("show");
        });
        $('.feat-btn').click(function () {
            $('nav ul .feat-show').toggleClass("show");
            $('nav ul .first').toggleClass("rotate");
        });
        $('.serv-btn').click(function () {
            $('nav ul .serv-show').toggleClass("show1");
            $('nav ul .second').toggleClass("rotate");
        });
        $('nav ul li').click(function () {
            $(this).addClass("active").siblings().removeClass("active");
        });
    </script>
</body>



        