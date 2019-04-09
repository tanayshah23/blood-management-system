<?php
session_start();
$uname=$_SESSION["username"];
echo "<body bgcolor='#ffbe76'></body>";
$ser="localhost";
$u="root";
$pwd="";
$db="bloodbank";
$conn=new mysqli($ser,$u,$pwd,$db);
if($conn->connect_error){
    die("Connection error: ".$conn->connect_error);
}

$sql1="SELECT * FROM `donors` WHERE `Username`='$uname'";
$result=$conn->query($sql1);
$record=$result->fetch_assoc();
if($result->num_rows>0){
    $name=$record["Name"];
    $dob=$record["dob"];
    $city=$record["City"];
    $bgroup=$record["bgroup"];
    $phone=$record["phone no"];
    $email=$record["email"];
    $status=$record["Status"];
    $sql2="INSERT INTO `emergency`(`Name`, `dob`, `City`, `bgroup`, `phone number`, `email`, `Status`,`username`) VALUES ('$name','$dob','$city','$bgroup','$phone','$email','$status','$uname')";
    if($conn->query($sql2)===TRUE){
        echo "<br><br><br><br><br><br><center><h1><i>The requester will contact you directly &#128519</i></h1></center>";
    }
    else{
        echo "<br><br><br><br><br><br><center><h1><i>You have already registered &#128522</i></h1></center>";
    }
}
?>