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
                        <a class="nav-link" href="dashboard.php?q=0">
                         <span><i class="fas fa-school"></i></span>   Home
                        </a>
                    </li>

                    <li class="nav-item" <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a class="nav-link" href="dashboard.php?q=1">
                            Students
                        </a></li>

                  
                        <!-- <li class="nav-item" <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>><a class="nav-link" href="dashboard.php?q=3">
                        <i class="fas fa-chalkboard-teacher"></i>Faculty
                        </a></li>
 -->

                    <!-- <li class="class=" nav-item dropdown <?php if (@$_GET['q'] == 4 || @$_GET['q'] == 5) echo 'active"'; ?>"> -->

                    <li class="nav-item"><a class="nav-link" href="dashboard.php?q=4">
                            Add Quiz
                        </a></li>

                    <li class="nav-item" align="left"><a class="nav-link" href="dashboard.php?q=5">Remove Quiz
                        </a></li>
                        <li class="nav-item" <?php if (@$_GET['q'] == 7) echo 'class="active"'; ?>><a class="nav-link" href="dashboard.php?q=7">
                            ranking
                        </a></li>
                        <li class="nav-item" align="left"><a class="nav-link" href="dashboard.php?q=8">My Profile
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
                        <tr class="table-active"><th>S.N.</th><th>Name</th><th>Varsity</th><th>Email</th></tr>';
                        $c = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['name'];
                            $email = $row['email'];
                            $college = $row['college'];
                            echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $college . '</td><td>' . $email . '</td></tr>';
                        }
                        $c = 0;
                        echo '</table></div></div>';
                    }
                    ?>

                    <?php
                    if (@$_GET['q'] == 11) {
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
                        <tr class="table-active"><th>S.N.</th><th>Email</th></tr>';
                        $c = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            
                            $email = $row['email'];
                            
                            echo '<tr><td>' . $c++ . '</td><td>' . $email. '</td></tr>';
                        }
                        $c = 0;
                        echo '</table></div></div>';
                    }
                    ?>

                    <?php
                    if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        echo '<div class="row"><h1>Enter Quiz Details</h1><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6">
                        <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="name"></label>
                                    <div class="col-md-12">
                                        <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="total"></label>
                                    <div class="col-md-12">
                                        <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="right"></label>
                                    <div class="col-md-12">
                                        <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for="wrong"></label>
                                    <div class="col-md-12">
                                        <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label class="col-md-12 control-label" for="timelimit"></label>
                                    <div class="col-md-12">
                                        <input id="timelimit" name="timelimit" placeholder="max time for each question(in seconds)" class="form-control input-md" min="0" type="float">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label" for=""></label>
                                    <div class="col-md-12">
                                        <input  type="submit" style="margin-left:auto" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form></div>';
                    }
                    ?>

                    <?php
                    if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        echo '
                        <div class="row">
                        <h2>Enter Question Details</h2><br /><br />
                        <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
                        <fieldset>
                        ';

                        for ($i = 1; $i <= @$_GET['n']; $i++) {
                            echo '<b>Question number&nbsp;' . $i . '&nbsp;:</b  ><br /><!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="qns' . $i . ' "></label>
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '1"></label>
                                        <div class="col-md-12">
                                            <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '2"></label>
                                        <div class="col-md-12">
                                            <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '3"></label>
                                        <div class="col-md-12">
                                            <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="' . $i . '4"></label>
                                        <div class="col-md-12">
                                            <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br />
                                    <b>Correct answer</b>:<br />
                                    <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                                    <option value="a">Select answer for question ' . $i . '</option>
                                    <option value="a"> option a</option>
                                    <option value="b"> option b</option>
                                    <option value="c"> option c</option>
                                    <option value="d"> option d</option> </select><br />';
                        }
                        echo '<div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12">
                                    <input  type="submit" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                                </div>
                              </div>

                        </fieldset>
                        </form></div>';
                    }
                    ?>

    
                    <?php
                    if (@$_GET['q'] == 5) {

                        // echo $name;

                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        $result = mysqli_query($con, "SELECT * FROM  quiz Where email ='$email'") or die('Error');
                        echo  '<div class="panel"><div class="table-responsive"><table class="table  table-light table-hover">
                        <tr class="table-active">
                        <th>Quiz No.</th>
                        <th>Topic</th>
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

                            
                            echo '<tr><td><center>' . $c++ . '</center></td><td><center>' . $title . '</center></td><td><center>' . $total . '</center></td><td><center>' . $sahi * $total . '</center></td>
                            <td><center><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn btn-sm btn-outline-primary"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
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
                        if($GLOBALS['trackrepeat']=1){

                        

                        echo '<form method="post" action="dashboard.php?q=10"><label>subject title:</label><input type="text" placeholder="Input title" name="search"><input type="submit"value="click" name="submit"></form>';
                        

                       
                        $con = mysqli_connect("localhost", "root", "", "xm2");
                        $sql = "DROP TABLE newtable";
                        $querydrop = mysqli_query($con, $sql) or die('Errordroping');
                        $sql1 = "CREATE TABLE NEWTABLE AS(SELECT quiz.title, USER.name, history.email, USER.college, history.score,RANK() OVER(PARTITION BY quiz.title ORDER BY history.score DESC) Rank FROM ( ( quiz INNER JOIN history ON quiz.eid = history.eid AND quiz.email ='$email') INNER JOIN USER ON USER.email = history.email ) ORDER BY quiz.title ASC, history.score DESC)";
                        $querymaketable = mysqli_query($con, $sql1) or die('Errormaking');
                        $rankselect="SELECT * from NEWTABLE";
                        $result2 = mysqli_query($con, $rankselect) or die('ErrorSSSS');
                        echo  '<br><br><hr><div class="panel"><div class="table-responsive"><table class="table  table-light table-hover">
                        <tr class="table-active">
                        <th>Subject</th>
                        <th>Student Name</th>
                        <th>email</th>
                        <th>varsity</th>
                        <th>Marks</th>
                        <th>Rank</th></tr>';
                        $c = 1;
                        
                       
                        while ($row = mysqli_fetch_array($result2)) {
                            
                            $title = $row['title'];
                            $name = $row['name'];
                            $emailuser=$row['email'];
                            $varsity = $row['college'];
                            $score = $row['score'];
                            $Rank= $row['Rank'];
                            $c = 0;
                            echo '<tr><td><center>' . $title . '</center></td><td><center>' .$name. '</center></td><td><center>' .$emailuser. '</center></td><td><center>' .$varsity. '</center></td><td><center>' . $score . '</center></td><td><center>' . $Rank. '</center></td>
                            </tr>';

                        }
                        }
                        
                        echo '</table>'
                        ?>

           
                        <?php
                       
                    }
                    
                    ?>


<?php
                         if (@$_GET['q'] == 10) {
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