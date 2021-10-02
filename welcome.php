<?php

    include_once 'database.php';
    session_start();
    $count=0;
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        if($count==0){
        $timevalue=@$_GET['timelimit'];
    }
        include_once 'database.php';
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Online Quiz System</title>
    <!-- Font Awesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="./css/welcome.css">
        <link rel="stylesheet" href="css/sidenav.css">
        <style>
            #countdown{
                background:aliceblue;
                font-style:italic;
                padding:2px;
            }
            </style>
</head>

<body>
<p id="countdown">Finish in time ! If you want to put your mouse above this line to change tab then you can't give exam anymore. </p>

<div class="navigation">
    
<ul class="navbar-nav ms-auto">
    <br>
                    <li class="nav-item" <?php if(@$_GET['q']==1) echo'class="active"'; ?>>
                        <a class="nav-link" href="welcome.php?q=1">
                            Quiz
                        </a>
                    </li>

                    <li class="nav-item" <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a class="nav-link"
                            href="welcome.php?q=2">
                            History
                        </a></li>


                    <li class="nav-item" <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a class="nav-link"
                            href="welcome.php?q=3">
                            Ranking
                        </a></li>

                    <li <?php echo ''; ?>> <a class="btn btn-primary btn-outline-primary nav-link" id="logout"
                            href="landing-page.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Log out <i class="fas fa-sign-out-alt"></i>
                        </a></li>

                </ul>
    </div>


    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
            

<script>
    let x=0;
</script>
<script>
let screenLog = document.querySelector('#countdown');
document.addEventListener('mousemove', logKey);

