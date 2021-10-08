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
        $track=0;
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        if($count==0){
        $timevalue=@$_GET['timelimit'];
    }
        include_once 'database.php';
        
    }
?>

 <p id="countdown" ></p>
<!--   <p id="countdown" style="color: red;background: black;padding: 1%;margin:1%;">exam will be auto submitted if you put your mouse above this or unable to solve any question in time </p> -->
  



<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Online Quiz</title>
   <!-- JQuery -->
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <!-- Font Awesome -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
   <!-- Bootstrap -->
   <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
   <!-- Stylesheet -->
   <link rel="stylesheet" href="./css/welcomev2.css">
</head>


<body>
  
  
   <div class="btn navBtn">
        <span class="fas fa-bars"></span>
   </div>
   
   <nav class="sidebar">
      <div class="text">
         OQMS
      </div>

      <ul>
         <br>
         <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>>
            <a href="welcomev2.php?q=1"> Upcoming Quiz</a>
         </li>
          <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>>
            <a href="welcomev2.php?q=4"> Quiz history</a>
         </li>

         <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>>
            <a href="welcomev2.php?q=2">Result</a>
         </li>

      <!--    <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>>
            <a href="welcomev2.php?q=3">Ranking</a>
         </li>
 -->
         <li <?php echo ''; ?>>
            <a id="logout" href="landing-page.php">Log out
               <i class="fas fa-sign-out-alt"></i>
            </a>
         </li>

      </ul>

   </nav>



   <div class="container main-body">


<script>
    let x=0;
</script>

<script>
  <?php if($track==5){ ?>
let screenLog = document.querySelector('#countdown');
document.addEventListener('mousemove', logKey);
<?php } ?>
</script>

   
<script>

function logKey(e) {

    var y1=`${e.clientY}`;
    if(y1<10){
    location.replace("login.php");
}






}
</script>




      <?php if(@$_GET['q']==1) {
        $track=0;
         $con=mysqli_connect("localhost","root","","xm2");
         $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
            
         echo '<h3>Quizzes</h3>';
         echo '<hr>';

         echo  '<div class="panel"><div class="table-responsive"><table class="table table-hover">
         <tr class="table-active"><td><center><b>No.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</center></b></td><td><center><b>Time/each ques(sec)</center></b></td><td><center><b>Action</b></center></td></tr>';
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
            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center>'.$timelimit.'</center></td><td><a href="welcomev2.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'&timelimit='.$timelimit.'"><button class="btn btn-sm btn-outline-primary" >  Start  </button onclick="return  x=1;"></a></td></tr>';
            
         }

         }
         $c=0;
         echo '</table></div></div>';
      }?>

            <?php if(@$_GET['q']==4) {
              $track=0;   
         $con=mysqli_connect("localhost","root","","xm2");
         $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
         
         echo '<h3>Quizzes</h3>';
         echo '<hr>';

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
         if($rowcount != 0)
         {
         echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="#"><span class="" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Completed</b></span></a></b></center></td></tr>';
         }
         }
         $c=0;
         echo '</table></div></div>';
      }?>




      <?php if(@$_GET['q']== 2) {
         $track=1;   

         echo '<h3>Result History</h3>';
         echo '<hr>';

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


         if(@$_GET['q']== 3) {

            echo '<h3>Overall Ranking</h3>';
            echo '<hr>';
            $track=0;   
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
                  echo '<tr>
                  <td style="color:black"><center><b>'.$c.'</b></center></td>
                  <td><center>'.$name.'</center></td><td><center>'.$e.'</center></td>
                  <td><center>'.$s.'</center></td>
                  </tr>';
            }
            echo '</table></div></div>';
         }
      ?>









                      <?php

                    $con=mysqli_connect("localhost","root","","xm2");
                    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                    {
                       echo "<p style='color: red;background: black;padding: 1%;'>Don't put your mouse over the times line & must submit within time,otherwise exam will be autosubmitted </p>";
                        $track=5;   
                        $count++;

                        $eid=@$_GET['eid'];
                        $sn=@$_GET['n'];
                        $total=@$_GET['t'];
    
                        $qid=@$_GET['qid'];
                        $timelimit=@$_GET['timelimit'];

                        
                        
                        
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
                        let y=15  
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



                         
                                window.location.replace("welcomev2.php?q=1");
                                countdown.innerHTML = `times up`;
                                exit();

                            }
                        }
                    }
                </script>
<script>
  <?php if($track==5){ ?>
let screenLog = document.querySelector('#countdown');
document.addEventListener('mousemove', logKey);
<?php } ?>
</script>

   
<script>

function logKey(e) {

    var y1=`${e.clientY}`;
    if(y1<10){
    location.replace("login.php");
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

</html>