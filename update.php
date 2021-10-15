<?php
  include_once 'database.php';
  session_start();
  $email=$_SESSION['email'];

  if(isset($_SESSION['key']))
  {
    
    $con=mysqli_connect("localhost","root","","xm2");
    if(@$_GET['demail']) 
    {
      $demail=@$_GET['demail'];
      $r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
      header("location:dashboardv2.php?q=1");
    }
    else if(@$_GET['demails']) 
    {
      $demails=@$_GET['demails'];
      $r1 = mysqli_query($con,"DELETE FROM teacher WHERE email='$demails' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM quiz WHERE email='$demails' ") or die('Error');
      header("location:admin-dashboard.php?q=3");
    }
    else if(@$_GET['demailsstud']) 
    {
      $demailsstud=@$_GET['demailsstud'];
      $r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demailsstud' ") or die('Error');
      $r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demailsstud' ") or die('Error');
      $result = mysqli_query($con,"DELETE FROM user WHERE email='$demailsstud' ") or die('Error');
      header("location:admin-dashboard.php?q=1");
    }
}

  if(isset($_SESSION['key']))
  {
    $con=mysqli_connect("localhost","root","","xm2");
    if(@$_GET['q']== 'rmquiz') 
    {

      $eid=@$_GET['eid'];
      $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
      while($row = mysqli_fetch_array($result)) 
      {
        $qid = $row['qid'];
        $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
        $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
      }
      $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
      $r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
      $r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');
      header("location:dashboardv2.php?q=5");
    }
    else if(@$_GET['q']== 'rmquizs') 
    {

      $eid=@$_GET['eid'];
      $result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
      while($row = mysqli_fetch_array($result)) 
      {
        $qid = $row['qid'];
        $r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
        $r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
      }
      $r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
      $r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
     
      header("location:superdashboardv2.php?q=5");
    }
  }

  if(isset($_SESSION['key']))
  {


    if(@$_GET['q']== 'addquiz') 
    {

      
      $con=mysqli_connect("localhost","root","","xm2");
      $name = $_POST['name'];
      
      $name= ucwords(strtolower($name));
      $total = $_POST['total'];
      $correct = $_POST['right'];
      $wrong = $_POST['wrong'];
      $timelimit=$_POST['timelimit'];
      $id=uniqid();
      $q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$correct' , '$wrong','$total', NOW(),'$email','$timelimit')");
      header("location:dashboardv2.php?q=4&step=2&eid=$id&n=$total&timelimit=$timelimit");
    }
  }

  if(isset($_SESSION['key']))
  {
$con=mysqli_connect("localhost","root","","xm2");
    if(@$_GET['q']== 'addqns' ) 
    {
      $n=@$_GET['n'];
      $eid=@$_GET['eid'];
      $ch=@$_GET['ch'];
      for($i=1;$i<=$n;$i++)
      {
        $qid=uniqid();
        $qns=$_POST['qns'.$i];
        $q3=mysqli_query($con,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
        $oaid=uniqid();
        $obid=uniqid();
        $ocid=uniqid();
        $odid=uniqid();
        $a=$_POST[$i.'1'];
        $b=$_POST[$i.'2'];
        $c=$_POST[$i.'3'];
        $d=$_POST[$i.'4'];
        $qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
        $qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
        $qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
        $qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
        $e=$_POST['ans'.$i];
        switch($e)
        {
          case 'a': $ansid=$oaid; break;
          case 'b': $ansid=$obid; break;
          case 'c': $ansid=$ocid; break;
          case 'd': $ansid=$odid; break;
          default: $ansid=$oaid;
        }
        $qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");
      }
      header("location:dashboardv2.php?q=0");
    }
  }

  if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
  {
$con=mysqli_connect("localhost","root","","xm2");
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $total=@$_GET['t'];
    $ans=$_POST['ans'];
    $qid=@$_GET['qid'];
    $timelimit=@$_GET['timelimit'];
    $q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
    while($row=mysqli_fetch_array($q) )
    {  $ansid=$row['ansid']; }
    if($ans == $ansid)
    {
      $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
      while($row=mysqli_fetch_array($q) )
      {
        $correct=$row['correct'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
      }
      $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $r=$row['correct'];
      }
      $r++;
      $s=$s+$correct;
      $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');
    } 
    else
    {
      $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');
      while($row=mysqli_fetch_array($q) )
      {
        $wrong=$row['wrong'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
      }
      $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $w=$row['wrong'];
      }
      $w++;
      $s=$s-$wrong;
      $q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
    }
    if($sn != $total)
    {
      $sn++;
      header("location:welcomev2.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&timelimit=$timelimit")or die('Error152');
    }
    else if( $_SESSION['key']!='suryapinky')
    {
      $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
      }
      $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
      $rowcount=mysqli_num_rows($q);
      if($rowcount == 0)
      {
        $q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
      }
      else
      {
        while($row=mysqli_fetch_array($q) )
        {
          $sun=$row['score'];
        }
        $sun=$s+$sun;
        $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
      }
      header("location:welcomev2.php?q=result&eid=$eid");
    }
    else
    {
      header("location:welcomev2.php?q=result&eid=$eid");
    }
  }

  if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) 
  {
$con=mysqli_connect("localhost","root","","xm2");
    $eid=@$_GET['eid'];
    $n=@$_GET['n'];
    $t=@$_GET['t'];
    $q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
    }
    $q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
    $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
    while($row=mysqli_fetch_array($q) )
    {
      $sun=$row['score'];
    }
    $sun=$sun-$s;
    $q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
    header("location:welcomev2.php?q=quiz&step=2&eid=$eid&n=1&t=$t&timelimit=$timelimit");
  }
?>