function logKey(e) {

    var y1=`${e.clientY}`;
//    var x1=`${e.screenX}`;
    if(y1<10){
    location.replace("Entry_page.php");
}
    // var w = window.innerWidth;
    // var h = window.innerHeight;
    // if(w<1390){
    //     location.replace("Entry_page.php");
    // }




}
</script>
                <!-- <p id="countdown">Time Fixed !!!</p> -->

                <script>
                    let x = 0;
                </script>

                <!-- <script src="timing.js"></script> -->
                <?php if(@$_GET['q']==1) 
                {
                    $con=mysqli_connect("localhost","root","","xm2");
                    $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                    echo  '<div class="panel"><div class="table-responsive"><table class="table table-hover">
                    <tr class="table-active"><td><center><b>No.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</center></b></td><td><center><b>Action</b></center></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $eid = $row['eid'];
                        $timelimit = $row['timelimit'];
                    $q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
                    $rowcount=mysqli_num_rows($q12);	
                    if($rowcount == 0){
                        echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><a href="welcome.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'&timelimit='.$timelimit.'"><button class="btn btn-sm btn-outline-primary" >  Start  </button onclick="return  x=1;"></a></td></tr>';
                       
                    }

                    else
                    {
                    echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="#"><span class="" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Completed</b></span></a></b></center></td></tr>';
                    }
                    }
                    $c=0;
                    echo '</table></div></div>';
                }?>




                <?php
                    $con=mysqli_connect("localhost","root","","xm2");
                    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                    {
                        $count++;

    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $total=@$_GET['t'];
    
    $qid=@$_GET['qid'];
    $timelimit=@$_GET['timelimit'];

                        
                        echo $timevalue;
                        
                        ?>

                        <?php 
                        if($timevalue==20){
                         ?>
                        <script>
                        let y=20   
                        </script>
                    <?php
                     } else if($timevalue==90){
                    ?>
                     <script>
                        let y=90  
                        </script>
                    <?php
                     }else if($timevalue==60){
                    ?>
                     <script>
                        let y=60  
                        </script>
                    <?php
                     }else if($timevalue==45){
                    ?>
                     <script>
                        let y=45  
                        </script>
                    <?php
                     }else if($timevalue==30){
                    ?>
                     <script>
                        let y=30  
                        </script>
                    <?php
                     }
                     else{
                    ?>
                     <script>
                        let y=40  
                        </script>
                    <?php
                     }
                    ?>
                    <?php







                    ?>


                <script>
                    if (x == 0) {
                        const startingMinutes =y;
                        let time = startingMinutes;
                        const countdown = document.getElementById('countdown');

                        setInterval(updateCountdown, 1000);

                        function updateCountdown() {
                            const min = Math.floor(time / 60);
                            let seconds = time % 60;
                            seconds = seconds < 10 ? '0' + seconds : seconds;
                            countdown.innerHTML = `${min}:${seconds}`;
                            time--;
                            if (time < 0.0) {



                         
                                window.location.replace("welcome.php?q=1");
                                countdown.innerHTML = `times up`;
                                exit();

                            }
                        }
                    }
                </script>


                <?php
                        $eid=@$_GET['eid'];
                        $sn=@$_GET['n'];
                        $total=@$_GET['t'];
                        $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
                        echo '<div class="panel" style="margin:5%">';
                        while($row=mysqli_fetch_array($q) )
                        {
                            $qns=$row['qns'];
                            $qid=$row['qid'];
                            echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br /><br />'.$qns.'</b><br /><br />';
                        }
                        $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
                        echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'&timelimit='.$timevalue.'" method="POST"  class="form-horizontal">
                        <br />';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $option=$row['option'];
                            $optionid=$row['optionid'];
                            echo'<input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
                        }
                        echo'<br /><button type="submit" id="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                    }

                    if(@$_GET['q']== 'result' && @$_GET['eid']) 
                    {
                        $eid=@$_GET['eid'];
                        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
                        echo  '<div class="panel">
                        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['sahi'];
                            $qa=$row['level'];
                            echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
                                <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                                <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                                <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }
                        $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }
                        echo '</table></div>';
                    }
                ?>
                <!-- damn!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                <?php
                    if(@$_GET['q']== 2) 
                    {
                        echo"<h1 align='center'><u>All Exam history</u></h1><br>"; 
                        $con=mysqli_connect("localhost","root","","xm2");
                        $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
                        echo  '<div class="panel title">
                        <table class="table table-hover title1" >
                        <tr class="table-active"><td><center><b>No.</b></center></td><td><center><b>Quiz</b></center></td><td><center><b>Total Questions</b></center></td><td><center><b>Right</b></center></td><td><center><b>Wrong<b></center></td><td><center><b>Score</b></center></td>';
                        $c=0;
                        while($row=mysqli_fetch_array($q) )
                        {
                        $eid=$row['eid'];
                        $s=$row['score'];
                        $w=$row['wrong'];
                        $r=$row['sahi'];
                        $qa=$row['level'];

                        $q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');

                        while($row=mysqli_fetch_array($q23) )
                        {  
                            $title=$row['title']; 
                        }
                        $c++;
                        echo '<tr><td><center>'.$c.'</center></td><td><center>'.$title.'</center></td><td><center>'.$qa.'</center></td><td><center>'.$r.'</center></td><td><center>'.$w.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo'</table></div>';
                    }

                    if(@$_GET['q']== 3) 
                    {
                        echo"<h1 align='center'><u>Overall Ranking based on total marks</u></h1><br>";
                        $con=mysqli_connect("localhost","root","","xm2");
                        $q=mysqli_query($con,"SELECT * FROM rank ORDER BY score DESC " )or die('Error223');
                        echo  '<div class="panel title"><div class="table-responsive">
                        <table class="table table-hover" >
                        <tr class="table-active"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>Email</b></center></td><td><center><b>Score</b></center></td></tr>';
                        $c=0;

                        while($row=mysqli_fetch_array($q) )
                        {
                            $e=$row['email'];
                            $s=$row['score'];
                            $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
                            while($row=mysqli_fetch_array($q12) )
                            {
                                $name=$row['name'];
                            }
                            $c++;
                            echo '<tr><td style="color:black"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$e.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo '</table></div></div>';
                    }
                ?>

            </div>
        </div>
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

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>