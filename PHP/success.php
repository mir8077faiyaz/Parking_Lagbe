<?php
session_start();
require_once "connect.php";
$pid=$_GET['pid'];
$totalhrs=$_GET['totalhrs'];
$totalcost=$_GET['totalcost'];
$sql = "UPDATE `activeparking` SET `Timestart`='{$_GET['strim']}:00:00', `Timeend`='{$_GET['etrim']}:00:00', `Status`='booked' WHERE `PID`='$pid' AND `Status`='open'";


    $result=mysqli_query($conn,$sql);
    $sql4="INSERT INTO `activeparking`(`PID`, `Timestart`, `Timeend`, `Status`) VALUES ('$pid','00:00:00','00:00:00','open')";
    $result4=mysqli_query($conn,$sql4);
    if(isset($_SESSION['email'])){
        $mail=$_SESSION['email'];
      }
      else if(isset($_COOKIE['email'])){
        $mail=$_COOKIE['email'];
      }
      else{
        $mail="";
      }
    $sql="Select * from `user` where Email='$mail'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $uid=$row['UID'];
    $sql="Select * from `vehicledetails` where UID='$uid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $vid=$row['VID'];
    $date=date("Y/m/d");
    // insert into parking history
    $sqlf="INSERT INTO `parkinghistory`(`VID`, `PID`, `Date`, `TotalHours`, `TotalCost`) VALUES ('$vid','$pid','$date','$totalhrs','$totalcost')";
    $res=mysqli_query($conn,$sqlf);
    echo"<h1>PAYMENT SUCCESSFULL! REDIRECTING TO HOME!</h1>";
    echo "<meta http-equiv='refresh' content='3;url=home.php'>"; // Redirect after 5 seconds
?>